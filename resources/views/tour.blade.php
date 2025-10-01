<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tour Virtuel</title>
  @vite('resources/js/tour.js')
  <style>
    body, html {
      margin: 0;
      padding: 0;
      overflow: hidden;
      height: 100%;
      background: #000;
    }
    #loader {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.8);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      z-index: 1000;
    }
    #hotspotLabel {
      position: absolute;
      display: none;
      background: #fff;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 14px;
      box-shadow: 0 0 5px rgba(0,0,0,0.3);
      z-index: 10;
    }
  </style>
</head>
<body>
  <div id="loader">Chargement de la visite virtuelle…</div>
  <div id="hotspotLabel"></div>
</body>
</html>
