
          <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des utilisateurs</title>
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
        .table-warning {
            background-color: #ffbb66; /* orange doux pour le header */
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
            <h2 class="my-3 text-warning">Gestion des utilisateurs</h2>
            <a href="#" class="btn btn-warning mb-3">Ajouter un utilisateur</a>

            <table class="table table-striped table-bordered">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ruth Example</td>
                        <td>ruth@example.com</td>
                        <td>Locataire</td>
                        <td>
                            <button class="btn btn-sm btn-warning">Modifier</button>
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jean Dupont</td>
                        <td>jean@example.com</td>
                         <td>Bailleur</td>
                        <td>
                            <button class="btn btn-sm btn-warning">Modifier</button>
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
  


