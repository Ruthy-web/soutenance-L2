<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Contact - Empire-Immo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      background: url('background.png.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .contact-form {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 500px;
    }
    footer {
      background-color: rgba(0,0,0,0.6);
      color: #fff;
      text-align: center;
      padding: 15px 0;
    }
  </style>
</head>
<body>

  <header class="bg-dark text-white text-center py-3">
    <h1>Empire-Immo</h1>
    <p>Contactez-nous</p>
  </header>

  <main>
    <form class="contact-form">
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" placeholder="Votre nom" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="exemple@email.com" required>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" rows="5" placeholder="Écrivez votre message..." required></textarea>
      </div>

      </div class="text-center">
      <button type="submit" class="btn btn-warning d-block mx-auto" style="width: 50%;">Envoyer</button>

      </div>
    </form>
  </main>

  <footer>
    <p>© 2025 Empire-Immo. Tous droits réservés.</p>
    <p>Contact : contact@empire-immo.com</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
