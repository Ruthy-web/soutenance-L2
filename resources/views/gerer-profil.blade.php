<!DOCTYPE html>
<html lang="fr">

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
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
            <li><i class="fa fa-map"></i> Yaoundé - Cameroun</li>
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
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
              <img src="logo.png" alt="Logo Empire-Immo" width="40" height="40" class="me-2">
              Empire-Immo
            </a>
            <ul class="nav">
              <li><a href="/locataire" class="active">Accueil</a></li>
              <li><a href="/properties">Logements</a></li>
              <li><a href="/property-details">Détails des logements</a></li>
              <li><a href="/contact">Contactez-nous</a></li>
              <li><a href="/gerer-profil"><i class="fa fa-user"></i> Mon profil</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <li>
              <button id="darkModeToggle" class="btn btn-sm btn-outline-dark">🌙 Mode sombre</button>
            </li>
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
          <span class="category">Toronto, <em>Canada</em></span>
          <h2>Dépêchez-vous !<br>Obtenez la meilleure villa pour vous</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Melbourne, <em>Australie</em></span>
          <h2>Soyez rapide !<br>Obtenez la meilleure villa en ville</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Miami, <em>Floride du Sud</em></span>
          <h2>Agissez maintenant !<br>Obtenez le penthouse de plus haut standing</h2>
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
            <h6>| À la une</h6>
            <h2>Meilleur appartement avec vue sur la mer</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Meilleurs liens utiles ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Obtenez le <strong>meilleur modèle de site web</strong> pour villa en HTML CSS et Bootstrap pour votre entreprise. TemplateMo vous propose les <a href="https://www.google.com/search?q=best+free+css+templates" target="_blank">meilleurs modèles CSS gratuits</a> au monde. Parlez-en à vos amis.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Comment cela fonctionne-t-il ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Pourquoi Villa Agency est-elle la meilleure ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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
                <h4>250 m2<br><span>Surface totale de l’appartement</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contrat<br><span>Contrat prêt</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Paiement<br><span>Processus de paiement</span></h4>
              </
              <div class="counter">
  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
  <p class="count-text ">Récompenses<br>Remportées en 2023</p>
</div>
<div class="section best-deal">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="section-heading">
          <h6>| Meilleure offre</h6>
          <h2>Trouvez votre meilleure offre maintenant !</h2>
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
                  <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Villa</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Penthouse</button>
                </li>
              </ul>
            </div>              
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="info-table">
                      <ul>
                        <li>Surface totale <span>185 m2</span></li>
                        <li>Étage <span>26e</span></li>
                        <li>Nombre de pièces <span>4</span></li>
                        <li>Parking disponible <span>Oui</span></li>
                        <li>Mode de paiement <span>Banque</span></li>
                      </ul>
                    </div>
                  </div>
<div class="col-lg-6">
  <img src="assets/images/deal-01.jpg" alt="">
</div>
<div class="col-lg-3">
  <h4>Informations supplémentaires sur le bien</h4>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. 
  <br><br>Lorsque vous avez besoin de modèles CSS gratuits, tapez simplement TemplateMo dans n’importe quel moteur de recherche. Vous pouvez aussi essayer TemplateMo Portfolio, TemplateMo One Page Layouts, etc.</p>
  <div class="icon-button">
    <a href="property-details.html"><i class="fa fa-calendar"></i> Planifier une visite</a>
  </div>
</div>
<div class="col-lg-3">
  <div class="info-table">
    <ul>
      <li>Surface totale <span>250 m2</span></li>
      <li>Étage <span>26e</span></li>
      <li>Nombre de pièces <span>5</span></li>
      <li>Parking disponible <span>Oui</span></li>
      <li>Mode de paiement <span>Banque</span></li>
    </ul>
  </div>
</div>
<div class="col-lg-3">
  <h4>Détails sur la villa</h4>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
  <div class="icon-button">
    <a href="property-details.html"><i class="fa fa-calendar"></i> Planifier une visite</a>
  </div>
</div>
<div class="col-lg-3">
  <h4>Informations supplémentaires sur le penthouse</h4>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
  <div class="icon-button">
    <a href="property-details.html"><i class="fa fa-calendar"></i> Planifier une visite</a>
  </div>
</div>
<div class="section-heading text-center">
  <h6>| Biens immobiliers</h6>
  <h2>Nous vous proposons les meilleurs biens</h2>
</div>
<span class="category">Villa de luxe</span>
...
<ul>
  <li>Chambres : <span>8</span></li>
  <li>Salles de bain : <span>8</span></li>
  <li>Surface : <span>545m2</span></li>
  <li>Étage : <span>3</span></li>
  <li>Parking : <span>6 places</span></li>
</ul>
<div class="main-button">
  <a href="/property-details">Planifier une visite</a>
</div>
<a href="/property-details">Planifier une visite</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="/property-details"><img src="assets/images/property-05.jpg" alt=""></a>
            <span class="category">Penthouse</span>
            <h6>$925.600</h6>
            <h4><a href="/property-details">34 Rue de la Plage, Miami, OR 42680</a></h4>
            <ul>
              <li>Chambres : <span>4</span></li>
              <li>Salles de bain : <span>4</span></li>
              <li>Surface : <span>180m2</span></li>
              <li>Étage : <span>38e</span></li>
              <li>Parking : <span>2 voitures</span></li>
            </ul>
            <div class="main-button">
              <a href="/property-details">Planifier une visite</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="/property-details"><img src="assets/images/property-06.jpg" alt=""></a>
            <span class="category">Condo moderne</span>
            <h6>$450.000</h6>
            <h4><a href="/property-details">22 Rue Neuve, Portland, OR 16540</a></h4>
            <ul>
              <li>Chambres : <span>3</span></li>
              <li>Salles de bain : <span>2</span></li>
              <li>Surface : <span>165m2</span></li>
              <li>Étage : <span>26e</span></li>
              <li>Parking : <span>3 voitures</span></li>
            </ul>
            <div class="main-button">
              <a href="/property-details">Planifier une visite</a>
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
            <h6>| Contactez-nous</h6>
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
            <!-- Carte Google conservée telle quelle -->
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
                  <label for="email">Adresse email</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre adresse..." required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Sujet</label>
                  <input type="subject" name="subject" id="subject" placeholder="Sujet..." autocomplete="on">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Votre message..."></textarea>
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
        <p>Copyright © 2020 Empire_Immo. Tous droits réservés. 
        Design