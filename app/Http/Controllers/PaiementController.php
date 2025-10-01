<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function process(Request $request)
    {
        // Exemple de traitement simple
        $montant = $request->montant;
        $methode = $request->methode;

        // Ici tu pourras intégrer Orange Money, MTN ou PayPal
        return back()->with('success', "Paiement de {$montant} XAF via {$methode} initié.");
    }
}
