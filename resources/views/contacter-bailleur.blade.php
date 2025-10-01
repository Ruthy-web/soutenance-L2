<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Contacter le bailleur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url('/images/fond-contact.jpg'); /* 📁 Ton image de fond */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
    }

    .form-container {
      max-width: 600px;
      margin: 70px auto;
      padding: 30px;
      border: 2px solid #dee2e6;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      background-color: rgba(255, 255, 255, 0.95);
    }

    .btn-warning {
      background-color: #ff8800;
      border-color: #ff8800;
      color: white;
    }

    .btn-warning:hover {
      background-color: #1c1489;
      color: white;
    }

    h2.text-center {
      color: #ff8800;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <form method="POST" action="{{ route('message.envoyer') }}">
      @csrf

      <h2 class="mb-4 text-center">Contacter le bailleur</h2>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="mb-3">
        <label for="nom" class="form-label">Votre nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Votre email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">Votre message</label>
        <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Bonjour, je suis intéressé par votre logement..."></textarea>
      </div>

      <input type="hidden" name="bailleur_id" value="{{ $bailleur->id }}"> <!-- à adapter -->

      <div class="text-center">
        <button type="submit" class="btn btn-warning w-50">📩 Envoyer</button>
      </div>
    </form>
  </div>

</body>
</html>
