import * as THREE from 'three';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';
import { DeviceOrientationControls } from 'three/examples/jsm/controls/DeviceOrientationControls.js';




let scene, camera, renderer, sphere, controls;
const loaderElement = document.getElementById('loader');

const hotspotLabel = document.createElement('div');
hotspotLabel.id = 'hotspotLabel';
Object.assign(hotspotLabel.style, {
  position: 'absolute',
  display: 'none',
  background: '#fff',
  padding: '5px 10px',
  borderRadius: '4px',
  fontSize: '14px',
  boxShadow: '0 0 5px rgba(0,0,0,0.3)',
  zIndex: '10'
});
document.body.appendChild(hotspotLabel);

initPanorama('/images/panorama1.jpg');

function initPanorama(imagePath) {
  if (sphere) {
    scene.remove(sphere);
    sphere.geometry.dispose();
    sphere.material.dispose();
    sphere = null;
  }

  if (!scene) {
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    controls = window.DeviceOrientationEvent
      ? new DeviceOrientationControls(camera)
      : new OrbitControls(camera, renderer.domElement);

    controls.enableZoom = true;
    controls.enablePan = false;
    controls.enableDamping = true;
    controls.dampingFactor = 0.05;
    controls.target.set(0, 0, 1);
    controls.update();

    camera.position.set(0, 0, 0);

    window.addEventListener('resize', () => {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
    });

    animate();
  }

  loaderElement.style.display = 'flex';

  const textureLoader = new THREE.TextureLoader();
  textureLoader.load(
    imagePath,
    function (texture) {
      const geometry = new THREE.SphereGeometry(600, 60, 40);
      geometry.scale(-1, 1, 1);

      const material = new THREE.MeshBasicMaterial({ map: texture, transparent: true, opacity: 0 });
      sphere = new THREE.Mesh(geometry, material);
      scene.add(sphere);

      let opacity = 0;
      const fadeIn = () => {
        opacity += 0.02;
        sphere.material.opacity = opacity;
        if (opacity < 1) requestAnimationFrame(fadeIn);
        else loaderElement.style.display = 'none';
      };
      fadeIn();

      if (imagePath === '/images/panorama1.jpg') {
        createHotspotSpherical(600, Math.PI / 4, Math.PI / 2, 'Vers la cuisine', '/images/panorama6.jpg');
      } else if (imagePath === '/images/panorama6.jpg') {
        createHotspotSpherical(600, Math.PI / 3, Math.PI / 2.5, 'Retour au salon', '/images/panorama1.jpg');
      }
    },
    undefined,
    function (error) {
      console.error('Erreur de chargement :', error);
      loaderElement.innerText = 'Erreur de chargement.';
    }
  );
}

function animate() {
  requestAnimationFrame(animate);
  controls.update();
  renderer.render(scene, camera);
}

function sphericalToCartesian(radius, theta, phi) {
  const x = radius * Math.sin(phi) * Math.cos(theta);
  const y = radius * Math.cos(phi);
  const z = radius * Math.sin(phi) * Math.sin(theta);
  return new THREE.Vector3(x, y, z);
}

function createHotspotSpherical(radius, theta, phi, label = '', targetPanorama = null) {
  const position = sphericalToCartesian(radius, theta, phi);

  const hotspotGeometry = new THREE.CircleGeometry(5, 32);
  const hotspotMaterial = new THREE.MeshBasicMaterial({ color: 0xffcc00, side: THREE.DoubleSide });
  const hotspot = new THREE.Mesh(hotspotGeometry, hotspotMaterial);
  hotspot.position.copy(position);
  hotspot.lookAt(camera.position);
  scene.add(hotspot);

  const edgeGeometry = new THREE.RingGeometry(5.2, 5.5, 32);
  const edgeMaterial = new THREE.MeshBasicMaterial({ color: 0x000000 });
  const edge = new THREE.Mesh(edgeGeometry, edgeMaterial);
  edge.position.copy(position);
  edge.lookAt(camera.position);
  scene.add(edge);

  hotspot.userData.label = label;
  hotspot.userData.target = targetPanorama;
  hotspot.callback = () => {
    if (targetPanorama) initPanorama(targetPanorama);
    else alert(label || 'Hotspot cliqué');
  };
}

renderer.domElement.addEventListener('click', (event) => {
  const mouse = new THREE.Vector2(
    (event.clientX / window.innerWidth) * 2 - 1,
    -(event.clientY / window.innerHeight) * 2 + 1
  );
  const raycaster = new THREE.Raycaster();
  raycaster.setFromCamera(mouse, camera);
  const intersects = raycaster.intersectObjects(scene.children);
  if (intersects.length > 0 && intersects[0].object.callback) {
    intersects[0].object.callback();
  }
});

renderer.domElement.addEventListener('mousemove', (event) => {
  const mouse = new THREE.Vector2(
    (event.clientX / window.innerWidth) * 2 - 1,
    -(event.clientY / window.innerHeight) * 2 + 1
  );
  const raycaster = new THREE.Raycaster();
  raycaster.setFromCamera(mouse, camera);
  const intersects = raycaster.intersectObjects(scene.children);
  if (intersects.length > 0 && intersects[0].object.userData.label) {
    hotspotLabel.innerText = intersects[0].object.userData.label;
    hotspotLabel.style.left = `${event.clientX + 10}px`;
    hotspotLabel.style.top = `${event.clientY + 10}px`;
    hotspotLabel.style.display = 'block';
  } else {
    hotspotLabel.style.display = 'none';
  }
});
