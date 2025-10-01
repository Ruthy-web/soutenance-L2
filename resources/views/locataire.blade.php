<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/dark-mode.css">

    <title>Empire-immo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  </head>

<body>
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> Empireimmo@gmail.com</li>
            <li><i class="fa fa-map"></i> Yaoundé- Cameroun</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                  <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
      <img src="logo.png" alt="Logo Empire-Immo" width="40" height="40" class="me-2">
      Empire-Immo
    </a>
    
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/locataire" class="active">Accueil</a></li>
                      <li><a href="/properties">Biens</a></li>
                      <li><a href="/property-details">Détails des biens</a></li>
                      <li><a href="/contact">Contactez nous</a></li>
                      <li><a href="/gerer-profil"><i class="fa fa-user"></i> Mon profil</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <li>
  <button id="darkModeToggle" class="btn btn-sm btn-outline-dark">🌙 Mode sombre</button>
</li>

                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Yaoundé, <em>Cameroun</em></span>
          <h2>Dépêchez-vous!<br>Obtiens ton meilleur logement</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Douala, <em>Cameroun</em></span>
          <h2>Dépêchez-vous!<br>Ontenez la meilleur villa</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Garoua, <em>Cameroun</em></span>
          <h2>Agissez maintenant!<br>Obtenez le meilleur appartement</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/featured.jpg" alt="">
            <a href="property-details.html"><img src="assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| A la une</h6>
            <h2>Meilleur appartement avec vue sur la mer</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Liens utiles ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                Obtenez <strong>la meilleur villa</strong> facebook <a href="https://www.google.com/facebook" target="_blank"></a> 
              </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Comment ca marche ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 EmpireImmo est une plateforme immobilière intuitive qui permet aux utilisateurs de rechercher, visiter et réserver des biens en toute simplicité. Grâce à des visites virtuelles immersives, un système de recommandation intelligent et un espace sécurisé pour déposer leurs documents, les locataires trouvent rapidement le logement idéal, tandis que les propriétaires gèrent leurs annonces en toute autonomie
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Pourquoi sommes-nous meilleurs ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  EmpireImmo se distingue comme la meilleure plateforme immobilière grâce à son approche innovante, centrée sur l’utilisateur. Nous combinons des visites virtuelles immersives, un système de recommandation intelligent, une interface sécurisée pour les documents légaux, et une expérience fluide adaptée à tous les profils. Avec plus de 12 ans d’expérience, 34 bâtiments livrés, et une équipe dédiée à la qualité et à la transparence, nous offrons bien plus qu’un simple catalogue de biens : nous créons une vraie passerelle entre rêve immobilier et réalité
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>250 m2<br><span>superficie</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contrat<br><span>Contrat prêts</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Paiement<br><span>Possibilité de payer en ligne</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Sécurisé<br><span>24/7 sous controle</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Regarder la vidéo</h6>
            <h2>Faire une visite virtuelle</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="assets/images/video-frame.jpg" alt="">
            <a href="Video1.mp4" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Appartements<br>Reserve maintenant</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Années<br>Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Prix<br>Gagné 2025</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>Les Meilleurs</h6>
            <h2>Trouve ton compte!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Appartement</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Villa </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Chambres</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Superficie totale <span>185 m2</span></li>
                          <li>Etages <span>03</span></li>
                          <li>Nombre de chambres <span>4</span></li>
                          <li>Parking disponible <span>oui</span></li>
                          <li>Paiement sécurisé<span>paypal</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-01.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Informations supplémentaires</h4>
                      <p>Vue panoramique, accès à une visite virtuelle immersive, système de recommandation personnalisé
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Faire une visite</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Superficie totale<span>250 m2</span></li>
                          <li>nombre d'étages <span>5</span></li>
                          <li>Nombre de chambre <span>5</span></li>
                          <li>Parking disponible <span>Oui</span></li>
                          <li>Payment sécurisé <span>Paypal</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-02.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Details du bien</h4>
                      <div class="icon-button">
                        <a href="/visite_virtuelle"><i class="fa fa-calendar"></i> Faire une visite</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Superficie <span>320 m2</span></li>
                          <li>Nombre d'étages <span>4</span></li>
                          <li>Nombre de chambres <span>6</span></li>
                          <li>Parking disponible<span>Oui</span></li>
                          <li>Paiement sécurisé <span>Paypal</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-03.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Plus d'informations</h4>
                      Cet appartement moderne situé à Yaoundé offre une surface habitable de 185 m² au 26ᵉ étage, avec 4 chambres spacieuses, 3 salles de bains, et un parking sécurisé pour deux véhicules. Conçu pour le confort urbain, il bénéficie d’une vue dégagée, d’un accès à une visite virtuelle immersive, et d’un système de recommandation intelligent qui adapte les suggestions aux préférences du locataire. Le contrat est prêt à signer, le paiement se fait par virement bancaire, et la sécurité est assurée 24h/24 pour une tranquillité totale
                      <div class="icon-button">
                        <a href="/visite_virtuelle"><i class="fa fa-calendar"></i> Faire une visite</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Biens</h6>
            <h2>Nous avons tout ce dont vous avez besoin</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="/property-details"><img src="assets/images/property-01.jpg" alt=""></a>
            <span class="category">Chambre moderne</span>
            <h6>25000 FCFA</h6>
            <h4><a href="/property-details">Awae Yaoundé</a></h4>
            <ul>
              <li>Chambre <span>1</span></li>
              <li>Toilettes <span>1</span></li>
              <li>Superficie <span>21 m2</span></li>
              <li>Etage: <span>3</span></li>
              <li>Parking: <span>6 stations</span></li>
            </ul>
            <div class="main-button">
              <a href="/visite_virtuelle">Faire une visite</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="/property-details"><img src="assets/images/property-02.jpg" alt=""></a>
            <span class="category">Appartement moderne</span>
            <h6>300 000FCFA</h6>
            <h4><a href="/property-details">Bonamoussadi/ Douala</a></h4>
            <ul>
              <li>Chambres <span>6</span></li>
              <li>Toilettes <span>2</span></li>
              <li>Superficie <span>450m2</span></li>
              <li>Etage <span>3</span></li>
              <li>Parking: <span>8 stations</span></li>
            </ul>
            <div class="main-button">
              <a href="/visite_virtuelle">Faire une visite</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="/property-details"><img src="assets/images/property-03.jpg" alt=""></a>
            <span class="category">Appartement moderne</span>
            <h6>200 000FCFA</h6>
            <h4><a href="/property-details">Messassi</a></h4>
            <ul>
              <li>Chambres <span>5</span></li>
              <li>Toilettes <span>4</span></li>
              <li>Superficie <span>225m2</span></li>
              <li>Etages <span>3</span></li>
              <li>Parking: <span>10 stations</span></li>
            </ul>
            <div class="main-button">
              <a href="/visite_virtuelle">Faire une visite</a>
            </div>
          </div>
        </div>
       
        </div>
      </div>
    </div>
  </div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contactez nous</h6>
            <h2>Contactez nos agents</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.9054858639884!2d11.548906373575115!3d3.8304506485898364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bc5347ce2ba5d%3A0x76de28d6bce0db35!2sAwae%20Escalier!5e0!3m2!1sen!2scm!4v1758495773324!5m2!1sen!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>+237 699 77 11 46<br><span>Numéro de téléphone</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>Empireimmo@gmail.com<br><span>Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Nom complet</label>
                  <input type="name" name="name" id="name" placeholder="Votre nom..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">L'adresse email</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre adresse..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Sujet</label>
                  <input type="subject" name="subject" id="subject" placeholder="Sujet..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Votre Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Envoyer</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2020 Empire_Immo All rights reserved. 
        
        Design: <a rel="nofollow" href="#" target="_blank">Ruthy</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>


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

  </body>
</html>