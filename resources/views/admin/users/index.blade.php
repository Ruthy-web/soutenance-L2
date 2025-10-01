<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin - Liste des utilisateurs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff4e6;
    }
    .sidebar {
      height: 100vh;
      background-color: #ff8800;
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
      background-color: #ffa733;
    }
    .content {
      padding: 20px;
      width: 100%;
    }
    .table-warning {
      background-color: #ffbb66;
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
  <!-- Barre latérale -->
  <div class="sidebar">
    <h3 class="text-center">Admin</h3>
    <a href="/admin/users">Gestion des utilisateurs</a>
    <a href="/fonctionnalités">Autres fonctionnalités</a>
    <form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit" class="btn btn-link text-white text-start px-3" style="text-decoration: none;">
  </button>
</form>
<a href="#">Déconnexion</a>
  </div>

  <!-- Contenu principal -->
  <div class="content">
    <h2 class="text-warning mb-4">Liste des utilisateurs</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
      <thead class="table-warning">
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Rôle</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->status ?? 'Non défini' }}</td>
          <td>
            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Pagination -->
    {{ $users->links() }}
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
