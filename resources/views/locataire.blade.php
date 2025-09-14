<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Page d'accueil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <style>
  body {
    transition: background-color 0.3s, color 0.3s;
    padding-top: 70px; /* Hauteur de ta barre de navigation */
  }

  /* Mode sombre */
  body.dark-mode {
    background-color: #171515ff !important;
    color: white !important;
  }

  /* Bouton de changement de mode */
  #theme-toggle {
    padding: 8px 16px;
    margin: 10px;
    border: none;
    border-radius: 4px;
    background: #ccc;
    cursor: pointer;
  }

  .welcome-section {
    height: 90vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    overflow: hidden;
  }

  .welcome-section::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-image: url("background.png.jpg");
    background-size: cover;
    background-position: center;
    filter: blur(3px) brightness(70%);
    z-index: 1;
  }

  .welcome-section > * {
    position: relative;
    z-index: 2;
  }

  .btn-custom {
    margin: 10px;
    width: 150px;
  }

  /* ✅ Barre de navigation fixe */
  .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
</style>

</head>

<body>

  <!-- ✅ Header -->
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
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
         <a href="#" class="btn btn-dark ms-3">Publier un logement</a>

         <button id="theme-toggle">Changer mode</button>

<script>
  // Appliquer le thème sauvegardé
  if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-mode');
  }

  // Basculer entre sombre et clair
  document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('theme',
      document.body.classList.contains('dark-mode') ? 'dark' : 'light'
    );
  });
</script>
      </div>
    </div>
  </nav>


  <!-- ✅ Message de bienvenue -->
  <div class="welcome-section">
    <h1 class="fw-bold mb-2">Bienvenue sur Empire-Immo</h1>
    <p class="mb-2">Votre plateforme de confiance pour location immobilière.</p>
    <div>
      <a href="/connexion" class="btn btn-warning btn-custom">Se connecter</a>
      <a href="/creer_compte" class="btn btn-warning btn-custom">S'inscrire</a>
    </div>
  </div>

 <div>
  <section class="container my-5">
  <h3 class="mb-4 text-center">Recherchez un logement</h3>
  <form class="row g-3 justify-content-center">
    <div class="col-md-3">
      <select class="form-select" aria-label="Type de bien">
        <option selected>Type de bien</option>
        <option value="1">Appartement</option>
        <option value="2">Maison</option>
        <option value="3">Studio</option>
         <option value="3">Chambre</option>
              <option value="3">Villa</option>
      </select>
        </div>
    <div class="col-md-3">
      <input type="text" class="form-control" placeholder="Ville ou quartier" />
    </div>
    <div class="col-md-3">
      <input type="number" class="form-control" placeholder="Budget max (FCFA)" />
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-secondary w-100">Rechercher</button>
    </div>
 </div>

 <section class="position-relative" style="height: 100vh; overflow: hidden;">
    <video autoplay muted loop playsinline
        class="position-absolute w-100 h-100"
        style="object-fit: cover; z-index: -1;">
        <source src="{{ asset('video1.mp4') }}" type="video/mp4">
  
    </video>

</section>

 <section id="properties" class="container my-5">
  <h3 class="mb-4 text-center">Nos biens en vedette</h3>
  <div class="row g-4">
    
    <!-- Appartement -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <img src="photo1.png" class="card-img-top" alt="Appartement moderne">
        <div class="card-body text-center">
          <h5 class="card-title">Appartement moderne</h5>
          <p class="card-text">2 chambres, centre-ville, 750 000FCFA/mois</p>
          <a href="#" class="btn btn-outline-dark btn-sm">Voir détails</a>
        </div>
      </div>
    </div>

    <!-- Maison -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <img src="photo2.png" class="card-img-top" alt="Maison familiale">
        <div class="card-body text-center">
          <h5 class="card-title">Maison familiale</h5>
          <p class="card-text">4 chambres, jardin, 120 000FCFA/mois</p>
          <a href="#" class="btn btn-outline-dark btn-sm">Voir détails</a>
        </div>
      </div>
    </div>

    <!-- Studio -->
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <img src="photo3.png" class="card-img-top" alt="Studio cosy">
        <div class="card-body text-center">
          <h5 class="card-title">Studio cosy</h5>
          <p class="card-text">Proche université, 450 000FCFA/mois</p>
          <a href="#" class="btn btn-outline-dark btn-sm">Voir détails</a>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="container my-5 text-center" id="about">
  <h3 class="mb-4">À propos de Empire-Immo</h3>
  <img src="photo4.png" style="max-width: 600px; margin: 0 auto;">
  <p style="max-width: 600px; margin: 0 auto;">
    Chez Empire-Immo, nous nous engageons à simplifier la recherche et la gestion de logements pour nos utilisateurs. 
    Grâce à notre plateforme innovante, nous mettons à disposition un large choix de biens immobiliers adaptés à chaque besoin, 
    tout en garantissant un service fiable, sécurisé et accessible. Notre équipe passionnée travaille sans relâche pour offrir 
    une expérience utilisateur optimale, facilitant ainsi laccès au logement pour tous.
  </p>
</section>

  <h3 class="mb-4 text-center">Découvrez nos partenaires</h3>
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Témoignages de nos clients</h2>
        <div class="row g-4">

            <!-- Témoignage 1 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <img src="{{ asset('photo13.jpg') }}" alt="Jean Dupont" 
                         class="rounded-circle mx-auto d-block mb-3" width="150" height="150">
                    <p class="fst-italic">"Empire-Immo m’a permis de trouver un appartement en moins de 3 jours, sans me déplacer !"</p>
                    <h6 class="fw-bold mb-0">Jean Dupont</h6>
                    <small class="text-muted">Propriétaire</small>
                </div>
            </div>

            <!-- Témoignage 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <img src="{{ asset('photo14.jpg') }}" alt="Marie Kamdem" 
                         class="rounded-circle mx-auto d-block mb-3" width="150" height="150">
                    <p class="fst-italic">"Une plateforme simple, rapide et efficace. Je recommande à 100%."</p>
                    <h6 class="fw-bold mb-0">Marie Kamdem</h6>
                    <small class="text-muted">Client satisfait</small>
                </div>
            </div>

            <!-- Témoignage 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <img src="{{ asset('photo15.jpg') }}" alt="Paul Nguema" 
                         class="rounded-circle mx-auto d-block mb-3" width="150" height="150">
                    <p class="fst-italic">"Grâce à Empire-Immo, j’ai loué mon logement en moins d’une semaine."</p>
                    <h6 class="fw-bold mb-0">Paul Nguema</h6>
                    <small class="text-muted">Etudiante</small>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Section Commentaires -->
<section class="container my-5" id="commentaires">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h3 class="mb-4 text-center">Laissez un commentaire</h3>
      <form>
        <div class="mb-3">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse e-mail</label>
          <input type="email" class="form-control" id="email" placeholder="exemple@email.com" required>
        </div>
        <div class="mb-3">
          <label for="commentaire" class="form-label">Votre commentaire</label>
          <textarea class="form-control" id="commentaire" rows="4" placeholder="Écrivez votre message ici..." required></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-warning w-3  0">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</section>




<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
  <p>© 2025 ImmoGestion. Tous droits réservés.</p>
  <p>Contactez-nous : contact@immogestion.com</p>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</html>
