// resources/js/app.js
import * as THREE from 'three';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';

class AdvancedVirtualTour {
  constructor() {
    this.scene = null;
    this.camera = null;
    this.renderer = null;
    this.sphere = null;
    this.controls = null;
    this.currentPanorama = null;
    this.hotspots = [];
    this.raycaster = new THREE.Raycaster();
    this.mouse = new THREE.Vector2();
    this.isTransitioning = false;
    this.hotspotGroup = new THREE.Group();
    this.animationId = null;
    
    // UI Elements
    this.loaderElement = document.getElementById('loader');
    this.loaderProgress = document.getElementById('loaderProgress');
    this.hotspotLabel = null;
    this.infoPanel = null;
    this.minimapContainer = null;
    this.controlPanel = null;
    this.roomList = document.getElementById('roomList');
    
    // Configuration from Laravel
    this.config = {
      panoramas: window.panoramas || {},
      startPanorama: null,
      autoRotate: false,
      autoRotateSpeed: 0.5,
      enableGyroscope: false,
      transitionSpeed: 1.5,
      enableSound: true,
      ...window.tourConfig
    };
    
    this.init();
    this.setupUI();
    this.setupEventListeners();
    this.populateRoomList();
    
    // Auto-start if configured
    if (this.config.startPanorama) {
      this.loadPanorama(this.config.startPanorama);
    } else if (Object.keys(this.config.panoramas).length > 0) {
      const firstKey = Object.keys(this.config.panoramas)[0];
      this.loadPanorama(firstKey);
    }
  }

  init() {
    // Scene setup
    this.scene = new THREE.Scene();
    this.scene.background = new THREE.Color(0x000000);
    
    // Camera setup
    this.camera = new THREE.PerspectiveCamera(
      75,
      window.innerWidth / window.innerHeight,
      0.1,
      2000
    );
    this.camera.position.set(0, 0, 0.1);
    
    // Renderer setup
    this.renderer = new THREE.WebGLRenderer({ 
      antialias: true,
      alpha: true,
      powerPreference: 'high-performance'
    });
    this.renderer.setSize(window.innerWidth, window.innerHeight);
    this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    
    const viewer = document.getElementById('viewer');
    viewer.appendChild(this.renderer.domElement);
    
    // Controls setup
    this.controls = new OrbitControls(this.camera, this.renderer.domElement);
    this.controls.enableZoom = true;
    this.controls.enablePan = false;
    this.controls.rotateSpeed = -0.5;
    this.controls.zoomSpeed = 1.2;
    this.controls.minDistance = 1;
    this.controls.maxDistance = 100;
    this.controls.enableDamping = true;
    this.controls.dampingFactor = 0.08;
    this.controls.autoRotate = this.config.autoRotate;
    this.controls.autoRotateSpeed = this.config.autoRotateSpeed;
    
    // Add hotspot group to scene
    this.scene.add(this.hotspotGroup);
    
    // Start animation loop
    this.animate();
  }

  setupUI() {
    // Create control panel
    this.controlPanel = document.createElement('div');
    this.controlPanel.id = 'controlPanel';
    
    const controls = [
      { icon: '🏠', title: 'Accueil', id: 'btnHome', action: () => this.goToStart() },
      { icon: '🔄', title: 'Rotation Auto', id: 'btnRotate', action: () => this.toggleAutoRotate() },
      { icon: '🗺️', title: 'Plan', id: 'btnMinimap', action: () => this.toggleMinimap() },
      { icon: 'ℹ️', title: 'Informations', id: 'btnInfo', action: () => this.toggleInfo() },
      { icon: '📷', title: 'Capture', id: 'btnScreenshot', action: () => this.takeScreenshot() },
      { icon: '⛶', title: 'Plein écran', id: 'btnFullscreen', action: () => this.toggleFullscreen() }
    ];
    
    controls.forEach(ctrl => {
      const btn = document.createElement('button');
      btn.className = 'control-btn';
      btn.id = ctrl.id;
      btn.innerHTML = ctrl.icon;
      btn.onclick = ctrl.action;
      
      const tooltip = document.createElement('span');
      tooltip.className = 'control-btn-tooltip';
      tooltip.textContent = ctrl.title;
      btn.appendChild(tooltip);
      
      this.controlPanel.appendChild(btn);
    });
    
    document.body.appendChild(this.controlPanel);
    
    // Create hotspot label
    this.hotspotLabel = document.createElement('div');
    this.hotspotLabel.id = 'hotspotLabel';
    document.body.appendChild(this.hotspotLabel);
    
    // Create info panel
    this.infoPanel = document.createElement('div');
    this.infoPanel.id = 'infoPanel';
    document.body.appendChild(this.infoPanel);
    
    // Create minimap container
    this.minimapContainer = document.createElement('div');
    this.minimapContainer.id = 'minimapContainer';
    this.minimapContainer.innerHTML = '<div class="minimap-title">Plan</div>';
    document.body.appendChild(this.minimapContainer);
  }

