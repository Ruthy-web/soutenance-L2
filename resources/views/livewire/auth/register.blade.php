<div>
    <form wire:submit="register" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input id="nom" class="form-control" type="text" wire:model="form.nom" required autofocus autocomplete="family-name" />
            @error('form.nom')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input id="prenom" class="form-control" type="text" wire:model="form.prenom" required autocomplete="given-name" />
            @error('form.prenom')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" wire:model="form.email" required autocomplete="username" />
            @error('form.email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input id="password" class="form-control" type="password" wire:model="form.password" required autocomplete="new-password" />
            @error('form.password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input id="password_confirmation" class="form-control" type="password" wire:model="form.password_confirmation" required autocomplete="new-password" />
            @error('form.password_confirmation')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Type de compte</label>
            <select id="role" class="form-select" wire:model="form.role" required>
                <option value="">Sélectionnez un type</option>
                <option value="locataire">Locataire</option>
                <option value="bailleur">Bailleur</option>
            </select>
            @error('form.role')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Créer un compte
            </button>
        </div>
    </form>
</div>