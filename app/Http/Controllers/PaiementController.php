<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PaiementController extends Controller
{
    public function process(Request $request)
    {
        $validated = $request->validate([
            'montant' => ['required','integer','min:100'],
            'methode' => ['required', Rule::in(['orange_money','mtn_momo','paypal','stripe'])],
            'reference' => ['nullable','string','max:100'],
        ]);

        // Événements / logs pour traçabilité
        Log::info('Paiement initié', $validated);

        // TODO: Intégrer le prestataire choisi ici (SDK/API)
        // Pour l'instant, on simule une redirection vers une page de confirmation
        return back()->with('success', "Paiement de {$validated['montant']} XAF via {$validated['methode']} initié.");
    }
}
