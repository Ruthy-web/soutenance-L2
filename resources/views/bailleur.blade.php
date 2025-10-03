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
    
    <!-- Laravel Vite Assets (JavaScript seulement) -->
    @vite(['resources/js/app.js'])

  </head>

<body class="bg-dark text-light">
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif


  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader" style="display: none;">
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
            <a class="nav-link text-warning" href="/mes-logements">Mes logements</a>
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
  <!-- ***** Header Area End ***** -->

  <!-- Main Banner -->
  <div class="bg-dark py-5">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <span class="text-warning fs-5">Yaoundé, <em>Cameroun</em></span>
          <h1 class="display-4 fw-bold text-warning mt-3">Hurry!</h1>
          <h2 class="display-5 fw-bold text-light">Get the Best Villa for you</h2>
        </div>
      </div>
    </div>
  </div>

  


  <!-- Video Section -->
  <div class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h6 class="text-warning">| Video View</h6>
          <h2 class="text-light">Get Closer View & Different Feeling</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="pb-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="position-relative">
            <img src="assets/images/video-frame.jpg" alt="Video Preview" class="img-fluid rounded">
            <a href="Video1.mp4" target="_blank" class="btn btn-warning btn-lg position-absolute top-50 start-50 translate-middle">
              <i class="fa fa-play"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Statistics Section -->
  <div class="bg-secondary py-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-4 mb-4">
          <div class="text-warning">
            <h2 class="display-4 fw-bold">34</h2>
            <p class="fs-5">Buildings<br>Finished Now</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="text-warning">
            <h2 class="display-4 fw-bold">12</h2>
            <p class="fs-5">Years<br>Experience</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="text-warning">
            <h2 class="display-4 fw-bold">24</h2>
            <p class="fs-5">Awards<br>Won 2023</p>
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
            <h6>| Best Deal</h6>
            <h2>Find Your Best Deal Right Now!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Appartment</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Villa House</button>
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
                          <li>Total Flat Space <span>185 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>4</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-01.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Property</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. 
                      <br><br>When you need free CSS templates, you can simply type TemplateMo in any search engine website. In addition, you can type TemplateMo Portfolio, TemplateMo One Page Layouts, etc.</p>
                      <div class="icon-button">
                        <a href="/ajouter-logement"><i class="fa fa-home"></i> Ajouter un logement</a>
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
  <!-- jQuery doit être chargé en premier -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  
  <!-- Laravel Vite Assets (Livewire inclus) -->
  @vite(['resources/js/app.js'])


  <script>
  // Masquer le preloader immédiatement
  document.addEventListener('DOMContentLoaded', function() {
    const preloader = document.getElementById('js-preloader');
    if (preloader) {
      preloader.style.display = 'none';
    }
  });

  // Initialiser le carousel
  $(document).ready(function() {
    $('.owl-banner').owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      nav: false,
      dots: true
    });
  });

  // Mode sombre
  const toggleButton = document.getElementById("darkModeToggle");
  const body = document.body;

  if (toggleButton) {
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
  }
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>