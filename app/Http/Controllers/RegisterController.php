<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    // Méthode d'inscription
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'required|in:locataire,bailleur',
        ]);

        User::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'status' => $validated['status'],
        ]);

        return redirect()->route('inscription_success')->with('success', 'Félicitations ! Votre compte a été créé avec succès.');
    }

    // Méthode de connexion
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $status = trim(strtolower($user->status));

            switch ($status) {
                case 'bailleur':
                    return redirect()->route('bailleur.dashboard');
                case 'locataire':
                    return redirect()->route('locataire.dashboard');
                default:
                    return redirect('/')->withErrors(['status' => 'Rôle utilisateur inconnu.']);
            }
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ]);
    }

    // Méthode de réinitialisation de mot de passe
    public function forgotpassword(Request $request)
    {
        $email = $request->validate([
            'email' => 'required|email|exists:users,email',
        ])['email'];

        $token = Str::random(60);

        Mail::to($email)->send(new ResetPasswordEmail($token));

        return response()->json([
            'message' => 'Email envoyé avec succès à ' . $email
        ]);
    }
}
