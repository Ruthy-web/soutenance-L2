<div>
    <form wire:submit="authenticate" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" wire:model="form.email" required autofocus autocomplete="username" />
            @error('form.email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input id="password" class="form-control" type="password" wire:model="form.password" required autocomplete="current-password" />
            @error('form.password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center">
            @if (Route::has('password.request'))
                <a class="text-decoration-none" href="{{ route('password.request') }}" wire:navigate>
                    Mot de passe oublié ?
                </a>
            @endif

            <button type="submit" class="btn btn-primary">
                Se connecter
            </button>
        </div>
    </form>
</div>