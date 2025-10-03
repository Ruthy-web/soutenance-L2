@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 m-0">Visite virtuelle</h1>
    <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">Retour</a>
  </div>

  <div class="row g-4">
    <div class="col-12 col-lg-8">
      <div id="tour-canvas" class="bg-dark rounded position-relative" style="height: 60vh;">
        <div class="position-absolute top-50 start-50 translate-middle text-white-50">
          Chargement du panorama...
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3">Informations</h5>
          <div id="tour-info">
            <div class="text-muted">Sélectionnez un hotspot pour voir les détails.</div>
          </div>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Paramètres</h6>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="autoRotateSwitch">
            <label class="form-check-label" for="autoRotateSwitch">Rotation automatique</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  window.VIRTUAL_TOUR_CONFIG = @json($tourConfig);
  window.VIRTUAL_TOUR_PANORAMAS = @json($panoramas);
</script>
<script>
  // Configuration pour votre implémentation Three.js existante
  document.addEventListener('DOMContentLoaded', () => {
    const config = window.VIRTUAL_TOUR_CONFIG || {};
    const panoramas = window.VIRTUAL_TOUR_PANORAMAS || {};
    
    // Passer les données à votre classe AdvancedVirtualTour
    window.tourConfig = {
      ...config,
      panoramas: panoramas,
      startPanorama: config.startPanorama || Object.keys(panoramas)[0]
    };
    
    // Votre classe AdvancedVirtualTour dans app.js va automatiquement s'initialiser
    console.log('Configuration passée à AdvancedVirtualTour:', window.tourConfig);
  });
</script>

<!-- Charger votre implémentation Three.js via Vite -->
@vite(['resources/js/app.js'])
@endsection

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'Visite Virtuelle' }}</title>
  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      overflow: hidden;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #000;
    }

    #viewer {
      width: 100vw;
      height: 100vh;
      position: relative;
    }

    canvas {
      display: block;
      width: 100%;
      height: 100%;
    }

    #loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-size: 1.5em;
      z-index: 1000;
      transition: opacity 0.5s ease;
    }

    #loader.hidden {
      opacity: 0;
      pointer-events: none;
    }

    .loader-content {
      text-align: center;
    }

    .loader-spinner {
      width: 50px;
      height: 50px;
      border: 4px solid rgba(255, 255, 255, 0.1);
      border-top-color: #fff;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin: 0 auto 20px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .loader-text {
      font-size: 18px;
      margin-top: 10px;
    }

    .loader-progress {
      width: 200px;
      height: 4px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 2px;
      margin: 20px auto 0;
      overflow: hidden;
    }

    .loader-progress-bar {
      height: 100%;
      background: linear-gradient(90deg, #00aaff, #00ffaa);
      width: 0%;
      transition: width 0.3s ease;
    }

    #controlPanel {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(15px);
      padding: 12px 20px;
      border-radius: 50px;
      display: flex;
      gap: 12px;
      z-index: 100;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .control-btn {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      color: white;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 20px;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .control-btn:hover {
      background: rgba(255, 255, 255, 0.25);
      transform: translateY(-2px);
    }

    .control-btn:active {
      transform: translateY(0);
    }

    .control-btn.active {
      background: rgba(0, 170, 255, 0.5);
      border: 1px solid rgba(0, 170, 255, 0.8);
    }

    .control-btn-tooltip {
      position: absolute;
      bottom: 55px;
      background: rgba(0, 0, 0, 0.9);
      color: white;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 12px;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s ease;
    }

    .control-btn:hover .control-btn-tooltip {
      opacity: 1;
    }

    #hotspotLabel {
      position: absolute;
      display: none;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      padding: 10px 16px;
      border-radius: 8px;
      font-size: 14px;
      color: #333;
      border: 1px solid rgba(0, 0, 0, 0.1);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      z-index: 50;
      pointer-events: none;
      font-weight: 500;
      max-width: 250px;
    }

    #infoPanel {
      position: fixed;
      top: 20px;
      left: 20px;
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(15px);
      padding: 20px;
      border-radius: 12px;
      color: white;
      max-width: 320px;
      z-index: 100;
      display: none;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    #infoPanel h3 {
      margin: 0 0 10px 0;
      font-size: 20px;
      color: #00aaff;
    }

    #infoPanel p {
      margin: 0;
      line-height: 1.6;
      font-size: 14px;
      color: rgba(255, 255, 255, 0.9);
    }

    #minimapContainer {
      position: fixed;
      top: 20px;
      right: 20px;
      width: 220px;
      height: 220px;
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(15px);
      border-radius: 12px;
      border: 2px solid rgba(255, 255, 255, 0.2);
      display: none;
      z-index: 100;
      overflow: hidden;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
      padding: 10px;
    }

    .minimap-title {
      color: white;
      font-size: 12px;
      font-weight: 600;
      margin-bottom: 8px;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    #roomList {
      position: fixed;
      top: 20px;
      left: 20px;
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(15px);
      padding: 15px;
      border-radius: 12px;
      color: white;
      max-width: 200px;
      z-index: 90;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .room-list-title {
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 12px;
      color: #00aaff;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .room-item {
      padding: 8px 12px;
      margin: 5px 0;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 13px;
      border: 1px solid transparent;
    }

    .room-item:hover {
      background: rgba(255, 255, 255, 0.15);
      border-color: rgba(0, 170, 255, 0.5);
      transform: translateX(5px);
    }

    .room-item.active {
      background: rgba(0, 170, 255, 0.3);
      border-color: rgba(0, 170, 255, 0.8);
    }

    /* Modal Styles */
    .modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.9);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 200;
      backdrop-filter: blur(5px);
    }

    .modal.active {
      display: flex;
    }

    .modal-content {
      background: white;
      padding: 30px;
      border-radius: 12px;
      max-width: 600px;
      max-height: 80vh;
      overflow-y: auto;
      position: relative;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .modal-close {
      position: absolute;
      top: 15px;
      right: 15px;
      background: rgba(0, 0, 0, 0.1);
      border: none;
      width: 35px;
      height: 35px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .modal-close:hover {
      background: rgba(0, 0, 0, 0.2);
      transform: rotate(90deg);
    }

    /* Responsive */
    @media (max-width: 768px) {
      #controlPanel {
        bottom: 15px;
        padding: 10px 15px;
        gap: 8px;
      }

      .control-btn {
        width: 40px;
        height: 40px;
        font-size: 18px;
      }

      #infoPanel, #roomList, #minimapContainer {
        display: none !important;
      }
    }

    /* Transition effects */
    .fade-enter {
      opacity: 0;
    }

    .fade-enter-active {
      opacity: 1;
      transition: opacity 0.5s ease;
    }

    .fade-exit {
      opacity: 1;
    }

    .fade-exit-active {
      opacity: 0;
      transition: opacity 0.5s ease;
    }
  </style>

  @vite(['resources/js/app.js'])
