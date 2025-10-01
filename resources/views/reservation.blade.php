<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Paiement sécurisé - EmpireImmo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff4e6;
    }
    .container {
      max-width: 600px;
      margin-top: 50px;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255, 136, 0, 0.3);
    }
    .btn-warning {
      background-color: #ff8800;
      border-color: #ff8800;
      color: #fff;
    }
    .btn-warning:hover {
      background-color: #ffa733;
      border-color: #ffa733;
    }
    h2.text-warning {
      color: #ff8800 !important;
    }
  </style>
</head>
<body>
<div class="container">
  <h2 class="text-warning text-center mb-4">Paiement sécurisé</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <form method="POST" action="{{ route('paiement.process') }}">
    @csrf

    <div class="mb-3">
      <label for="montant" class="form-label">Montant à payer (XAF ou USD)</label>
      <input type="number" name="montant" class="form-control" required min="100">
    </div>

    <div class="mb-3">
      <label for="methode" class="form-label">Méthode de paiement</label>
      <select name="methode" class="form-select" required>
        <option value="">-- Choisir --</option>
        <option value="orange">Orange Money</option>
        <option value="mtn">Mobile Money (MTN)</option>
        <option value="paypal">PayPal</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="telephone" class="form-label">Numéro de téléphone (pour Orange/MTN)</label>
      <input type="tel" name="telephone" class="form-control" placeholder="Ex: 690123456" pattern="[0-9]{9}">
    </div>

    <button type="submit" class="btn btn-warning w-100">💳 Payer maintenant</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
