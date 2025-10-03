<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  <title>Gérer Profil - Empire-Immo</title>

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
            <a class="nav-link text-warning" href="/properties">Logements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/property-details">Détails des logements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/contact">Contactez-nous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning active" href="/gerer-profil"><i class="fa fa-user me-1"></i>Mon profil</a>
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
      <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-user-cog me-2"></i>Gérer Mon Profil</h4>
          </div>
          <div class="card-body p-4">
            
            <!-- Profile Information -->
            <div class="row mb-4">
              <div class="col-md-4 text-center">
                <div class="mb-3">
                  <img src="https://via.placeholder.com/150x150/007bff/ffffff?text=Photo" alt="Photo de profil" class="img-fluid rounded-circle border border-primary">
        </div>
                <button class="btn btn-outline-primary btn-sm">
                  <i class="fas fa-camera me-1"></i>Changer la photo
                </button>
              </div>
              <div class="col-md-8">
                <h5 class="text-primary">Informations Personnelles</h5>
                <form>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="nom" class="form-label">Nom</label>
                      <input type="text" class="form-control" id="nom" value="{{ Auth::user()->nom ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="prenom" class="form-label">Prénom</label>
                      <input type="text" class="form-control" id="prenom" value="{{ Auth::user()->prenom ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" value="{{ Auth::user()->email ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="telephone" class="form-label">Téléphone</label>
                      <input type="tel" class="form-control" id="telephone" placeholder="+237 XXX XX XX XX">
                    </div>
                    <div class="col-12 mb-3">
                      <label for="adresse" class="form-label">Adresse</label>
                      <textarea class="form-control" id="adresse" rows="2" placeholder="Votre adresse complète"></textarea>
                    </div>
                </div>
                </form>
              </div>
            </div>

            <hr class="my-4">

            <!-- Account Settings -->
            <div class="mb-4">
              <h5 class="text-primary">Paramètres du Compte</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="role" class="form-label">Type de compte</label>
                  <select class="form-select" id="role">
                    <option value="locataire" {{ Auth::user()->role === 'locataire' ? 'selected' : '' }}>Locataire</option>
                    <option value="bailleur" {{ Auth::user()->role === 'bailleur' ? 'selected' : '' }}>Bailleur</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="statut" class="form-label">Statut</label>
                  <select class="form-select" id="statut">
                    <option value="actif" {{ Auth::user()->status === 'actif' ? 'selected' : '' }}>Actif</option>
                    <option value="inactif" {{ Auth::user()->status === 'inactif' ? 'selected' : '' }}>Inactif</option>
                  </select>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <!-- Security Settings -->
            <div class="mb-4">
              <h5 class="text-primary">Sécurité</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="current_password" class="form-label">Mot de passe actuel</label>
                  <input type="password" class="form-control" id="current_password" placeholder="Entrez votre mot de passe actuel">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="new_password" class="form-label">Nouveau mot de passe</label>
                  <input type="password" class="form-control" id="new_password" placeholder="Entrez le nouveau mot de passe">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                  <input type="password" class="form-control" id="confirm_password" placeholder="Confirmez le nouveau mot de passe">
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2 justify-content-end">
              <button type="button" class="btn btn-outline-secondary">
                <i class="fas fa-times me-1"></i>Annuler
              </button>
              <button type="button" class="btn btn-primary">
                <i class="fas fa-save me-1"></i>Sauvegarder
              </button>
            </div>

          </div>
        </div>

        <!-- Additional Options -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body text-center">
                <i class="fas fa-cog fa-2x text-primary mb-3"></i>
                <h6>Paramètres Avancés</h6>
                <p class="text-muted small">Gérez vos préférences et notifications</p>
                <a href="/settings/appearance" class="btn btn-outline-primary btn-sm">Configurer</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body text-center">
                <i class="fas fa-shield-alt fa-2x text-danger mb-3"></i>
                <h6>Sécurité</h6>
                <p class="text-muted small">Gérez la sécurité de votre compte</p>
                <a href="/settings/password" class="btn btn-outline-danger btn-sm">Sécuriser</a>
        </div>
            </div>
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