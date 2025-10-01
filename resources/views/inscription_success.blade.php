<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription réussie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url('background.png.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .confirmation-box {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      text-align: center;
      max-width: 500px;
      width: 90%;
    }

    .confirmation-box h1 {
      font-size: 28px;
      color: #ffc107;
      margin-bottom: 20px;
    }

    .confirmation-box p {
      font-size: 16px;
      color: #333;
    }

    .btn-warning {
      margin-top: 30px;
      padding: 12px 30px;
      font-size: 16px;
      border-radius: 8px;
      color: #000;
      transition: background-color 0.3s ease;
    }

    .btn-warning:hover {
      background-color: #d39e00;
      color: white;
    }
  </style>
</head>
<body>

  <div class="confirmation-box">
    <h1>🎉 Félicitations {{ session('prenom') ?? '' }} !</h1>

    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @else
      <p>Votre compte a été créé avec succès.</p>
    @endif

    <p>Vous pouvez maintenant vous connecter à votre espace personnel pour commencer votre expérience.</p>

    <a href="{{ route('connexion') }}" class="btn btn-warning">Se connecter</a>
  </div>

</body>
</html>
