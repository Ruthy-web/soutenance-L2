<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Empire-immo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  </head>

<body class="bg-light">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

  <!-- Sub Header -->
  <div class="bg-secondary py-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="list-inline mb-0">
            <li class="list-inline-item me-3"><i class="fa fa-envelope me-1"></i> Empireimmo@gmail.com</li>
            <li class="list-inline-item"><i class="fa fa-map me-1"></i> Yaoundé- Cameroun</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="list-inline mb-0 text-end">
            <li class="list-inline-item me-2"><a href="#" class="text-warning"><i class="fab fa-facebook"></i></a></li>
            <li class="list-inline-item me-2"><a href="https://x.com/minthu" target="_blank" class="text-warning"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item me-2"><a href="#" class="text-warning"><i class="fab fa-linkedin"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-warning"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand fw-bold d-flex align-items-center text-warning" href="#">
      <img src="logo.png" alt="Logo Empire-Immo" width="40" height="40" class="me-2">
      Empire-Immo
    </a>
    
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-warning" href="/locataire">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/properties">Biens</a>
</li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/property-details">Détails des biens</a>
              </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/contact">Contactez nous</a>
              </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/gerer-profil"><i class="fa fa-user me-1"></i>Mon profil</a>
              </li>
          <li class="nav-item">
            <button id="darkModeToggle" class="btn btn-sm btn-outline-warning ms-2">🌙 Mode sombre</button>
              </li>
            </ul>
      </div>
    </div>
  </nav>

  <!-- Main Banner -->
  <div class="bg-primary py-5">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <span class="text-warning fs-5">Yaoundé, <em>Cameroun</em></span>
          <h1 class="display-4 fw-bold text-warning mt-3">Dépêchez-vous!</h1>
          <h2 class="display-5 fw-bold text-light">Obtiens ton meilleur logement</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Featured Section -->
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-home fa-3x text-primary mb-3"></i>
              <h5 class="card-title">Recherche de Logement</h5>
              <p class="card-text">Trouvez le logement parfait selon vos critères et votre budget.</p>
              <a href="/properties" class="btn btn-primary">Voir les biens</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-eye fa-3x text-primary mb-3"></i>
              <h5 class="card-title">Visite Virtuelle</h5>
              <p class="card-text">Explorez les propriétés en 360° avant de vous déplacer.</p>
              <a href="/virtual-tour" class="btn btn-primary">Commencer la visite</a>
  </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-calendar fa-3x text-primary mb-3"></i>
              <h5 class="card-title">Réservation</h5>
              <p class="card-text">Réservez facilement votre logement en ligne.</p>
              <a href="/reservation" class="btn btn-primary">Réserver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5 class="text-warning">Empire-Immo</h5>
          <p>Votre partenaire de confiance pour trouver le logement parfait au Cameroun.</p>
          <div class="d-flex gap-3">
            <a href="#" class="text-warning"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#" class="text-warning"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#" class="text-warning"><i class="fab fa-linkedin fa-lg"></i></a>
            <a href="#" class="text-warning"><i class="fab fa-instagram fa-lg"></i></a>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <h5 class="text-warning">Services</h5>
          <ul class="list-unstyled">
            <li><a href="/properties" class="text-light text-decoration-none">Recherche de logement</a></li>
            <li><a href="/virtual-tour" class="text-light text-decoration-none">Visite virtuelle</a></li>
            <li><a href="/reservation" class="text-light text-decoration-none">Réservation</a></li>
            <li><a href="/contact" class="text-light text-decoration-none">Contact</a></li>
            </ul>
        </div>
        <div class="col-lg-4 mb-4">
          <h5 class="text-warning">Contact</h5>
          <p><i class="fa fa-envelope me-2"></i> Empireimmo@gmail.com</p>
          <p><i class="fa fa-map me-2"></i> Yaoundé, Cameroun</p>
        </div>
      </div>
      <hr class="my-4">
      <div class="row">
        <div class="col-12 text-center">
          <p class="mb-0">&copy; 2025 Empire-Immo. Tous droits réservés.</p>
        </div>
      </div>
    </div>
  </footer>

  <script>
  const toggleButton = document.getElementById("darkModeToggle");
  const body = document.body;

  // Vérifie si l'utilisateur a déjà choisi un mode (sauvegardé dans localStorage)
  if (localStorage.getItem("darkMode") === "enabled") {
    body.classList.add("dark-mode");
    toggleButton.textContent = "☀️ Mode clair";
  }

  toggleButton.addEventListener("click", () => {
    body.classList.toggle("dark-mode");

    if (body.classList.contains("dark-mode")) {
      localStorage.setItem("darkMode", "enabled");
      toggleButton.textContent = "☀️ Mode clair";
    } else {
      localStorage.setItem("darkMode", "disabled");
      toggleButton.textContent = "🌙 Mode sombre";
    }
  });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>