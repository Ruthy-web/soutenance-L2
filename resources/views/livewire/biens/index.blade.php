<div class="container py-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 m-0">Liste des biens</h1>
        <a href="{{ route('biens.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>

    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Rechercher..." wire:model.debounce.500ms="q">
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Localisation</th>
                <th>Type</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($biens as $bien)
                <tr>
                    <td>{{ $bien->titre }}</td>
                    <td>{{ $bien->localisation }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ ucfirst($bien->type) }}</span>
                    </td>
                    <td>{{ $bien->surface }}m²</td>
                    <td>{{ number_format($bien->prix ?? 0, 0, ',', ' ') }} XAF</td>
                    <td class="text-end">
                        <a href="{{ route('biens.edit', $bien->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                        <button wire:click="delete({{ $bien->id }})" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer ce bien ?')">Supprimer</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Aucun bien trouvé</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $biens->links() }}
    </div>
</div>
