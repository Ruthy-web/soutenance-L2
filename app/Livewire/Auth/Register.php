<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public array $form = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
        'status' => 'locataire',
    ];

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'form.nom' => ['required', 'string', 'max:255'],
            'form.prenom' => ['required', 'string', 'max:255'],
            'form.email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'form.password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'form.status' => ['required', 'string', 'in:locataire,bailleur'],
        ]);

        $userData = [
            'nom' => $validated['form']['nom'],
            'prenom' => $validated['form']['prenom'],
            'email' => $validated['form']['email'],
            'password' => Hash::make($validated['form']['password']),
            'status' => $validated['form']['status'],
        ];

        event(new Registered(($user = User::create($userData))));

        Auth::login($user);

        // Redirection basée sur le statut
        $redirectRoute = $user->status === 'bailleur' ? 'bailleur.dashboard' : 'locataire.dashboard';
        $this->redirect(route($redirectRoute, absolute: false), navigate: true);
    }
}
