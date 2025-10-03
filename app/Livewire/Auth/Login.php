<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    public array $form = [
        'email' => '',
        'password' => '',
    ];

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function authenticate(): void
    {
        $this->validate([
            'form.email' => 'required|string|email',
            'form.password' => 'required|string',
        ]);

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->form['email'], 'password' => $this->form['password']], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'form.email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        // Redirection basée sur le statut utilisateur
        $user = Auth::user();
        $redirectRoute = $user->status === 'bailleur' ? 'bailleur.dashboard' : 'locataire.dashboard';
        $this->redirectIntended(default: route($redirectRoute, absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->form['email']).'|'.request()->ip());
    }
}
