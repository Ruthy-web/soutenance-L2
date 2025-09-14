<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>À propos - Empire-Immo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body, html {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('background.png.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background-color: rgba(0,0,0,0.7);
      color: #fff;
      text-align: center;
      padding: 30px 15px;
    }

    main {
      flex: 1;
      padding: 50px 20px;
    }

    .section {
      background-color: rgba(255,255,255,0.95);
      padding: 40px;
      border-radius: 15px;
      max-width: 1000px;
      margin: 30px auto;
      box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }

    .team-card {
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .team-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .values i {
      font-size: 2rem;
      color: #ffc107;
      margin-bottom: 10px;
    }

    footer {
      background-color: rgba(0,0,0,0.7);
      color: #fff;
      text-align: center;
      padding: 20px 0;

 .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
        
      <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
      <img src="logo.png" alt="Logo Empire-Immo" width="40" height="40" class="me-2">
      Empire-Immo
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="/apropos">À propos</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
        </ul>
  </header>
   

  <!-- Contenu principal -->
  <main>

    <!-- Mission -->
    <section class="section text-center">
      <h2 class="mb-4">Notre mission</h2>
      <p class="fs-5">
        Chez Empire-Immo, nous facilitons la recherche et la gestion de logements pour nos utilisateurs. 
        Nous proposons une large sélection de biens adaptés à chaque besoin, avec un service fiable, sécurisé et accessible.
      </p>
    </section>

    <!-- Équipe -->
    <section class="section">
      <h2 class="mb-4 text-center">Notre équipe</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card team-card text-center p-3">
            <img src="photo15.jpg" class="card-img-top rounded-circle mx-auto" alt="Jean Dupont" style="width:150px;height:150px;">
            <div class="card-body">
              <h5 class="card-title">Jean Dupont</h5>
              <p class="card-text">Fondateur & CEO</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card team-card text-center p-3">
            <img src="photo13.jpg" class="card-img-top rounded-circle mx-auto" alt="Marie Kamdem" style="width:150px;height:150px;">
            <div class="card-body">
              <h5 class="card-title">Marie Kamdem</h5>
              <p class="card-text">Responsable marketing</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card team-card text-center p-3">
            <img src="photo14.jpg" class="card-img-top rounded-circle mx-auto" alt="Paul Nguema" style="width:150px;height:150px;">
            <div class="card-body">
              <h5 class="card-title">Paul Nguema</h5>
              <p class="card-text">Développement & Support</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Valeurs -->
    <section class="section text-center">
      <h2 class="mb-4">Nos valeurs</h2>
      <div class="row g-4 justify-content-center values">
        <div class="col-md-3">
          <i class="fas fa-handshake"></i>
          <h5>Transparence</h5>
          <p>Nous privilégions la confiance et la clarté avec nos clients.</p>
        </div>
        <div class="col-md-3">
          <i class="fas fa-users"></i>
          <h5>Accessibilité</h5>
          <p>Des services simples et accessibles pour tous.</p>
        </div>
        <div class="col-md-3">
          <i class="fas fa-lightbulb"></i>
          <h5>Innovation</h5>
          <p>Des solutions modernes pour répondre aux besoins immobiliers.</p>
        </div>
        <div class="col-md-3">
          <i class="fas fa-headset"></i>
          <h5>Support client</h5>
          <p>Nous accompagnons nos clients à chaque étape.</p>
        </div>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer>
    <p>© 2025 Empire-Immo. Tous droits réservés.</p>
    <p>Contact : contact@empire-immo.com</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
