<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->all();

        // Création de l'utilisateur 
        $user = User::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'Utilisateur enregistré avec succès', 'user' => $user]);
    }


    public function login (Request $request)
    {
        $validated = $request->all();

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            if(password_verify($validated['password'], $user->password)){
                return response()->json(['message' => 'Utilisateur connecté avec succès', 'user' => $user]);
            }    
        }
        return response()->json(['message' => 'Identifiants invalides','user'=> null]);
    }

     public function forgotpassword (Request $request)
    {
        $validated = $request->all();
        $email = $request->input('email');

        $token = Str::random(60);

        // Envoyer l'email
        Mail::to($email)->send(new ResetPasswordEmail($token));

        return response()->json([
            'message' => 'Email envoyé avec succès à ' . $email
        ]);

    }
}

