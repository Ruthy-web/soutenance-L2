<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url(background.png.jpg); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
    }

    .form-container {
      max-width: 450px;
      margin: 70px auto;
      padding: 30px;
      border: 2px solid #dee2e6;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      background-color: rgba(255, 255, 255, 0.95);
    }

    label {
      text-align: left;
      display: block;
      font-weight: 500;
    }

    .btn-warning:hover {
      background-color: #1c1489;
      color: white;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <form method="POST" action="/motdepasse_oublié"> @csrf
      <h2 class="mb-4 text-center">Mot de passe oublié? </h2>
      <p class="text-center">Entrez votre adresse email pour recevoir un lien de réinitialisation.</p>

      <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="text-center mb-3">
        <a href="/connexion">Retour à la connexion</a>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-warning w-50">Envoyer</button>
      </div>
      

    </form>
  </div>

</body>
</html>