  populateRoomList() {
    const roomListContent = document.getElementById('roomListContent');
    if (!roomListContent) return;
    
    roomListContent.innerHTML = '';
    
    Object.keys(this.config.panoramas).forEach(key => {
      const panorama = this.config.panoramas[key];
      const roomItem = document.createElement('div');
      roomItem.className = 'room-item';
      roomItem.textContent = panorama.name || key;
      roomItem.onclick = () => this.loadPanorama(key);
      roomItem.dataset.panoramaKey = key;
      roomListContent.appendChild(roomItem);
    });
  }

  updateActiveRoom(panoramaKey) {
    document.querySelectorAll('.room-item').forEach(item => {
      if (item.dataset.panoramaKey === panoramaKey) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  }

  setupEventListeners() {
    // Window resize
    window.addEventListener('resize', () => this.onWindowResize());
    
    // Mouse events
    this.renderer.domElement.addEventListener('click', (e) => this.onClick(e));
    this.renderer.domElement.addEventListener('mousemove', (e) => this.onMouseMove(e));
    
    // Keyboard shortcuts
    document.addEventListener('keydown', (e) => this.onKeyPress(e));
    
    // Touch events for mobile
    this.renderer.domElement.addEventListener('touchstart', (e) => this.onTouchStart(e), { passive: false });
    this.renderer.domElement.addEventListener('touchmove', (e) => this.onTouchMove(e), { passive: false });
    
    // Prevent context menu
    this.renderer.domElement.addEventListener('contextmenu', (e) => e.preventDefault());
  }

  loadPanorama(panoramaKey, options = {}) {
    if (this.isTransitioning) return;
    
    const panorama = this.config.panoramas[panoramaKey];
    
    console.log('=== DEBUT CHARGEMENT PANORAMA ===');
    console.log('1. Clé panorama:', panoramaKey);
    console.log('2. Données panorama:', panorama);
    console.log('3. window.assetPath:', window.assetPath);
    
    if (!panorama) {
      console.error('❌ Panorama non trouvé:', panoramaKey);
      console.log('Panoramas disponibles:', Object.keys(this.config.panoramas));
      return;
    }
    
    this.isTransitioning = true;
    this.currentPanorama = panoramaKey;
    if (this.loaderElement) this.loaderElement.classList.remove('hidden');
    
    this.updateActiveRoom(panoramaKey);
    this.clearHotspots();
    
    // ✅ CONSTRUCTION DU CHEMIN - VERSION CORRIGÉE
    let imagePath;
    
    if (panorama.image.startsWith('http://') || panorama.image.startsWith('https://')) {
      // URL complète - utiliser directement
      imagePath = panorama.image;
      console.log('→ URL complète détectée');
    } else {
      // URL relative - construire le chemin correctement
      const baseUrl = (window.assetPath || '').replace(/\/+$/, ''); // Enlever slashes finaux
      const relPath = panorama.image.replace(/^\/+/, ''); // Enlever slashes initiaux
      imagePath = baseUrl ? `${baseUrl}/${relPath}` : `/${relPath}`;
      console.log('→ Chemin relatif construit');
    }
    
    console.log('4. Chemin image final:', imagePath);
    console.log('5. Test URL:', window.location.origin + imagePath);
    
    // Test si l'image est accessible
    const testImg = new Image();
    testImg.onload = () => console.log('✅ Image accessible via IMG tag');
    testImg.onerror = (e) => {
      console.error('❌ Image NON accessible via IMG tag');
      console.error('URL testée:', testImg.src);
    };
    testImg.src = imagePath;
    
    const textureLoader = new THREE.TextureLoader();
    textureLoader.load(
      imagePath,
      (texture) => {
        console.log('✅ TEXTURE CHARGÉE AVEC SUCCÈS');
        console.log('6. Dimensions texture:', texture.image.width, 'x', texture.image.height);
        
        // Supprimer l'ancienne sphère
        if (this.sphere) {
          this.scene.remove(this.sphere);
          this.sphere.geometry.dispose();
          this.sphere.material.dispose();
        }
        
        // Créer nouvelle sphère
        const geometry = new THREE.SphereGeometry(500, 64, 64);
        geometry.scale(-1, 1, 1);
        
        const material = new THREE.MeshBasicMaterial({
          map: texture,
          side: THREE.BackSide
        });
        
        this.sphere = new THREE.Mesh(geometry, material);
        this.scene.add(this.sphere);
        
        console.log('✅ Sphère ajoutée à la scène');
        console.log('7. Position camera:', this.camera.position);
        console.log('8. Objets dans scène:', this.scene.children.length);
        
        // Créer hotspots
        if (panorama.hotspots && Array.isArray(panorama.hotspots)) {
          panorama.hotspots.forEach(hotspot => {
            this.createHotspot(hotspot);
          });
          console.log(`✅ ${panorama.hotspots.length} hotspots créés`);
        }
        
        if (this.loaderElement) this.loaderElement.classList.add('hidden');
        if (this.loaderProgress) this.loaderProgress.style.width = '0%';
        this.isTransitioning = false;
        
        if (panorama.info) {
          this.updateInfoPanel(panorama.info);
        }
        
        console.log('=== FIN CHARGEMENT PANORAMA ===');
      },
      (progress) => {
        if (progress.total > 0 && this.loaderProgress) {
          const percent = (progress.loaded / progress.total) * 100;
          console.log(`📊 Chargement: ${Math.round(percent)}%`);
          this.loaderProgress.style.width = `${percent}%`;
        }
      },
      (error) => {
        console.error('❌ ERREUR CHARGEMENT TEXTURE');
        console.error('Erreur:', error);
        console.error('Chemin testé:', imagePath);
        console.error('Vérifiez que le fichier existe à:', window.location.origin + imagePath);
        
        if (this.loaderElement) {
          const loaderText = this.loaderElement.querySelector('.loader-text');
          if (loaderText) {
            loaderText.textContent = `Erreur: Fichier introuvable`;
          }
        }
        this.isTransitioning = false;
      }
    );
    
    if (panorama.info) {
      this.updateInfoPanel(panorama.info);
    }
  }

  fadeOutSphere(sphere, callback) {
    const fadeInterval = setInterval(() => {
      if (sphere && sphere.material.opacity > 0) {
        sphere.material.opacity -= 0.05;
      } else {
        clearInterval(fadeInterval);
        callback();
      }
    }, 16);
  }

  fadeInSphere(sphere) {
    let opacity = 0;
    const fadeSpeed = 0.02;

    const fade = () => {
      opacity += fadeSpeed;
      if (opacity >= 1) opacity = 1;
      sphere.material.opacity = opacity;
      if (opacity < 1) {
        requestAnimationFrame(fade);
      }
    };
    fade();
  }

  createHotspot(hotspotData) {
    const { position, type = 'navigation', label, target, style, content } = hotspotData;
    
    if (!position || !position.x || position.y === undefined || !position.z) {
      console.warn('Invalid hotspot position:', hotspotData);
      return;
    }
    
    let color = 0x00aaff;
    let size = 8;
    
    switch(type) {
      case 'navigation':
        color = 0x00aaff;
        size = 8;
        break;
      case 'info':
        color = 0xffaa00;
        size = 6;
        break;
      case 'media':
        color = 0xff0066;
        size = 7;
        break;
      default:
        color = 0x00aaff;
        size = 8;
    }
    
    const geometry = new THREE.CircleGeometry(size, 32);
    const material = new THREE.MeshBasicMaterial({
      color: color,
      side: THREE.DoubleSide,
      transparent: true,
      opacity: 0.85
    });
    const hotspot = new THREE.Mesh(geometry, material);
    
    hotspot.position.set(position.x, position.y, position.z);
    hotspot.lookAt(this.camera.position);
    
    hotspot.userData.type = type;
    hotspot.userData.label = label;
    hotspot.userData.target = target;
    hotspot.userData.content = content;
    hotspot.userData.originalScale = 1;
    hotspot.userData.time = 0;
    
    this.hotspotGroup.add(hotspot);
    this.hotspots.push(hotspot);
    
    this.addHotspotRing(hotspot, color, size);
  }

  addHotspotRing(hotspot, color, size) {
    const ringGeometry = new THREE.RingGeometry(size + 0.5, size + 1.2, 32);
    const ringMaterial = new THREE.MeshBasicMaterial({
      color: color,
      side: THREE.DoubleSide,
      transparent: true,
      opacity: 0.4
    });
    const ring = new THREE.Mesh(ringGeometry, ringMaterial);
    ring.position.copy(hotspot.position);
    ring.lookAt(this.camera.position);
    ring.userData.isRing = true;
    ring.userData.time = 0;
    this.hotspotGroup.add(ring);
  }

  clearHotspots() {
    this.hotspots.forEach(hotspot => {
      if (hotspot.geometry) hotspot.geometry.dispose();
      if (hotspot.material) hotspot.material.dispose();
    });
    this.hotspots = [];
    
    while(this.hotspotGroup.children.length > 0) {
      const child = this.hotspotGroup.children[0];
      if (child.geometry) child.geometry.dispose();
      if (child.material) child.material.dispose();
      this.hotspotGroup.remove(child);
    }
  }

  onClick(event) {
    this.updateMousePosition(event);
    this.raycaster.setFromCamera(this.mouse, this.camera);
    
    const intersects = this.raycaster.intersectObjects(this.hotspots, false);
    
    if (intersects.length > 0) {
      const hotspot = intersects[0].object;
      this.handleHotspotClick(hotspot);
    }
  }

  handleHotspotClick(hotspot) {
    const { type, target, content } = hotspot.userData;
    
    if (type === 'navigation' && target) {
      this.loadPanorama(target);
    } else if (type === 'info' && content) {
      this.showInfoModal(content);
    } else if (type === 'media' && content) {
      this.showMediaModal(content);
    }
  }

  onMouseMove(event) {
    this.updateMousePosition(event);
    this.raycaster.setFromCamera(this.mouse, this.camera);
    
    const intersects = this.raycaster.intersectObjects(this.hotspots, false);
    
    if (intersects.length > 0) {
      const hotspot = intersects[0].object;
      this.showHotspotLabel(hotspot, event);
      this.renderer.domElement.style.cursor = 'pointer';
    } else {
      this.hideHotspotLabel();
      this.renderer.domElement.style.cursor = 'grab';
    }
  }

  showHotspotLabel(hotspot, event) {
    const label = hotspot.userData.label;
    if (label && this.hotspotLabel) {
      this.hotspotLabel.textContent = label;
      this.hotspotLabel.style.left = `${event.clientX + 15}px`;
      this.hotspotLabel.style.top = `${event.clientY + 15}px`;
      this.hotspotLabel.style.display = 'block';
    }
  }

  hideHotspotLabel() {
    if (this.hotspotLabel) {
      this.hotspotLabel.style.display = 'none';
    }
  }

  updateMousePosition(event) {
    this.mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    this.mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
  }

  onWindowResize() {
    this.camera.aspect = window.innerWidth / window.innerHeight;
    this.camera.updateProjectionMatrix();
    this.renderer.setSize(window.innerWidth, window.innerHeight);
  }

  animate() {
    this.animationId = requestAnimationFrame(() => this.animate());
    
    const time = Date.now() * 0.001;
    
    this.hotspotGroup.children.forEach(child => {
      if (child.userData.isRing) {
        child.userData.time += 0.02;
        const scale = 1 + Math.sin(child.userData.time * 2) * 0.15;
        child.scale.setScalar(scale);
        child.material.opacity = 0.3 + Math.sin(child.userData.time * 2) * 0.15;
      } else {
        child.userData.time += 0.02;
        const scale = 1 + Math.sin(child.userData.time * 3) * 0.08;
        child.scale.setScalar(scale);
      }
    });
    
    this.controls.update();
    this.renderer.render(this.scene, this.camera);
  }

  toggleAutoRotate() {
    this.controls.autoRotate = !this.controls.autoRotate;
    const btn = document.getElementById('btnRotate');
    if (btn) {
      btn.classList.toggle('active', this.controls.autoRotate);
    }
  }

  toggleMinimap() {
    if (this.minimapContainer) {
      const isVisible = this.minimapContainer.style.display !== 'none';
      this.minimapContainer.style.display = isVisible ? 'none' : 'block';
      const btn = document.getElementById('btnMinimap');
      if (btn) {
        btn.classList.toggle('active', !isVisible);
      }
    }
  }

  toggleInfo() {
    if (this.infoPanel) {
      const isVisible = this.infoPanel.style.display !== 'none';
      this.infoPanel.style.display = isVisible ? 'none' : 'block';
      const btn = document.getElementById('btnInfo');
      if (btn) {
        btn.classList.toggle('active', !isVisible);
      }
    }
  }

  takeScreenshot() {
    try {
      const link = document.createElement('a');
      link.download = `virtual-tour-${Date.now()}.png`;
      link.href = this.renderer.domElement.toDataURL('image/png');
      link.click();
    } catch (error) {
      console.error('Error taking screenshot:', error);
      alert('Erreur lors de la capture d\'écran');
    }
  }

  toggleFullscreen() {
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen().catch(err => {
        console.error('Error entering fullscreen:', err);
      });
    } else {
      document.exitFullscreen();
    }
  }

  goToStart() {
    const startPanorama = this.config.startPanorama || Object.keys(this.config.panoramas)[0];
    if (startPanorama) {
      this.loadPanorama(startPanorama);
    }
  }

  updateInfoPanel(info) {
    if (!this.infoPanel) return;
    
    this.infoPanel.innerHTML = `
      <h3>${info.title || 'Information'}</h3>
      <p>${info.description || ''}</p>
    `;
  }

  showInfoModal(content) {
    const modal = document.getElementById('infoModal');
    const modalContent = document.getElementById('infoModalContent');
    
    if (modal && modalContent) {
      modalContent.innerHTML = `
        <h2 style="margin-bottom: 15px; color: #333;">${content.title || 'Information'}</h2>
        <p style="line-height: 1.6; color: #666;">${content.description || content.text || ''}</p>
        ${content.details ? `<div style="margin-top: 15px; padding: 15px; background: #f5f5f5; border-radius: 6px;">${content.details}</div>` : ''}
      `;
      modal.classList.add('active');
    }
  }

  showMediaModal(content) {
    const modal = document.getElementById('mediaModal');
    const modalContent = document.getElementById('mediaModalContent');
    
    if (modal && modalContent) {
      let mediaHTML = '';
      
      if (content.type === 'image' || content.mediaType === 'image') {
        const imageSrc = content.url || content.mediaUrl || '';
        mediaHTML = `
          <h2 style="margin-bottom: 15px; color: #333;">${content.title || 'Image'}</h2>
          <img src="${imageSrc}" style="max-width: 100%; height: auto; border-radius: 8px;" alt="${content.title || 'Media'}">
          ${content.description ? `<p style="margin-top: 15px; color: #666;">${content.description}</p>` : ''}
        `;
      } else if (content.type === 'video' || content.mediaType === 'video') {
        const videoSrc = content.url || content.mediaUrl || '';
        mediaHTML = `
          <h2 style="margin-bottom: 15px; color: #333;">${content.title || 'Vidéo'}</h2>
          <video controls style="max-width: 100%; height: auto; border-radius: 8px;">
            <source src="${videoSrc}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
          </video>
          ${content.description ? `<p style="margin-top: 15px; color: #666;">${content.description}</p>` : ''}
        `;
      } else if (content.type === 'youtube' || content.mediaType === 'youtube') {
        const videoId = content.videoId || content.url;
        mediaHTML = `
          <h2 style="margin-bottom: 15px; color: #333;">${content.title || 'Vidéo'}</h2>
          <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe 
              style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; border-radius: 8px;" 
              src="https://www.youtube.com/embed/${videoId}" 
              allowfullscreen>
            </iframe>
          </div>
          ${content.description ? `<p style="margin-top: 15px; color: #666;">${content.description}</p>` : ''}
        `;
      }
      
      modalContent.innerHTML = mediaHTML;
      modal.classList.add('active');
    }
  }

  onKeyPress(event) {
    switch(event.key.toLowerCase()) {
      case 'f':
        this.toggleFullscreen();
        break;
      case 'm':
        this.toggleMinimap();
        break;
      case 'r':
        this.toggleAutoRotate();
        break;
      case 'h':
        this.goToStart();
        break;
      case 'i':
        this.toggleInfo();
        break;
      case 'escape':
        document.querySelectorAll('.modal').forEach(modal => {
          modal.classList.remove('active');
        });
        break;
    }
  }

  onTouchStart(event) {
    if (event.touches.length === 1) {
      this.updateMousePosition(event.touches[0]);
      this.raycaster.setFromCamera(this.mouse, this.camera);
      
      const intersects = this.raycaster.intersectObjects(this.hotspots, false);
      
      if (intersects.length > 0) {
        event.preventDefault();
        const hotspot = intersects[0].object;
        this.handleHotspotClick(hotspot);
      }
    }
  }

  onTouchMove(event) {
    // Allow default touch behavior for controls
  }

  destroy() {
    if (this.animationId) {
      cancelAnimationFrame(this.animationId);
    }
    
    this.clearHotspots();
    
    if (this.sphere) {
      this.sphere.geometry.dispose();
      this.sphere.material.dispose();
      this.scene.remove(this.sphere);
    }
    
    if (this.controls) {
      this.controls.dispose();
    }
    
    if (this.renderer) {
      this.renderer.dispose();
    }
  }
}

// Initialize tour when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  window.virtualTour = new AdvancedVirtualTour();
});

// Export for use in other modules
export default AdvancedVirtualTour;