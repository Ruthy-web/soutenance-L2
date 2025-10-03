<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  <title>Mes Logements - Empire-Immo</title>

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
            <a class="nav-link text-warning" href="/bailleur">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning active" href="/mes-logements">Mes logements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/reservation">Reservations</a>
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

  <!-- Main Content -->
  <div class="container py-5">
    
    <!-- Header Section -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="text-primary mb-1"><i class="fas fa-home me-2"></i>Mes Logements</h2>
            <p class="text-muted">Gérez vos propriétés et leurs réservations</p>
          </div>
<div>
            <a href="/ajouter-logement" class="btn btn-primary">
              <i class="fas fa-plus me-1"></i>Ajouter un logement
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
      <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
          <div class="card-body text-center">
            <i class="fas fa-home fa-2x mb-2"></i>
            <h4 class="mb-0">12</h4>
            <small>Total Logements</small>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
          <div class="card-body text-center">
            <i class="fas fa-check-circle fa-2x mb-2"></i>
            <h4 class="mb-0">8</h4>
            <small>Disponibles</small>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
          <div class="card-body text-center">
            <i class="fas fa-calendar fa-2x mb-2"></i>
            <h4 class="mb-0">4</h4>
            <small>Réservés</small>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="card bg-info text-white">
          <div class="card-body text-center">
            <i class="fas fa-dollar-sign fa-2x mb-2"></i>
            <h4 class="mb-0">2.4M</h4>
            <small>Revenus (FCFA)</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Properties List -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Liste des Logements</h5>
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary btn-sm active">Tous</button>
                <button type="button" class="btn btn-outline-primary btn-sm">Disponibles</button>
                <button type="button" class="btn btn-outline-primary btn-sm">Réservés</button>
              </div>
            </div>
          </div>
          <div class="card-body p-0">
            
            <!-- Property Item 1 -->
            <div class="border-bottom p-3">
              <div class="row align-items-center">
                <div class="col-md-2">
                  <img src="https://via.placeholder.com/100x80/007bff/ffffff?text=Villa" alt="Villa" class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                  <h6 class="mb-1">Villa Moderne - Bastos</h6>
                  <p class="text-muted small mb-1">4 chambres • 3 salles de bain • 250m²</p>
                  <span class="badge bg-success">Disponible</span>
                </div>
                <div class="col-md-2">
                  <div class="text-center">
                    <h6 class="text-primary mb-0">450,000</h6>
                    <small class="text-muted">FCFA/mois</small>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="text-center">
                    <small class="text-muted">Dernière visite</small>
                    <div>15 Jan 2025</div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="btn-group-vertical btn-group-sm">
                    <button class="btn btn-outline-primary btn-sm">
                      <i class="fas fa-edit"></i> Modifier
                    </button>
                    <button class="btn btn-outline-info btn-sm">
                      <i class="fas fa-eye"></i> Voir
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                      <i class="fas fa-trash"></i> Supprimer
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property Item 2 -->
            <div class="border-bottom p-3">
              <div class="row align-items-center">
                <div class="col-md-2">
                  <img src="https://via.placeholder.com/100x80/28a745/ffffff?text=Apt" alt="Appartement" class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                  <h6 class="mb-1">Appartement - Centre Ville</h6>
                  <p class="text-muted small mb-1">2 chambres • 1 salle de bain • 120m²</p>
                  <span class="badge bg-warning">Réservé</span>
                </div>
                <div class="col-md-2">
                  <div class="text-center">
                    <h6 class="text-primary mb-0">180,000</h6>
                    <small class="text-muted">FCFA/mois</small>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="text-center">
                    <small class="text-muted">Dernière visite</small>
                    <div>10 Jan 2025</div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="btn-group-vertical btn-group-sm">
                    <button class="btn btn-outline-primary btn-sm">
                      <i class="fas fa-edit"></i> Modifier
                    </button>
                    <button class="btn btn-outline-info btn-sm">
                      <i class="fas fa-eye"></i> Voir
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                      <i class="fas fa-trash"></i> Supprimer
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Property Item 3 -->
            <div class="p-3">
              <div class="row align-items-center">
                <div class="col-md-2">
                  <img src="https://via.placeholder.com/100x80/dc3545/ffffff?text=Studio" alt="Studio" class="img-fluid rounded">
                </div>
                <div class="col-md-4">
                  <h6 class="mb-1">Studio - Mvan</h6>
                  <p class="text-muted small mb-1">1 chambre • 1 salle de bain • 60m²</p>
                  <span class="badge bg-success">Disponible</span>
                </div>
                <div class="col-md-2">
                  <div class="text-center">
                    <h6 class="text-primary mb-0">120,000</h6>
                    <small class="text-muted">FCFA/mois</small>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="text-center">
                    <small class="text-muted">Dernière visite</small>
                    <div>08 Jan 2025</div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="btn-group-vertical btn-group-sm">
                    <button class="btn btn-outline-primary btn-sm">
                      <i class="fas fa-edit"></i> Modifier
                    </button>
                    <button class="btn btn-outline-info btn-sm">
                      <i class="fas fa-eye"></i> Voir
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                      <i class="fas fa-trash"></i> Supprimer
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
      <div class="col-md-4 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-chart-line fa-2x text-primary mb-3"></i>
            <h6>Statistiques</h6>
            <p class="text-muted small">Consultez les performances de vos logements</p>
            <button class="btn btn-outline-primary btn-sm">Voir les stats</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-calendar-check fa-2x text-success mb-3"></i>
            <h6>Réservations</h6>
            <p class="text-muted small">Gérez les réservations de vos logements</p>
            <a href="/reservation" class="btn btn-outline-success btn-sm">Voir les réservations</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-camera fa-2x text-info mb-3"></i>
            <h6>Visite Virtuelle</h6>
            <p class="text-muted small">Créez des visites virtuelles pour vos logements</p>
            <a href="/virtual-tour" class="btn btn-outline-info btn-sm">Créer une visite</a>
          </div>
        </div>
      </div>
    </div>

</div>

  <!-- Footer -->
  <footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
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