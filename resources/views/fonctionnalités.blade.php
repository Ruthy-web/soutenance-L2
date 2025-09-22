<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Autres fonctionnalités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff4e6; /* fond légèrement orange clair */
        }
        .sidebar {
            height: 100vh;
            background-color: #ff8800; /* orange vif */
            color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .sidebar a:hover {
            background-color: #ffa733; /* orange plus clair au hover */
            text-decoration: none;
        }
        .content {
            padding: 20px;
        }
        .card-header {
            background-color: #ff8800;
            color: #fff;
            font-weight: bold;
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
<div class="d-flex">
    <div class="sidebar">
        <h3 class="text-center">Admin</h3>
        <a href="/users">Gestion des utilisateurs</a>
        <a href="/fonctionnalités">Autres fonctionnalités</a>
        <a href="#">Déconnexion</a>
    </div>
    <div class="content flex-grow-1">
        <div class="container-fluid">
            <h2 class="my-3 text-warning">Autres fonctionnalités</h2>

            <div class="row">
                <!-- Fonctionnalité 1 -->
                <div class="col-md-4 mb-3">
                    <div class="card border-warning shadow-sm">
                        <div class="card-header">
                            Notifications
                        </div>
                        <div class="card-body text-center">
                            <p>Gérer les notifications des utilisateurs et envoyer des alertes importantes.</p>
                            <a href="#" class="btn btn-warning">Gérer</a>
                        </div>
                    </div>
                </div>

                <!-- Fonctionnalité 2 -->
                <div class="col-md-4 mb-3">
                    <div class="card border-warning shadow-sm">
                        <div class="card-header">
                            Statistiques
                        </div>
                        <div class="card-body text-center">
                            <p>Voir les statistiques globales de l’application : utilisateurs actifs, performances, etc.</p>
                            <a href="#" class="btn btn-warning">Voir</a>
                        </div>
                    </div>
                </div>

                <!-- Fonctionnalité 3 -->
                <div class="col-md-4 mb-3">
                    <div class="card border-warning shadow-sm">
                        <div class="card-header">
                            Paramètres avancés
                        </div>
                        <div class="card-body text-center">
                            <p>Configurer des options avancées de l’application et gérer les paramètres globaux.</p>
                            <a href="#" class="btn btn-warning">Configurer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
