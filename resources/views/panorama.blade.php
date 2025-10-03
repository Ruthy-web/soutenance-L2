<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Panorama généré</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { margin: 0; overflow: hidden; }
    canvas { display: block; }
    #loader {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: #000;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5em;
      z-index: 10;
    }
  </style>
  @vite('resources/js/app.js')
</head>
<body>
  <div id="loader">Chargement du panorama...</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
