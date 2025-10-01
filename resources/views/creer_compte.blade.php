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

    <form method="POST" action="/creer_compte" > @csrf 
      <h2 class="mb-4 text-center">Veuillez créer un compte</h2>
<div class="form-container">
   
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>

      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <div class="mb-3">
        <label for="confirm-password" class="form-label">Confirmer mot de passe</label>
<input type="password" class="form-control" id="confirm-password" name="password_confirmation" required>

      </div>

 <div class="container mb-3">

  <div class="form-group">
    <label>Status :</label><br>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="locataire" value="locataire" checked>
        <label class="form-check-label" for="locataire">Locataire</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="bailleur" value="bailleur">
        <label class="form-check-label" for="bailleur">Bailleur</label>
    </div>
</div>


      <div class="text-center mb-3">
        <a href="/connexion">Vous avez déjà un compte ? Connectez-vous</a>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-warning w-50">S'inscrire</button>
      </div>
      

    </form>
  </div>

</body>
</html>
