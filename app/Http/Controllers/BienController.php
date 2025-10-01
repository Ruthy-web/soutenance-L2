<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;

class BienController extends Controller
{
    public function recherche(Request $request)
    {
        $query = Bien::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('localisation')) {
            $query->where('localisation', 'like', '%' . $request->localisation . '%');
        }

        if ($request->filled('max_prix')) {
            $query->where('prix', '<=', $request->max_prix);
        }

        $biens = $query->paginate(10);

        return view('biens.resultats', compact('biens'));
    }
}