</head>
<body>
  <!-- Viewer Container -->
  <div id="viewer"></div>

  <!-- Loader -->
  <div id="loader">
    <div class="loader-content">
      <div class="loader-spinner"></div>
      <div class="loader-text">Chargement de la visite virtuelle...</div>
      <div class="loader-progress">
        <div class="loader-progress-bar" id="loaderProgress"></div>
      </div>
    </div>
  </div>

  <!-- Room List -->
  <div id="roomList">
    <div class="room-list-title">Pièces</div>
    <div id="roomListContent"></div>
  </div>

  <!-- Pass Laravel data to JavaScript -->
  <script>
    window.tourConfig = {!! json_encode($tourConfig ?? []) !!};
    window.panoramas = {!! json_encode($panoramas ?? []) !!};
    window.assetPath = "{{ asset('') }}";
  </script>

  <!-- Info Modal -->
  <div id="infoModal" class="modal">
    <div class="modal-content">
      <button class="modal-close" onclick="closeModal('infoModal')">×</button>
      <div id="infoModalContent"></div>
    </div>
  </div>

  <!-- Media Modal -->
  <div id="mediaModal" class="modal">
    <div class="modal-content">
      <button class="modal-close" onclick="closeModal('mediaModal')">×</button>
      <div id="mediaModalContent"></div>
    </div>
  </div>
<script>
    window.assetPath = "{{ rtrim(asset(''), '/') }}";
</script>

  <script>
    
    function closeModal(modalId) {
      document.getElementById(modalId).classList.remove('active');
    }

    // Close modals on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        document.querySelectorAll('.modal').forEach(modal => {
          modal.classList.remove('active');
        });
      }
    });

    // Close modals on background click
    document.querySelectorAll('.modal').forEach(modal => {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
    });
  </script>
 
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</htm