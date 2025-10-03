<div class="container py-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1 class="h4 mb-3">{{ $bien?->exists ? 'Modifier le bien' : 'Créer un bien' }}</h1>

    <form wire:submit.prevent="save" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Titre</label>
            <input type="text" class="form-control" wire:model.defer="titre" />
            @error('titre')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Localisation</label>
            <input type="text" class="form-control" wire:model.defer="localisation" />
            @error('localisation')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="4" wire:model.defer="description"></textarea>
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-3">
            <label class="form-label">Surface (m²)</label>
            <input type="number" class="form-control" wire:model.defer="surface" />
            @error('surface')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Chambres</label>
            <input type="number" class="form-control" wire:model.defer="chambres" />
            @error('chambres')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Salles de bain</label>
            <input type="number" class="form-control" wire:model.defer="salles_bain" />
            @error('salles_bain')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">Prix (XAF)</label>
            <input type="number" class="form-control" wire:model.defer="prix" />
            @error('prix')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Type</label>
            <select class="form-control" wire:model.defer="type">
                <option value="">Sélectionner un type</option>
                <option value="appartement">Appartement</option>
                <option value="maison">Maison</option>
                <option value="studio">Studio</option>
                <option value="villa">Villa</option>
                <option value="duplex">Duplex</option>
            </select>
            @error('type')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Latitude</label>
            <input type="number" step="0.0000001" class="form-control" wire:model.defer="latitude" />
            @error('latitude')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label">Longitude</label>
            <input type="number" step="0.0000001" class="form-control" wire:model.defer="longitude" />
            @error('longitude')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Image (optionnelle)</label>
            <input type="file" class="form-control" wire:model="image" accept="image/*" />
            @error('image')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
            @if ($image)
                <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" alt="preview" class="img-fluid rounded" style="max-height: 200px;" />
                </div>
            @endif
        </div>

        <div class="col-12 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
            <a class="btn btn-outline-secondary" href="{{ route('biens.index') }}">Annuler</a>
        </div>
    </form>
</div>
