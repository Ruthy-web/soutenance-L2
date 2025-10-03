<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un logement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url(background.png.jpg);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
    }

    .form-container {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      border: 2px solid #dee2e6;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      background-color: rgba(255, 255, 255, 0.95);
    }

    label {
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #1c1489;
    }
  </style><!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


</head>
<body>

  <div class="form-container">
    <form method="POST" action="/ajouter-logement" enctype="multipart/form-data">
      @csrf
      <h2 class="mb-4 text-center">Ajouter un logement</h2>

      <!-- Titre -->
      <div class="mb-3">
        <label for="titre" class="form-label">Titre du logement</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
      </div>

      <!-- Description -->
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
      </div>

      <!-- Localisation -->
      <div class="mb-3">
        <label for="localisation" class="form-label">Localisation exacte</label>
        <input type="text" class="form-control" id="localisation" name="localisation" placeholder="Ex: Awae Escalier, Yaoundé" required>
      </div>

      <!-- Surface, chambres, salles de bain -->
      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="surface" class="form-label">Surface (m²)</label>
          <input type="number" class="form-control" id="surface" name="surface" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="chambres" class="form-label">Chambres</label>
          <input type="number" class="form-control" id="chambres" name="chambres" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="salles_bain" class="form-label">Salles de bain</label>
          <input type="number" class="form-control" id="salles_bain" name="salles_bain" required>
        </div>
      </div>

      <!-- Document légal -->
      <div class="mb-3">
        <label for="document_legal" class="form-label">Document légal du bailleur</label>
        <input type="file" class="form-control" id="document_legal" name="document_legal" accept=".pdf,.jpg,.jpeg,.png" required>
        <small class="text-muted">Ex : titre foncier, acte notarié, etc.</small>
      </div>

      <div class="row mb-3">
  <div class="col-md-6">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" class="form-control" id="latitude" name="latitude" readonly>
  </div>
  <div class="col-md-6">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" class="form-control" id="longitude" name="longitude" readonly>
  </div>
  <div class="text-end mt-2">
    <button type="button" class="btn btn-outline-secondary" onclick="getLocation()">📍 Détecter ma position</button>
  </div>
</div>


      <div class="mb-3">
  <label class="form-label">Localisation sur la carte</label>
  <div id="map" style="height: 300px; border: 1px solid #ccc;"></div>
</div>

<!-- Champs cachés pour latitude et longitude -->
<input type="hidden" name="latitude" id="latitude">
<input type="hidden" name="longitude" id="longitude">



      <!-- Bouton vers la page de capture pour la visite virtuelle -->
<div class="mb-3 text-center">
  <a href="/capture" class="btn btn-outline-warning">
    📸 Générer la visite virtuelle
  </a>
</div>

      <!-- Bouton -->
      <div class="text-center">
        <button type="submit" class="btn btn-warning w-50">Enregistrer</button>
      </div>


    </form>
  </div>

<script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
      }, function(error) {
        alert("Erreur de géolocalisation : " + error.message);
      });
    } else {
      alert("La géolocalisation n’est pas supportée par ce navigateur.");
    }
  }
</script>

<script>
  // Initialiser la carte centrée sur Yaoundé
  var map = L.map('map').setView([3.866, 11.521], 13);

  // Ajouter les tuiles OpenStreetMap
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // Marqueur cliquable
  var marker;

  map.on('click', function(e) {
    var lat = e.latlng.lat.toFixed(6);
    var lng = e.latlng.lng.toFixed(6);

    // Mettre à jour les champs cachés
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;

    // Ajouter ou déplacer le marqueur
    if (marker) {
      marker.setLatLng(e.latlng);
    } else {
      marker = L.marker(e.latlng).addTo(map);
    }
  });
</script>

  

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
