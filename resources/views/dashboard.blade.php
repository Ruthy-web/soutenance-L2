<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Empire-Immo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 80px;
        }
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('welcome') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo Empire-Immo" width="40" height="40" class="me-2">
                Empire-Immo
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('welcome') }}">Accueil</a>
                <a class="nav-link" href="{{ route('settings.profile') }}">Profil</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Tableau de bord</h1>
                
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Mes Biens</h5>
                                <p class="card-text">Gérer mes propriétés</p>
                                <a href="{{ route('biens.index') }}" class="btn btn-light">Voir</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Rechercher</h5>
                                <p class="card-text">Trouver un logement</p>
                                <a href="{{ route('welcome') }}" class="btn btn-light">Rechercher</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Visite Virtuelle</h5>
                                <p class="card-text">Explorer en 360°</p>
                                <a href="{{ route('virtual-tour.show') }}" class="btn btn-light">Explorer</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Profil</h5>
                                <p class="card-text">Modifier mes informations</p>
                                <a href="{{ route('settings.profile') }}" class="btn btn-dark">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>