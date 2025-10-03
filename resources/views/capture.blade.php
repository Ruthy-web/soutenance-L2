<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Capture Panoramique</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      text-align: center;
      background: #111;
      color: #fff;
    }
    #preview {
      width: 100%;
      max-width: 400px;
      margin: auto;
      border: 2px solid #fff;
    }
    #guide {
      margin-top: 20px;
      font-size: 1.2em;
    }
    #startBtn, #generateBtn {
      margin-top: 20px;
    }
    #gallery img {
      margin: 5px;
      width: 100px;
      border: 2px solid #fff;
    }
    #uploadSection {
      margin-top: 30px;
    }
    .btn-warning {
      background-color: #ffc107;
      border: none;
      color: #000;
    }
    .btn-warning:hover {
      background-color: #e0a800;
      color: #fff;
    }
  </style>
</head>
<body>
  <h1>Capture Panoramique</h1>
  <video id="preview" autoplay playsinline></video>
  <div id="guide">Tournez lentement sur vous-même…</div>

  <button id="startBtn" class="btn btn-warning">Commencer la capture</button>

  <div id="uploadSection" class="text-center">
    <label for="panoramaUpload" class="form-label mt-4">Importer une image panoramique :</label><br>
    <input type="file" id="panoramaUpload" accept="image/*" class="btn btn-warning mt-2" style="display: block; margin: 0 auto;">
  </div>

  <div id="gallery" class="mt-4"></div>

  <button id="generateBtn" class="btn btn-warning mt-4">Générer la visite virtuelle</button>

  <script>
    // Activation de la caméra
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => {
        const video = document.getElementById('preview');
        video.srcObject = stream;
      })
      .catch(error => {
        console.error('Erreur d’accès à la caméra :', error);
        document.getElementById('guide').textContent = "Impossible d'accéder à la caméra.";
      });

    // Capture d’image (simulation)
    document.getElementById('startBtn').addEventListener('click', () => {
      const video = document.getElementById('preview');
      const canvas = document.createElement('canvas');
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

      const img = document.createElement('img');
      img.src = canvas.toDataURL('image/png');
      document.getElementById('gallery').appendChild(img);
    });

    // Importation d’image panoramique
    document.getElementById('panoramaUpload').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (!file) return;

      if (!file.type.startsWith('image/')) {
        alert('Veuillez importer une image panoramique.');
        return;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        document.getElementById('gallery').appendChild(img);
      };
      reader.readAsDataURL(file);
    });

    // Génération de la visite virtuelle
    document.getElementById('generateBtn').addEventListener('click', () => {
      alert("Visite virtuelle générée avec succès !");
      // Tu peux ici envoyer les images au backend ou rediriger vers une page de visualisation
    });
  </script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
