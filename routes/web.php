<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PanoramaController;
use App\Http\Controllers\PaiementController;

use App\Http\Controllers\VirtualTourController;
use App\Livewire\Biens\BienIndex;
use App\Livewire\Biens\BienForm;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('properties', function () {
    return view('properties');
})->name('properties');

// Routes protégées par authentification
Route::middleware('auth')->group(function () {
    Route::get('locataire', function(){
        return view('locataire');
    })->name('locataire.dashboard');
    
    Route::get('bailleur', function(){
        return view('bailleur');
    })->name('bailleur.dashboard');
    
    Route::get('publier_logement', function(){
        return view('publier_logement');
    })->name('publier_logement');
    
    Route::get('mes-logements', function () {
        return view('mes-logements');
    })->name('mes-logements');
    
    Route::get('ajouter-logement', function () {
        return view('ajouter-logement');
    })->name('ajouter-logement');
    
    Route::post('ajouter-logement', function (Request $request) {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'localisation' => 'required|string|max:255',
            'surface' => 'required|numeric|min:1',
            'chambres' => 'required|integer|min:1',
            'salles_bain' => 'required|integer|min:1',
            'document_legal' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Traitement du fichier document légal
        if ($request->hasFile('document_legal')) {
            $file = $request->file('document_legal');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/documents', $filename);
        }

        // Création du bien (simulation - à adapter selon votre modèle)
        $bien = new \App\Models\Bien();
        $bien->titre = $request->titre;
        $bien->description = $request->description;
        $bien->localisation = $request->localisation;
        $bien->surface = $request->surface;
        $bien->chambres = $request->chambres;
        $bien->salles_bain = $request->salles_bain;
        $bien->latitude = $request->latitude;
        $bien->longitude = $request->longitude;
        $bien->document_legal = $filename ?? null;
        $bien->user_id = Auth::id();
        $bien->save();

        return redirect()->route('mes-logements')->with('success', 'Logement ajouté avec succès !');
    })->name('ajouter-logement.store');
    
    Route::get('reserver', function () {
        return view('reserver');
    })->name('reserver');
    
    Route::get('gerer-profil', function () {
        return view('gerer-profil');
    })->name('gerer-profil');
    
    Route::get('contacter-bailleur', function () {
        return view('contacter-bailleur');
    })->name('contacter-bailleur');
    
    Route::get('reservation', function () {
        return view('reservation');
    })->name('reservation');
    
        Route::get('laisser-avis', function () {
            return view('laisser-avis');
        })->name('laisser-avis');

        // Route pour envoyer des messages
        Route::post('message/envoyer', function () {
            return response()->json(['success' => true, 'message' => 'Message envoyé avec succès']);
        })->name('message.envoyer');
    
    // Settings routes
    Route::get('/settings/profile', App\Livewire\Settings\Profile::class)->name('settings.profile');
    Route::get('/settings/password', App\Livewire\Settings\Password::class)->name('settings.password');
    Route::get('/settings/appearance', App\Livewire\Settings\Appearance::class)->name('settings.appearance');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Routes publiques
Route::get('apropos', function(){
    return view('apropos');
})->name('apropos');

Route::get('contact', function(){
    return view('contact');
})->name('contact');

Route::get('test', function(){
    return view('test');
})->name('test');

Route::get('property-details', function () {
    return view('property-details');
})->name('property-details');

Route::get('visite_virtuelle', function () {
    return view('visite_virtuelle');
})->name('visite_virtuelle');

Route::get('tour', function () {
    return view('tour');
})->name('tour');

Route::get('fonctionnalités', function () {
    return view('fonctionnalités');
})->name('fonctionnalités');

Route::get('panorama', function () {
    return view('panorama');
})->name('panorama');

Route::get('inscription_success', function () {
    return view('inscription_success');
})->name('inscription_success');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/recherche-logement', [BienController::class, 'recherche'])->name('biens.recherche');


Route::post('/paiement', [PaiementController::class, 'process'])->name('paiement.process');


Route::view('/capture', 'capture');
Route::post('/upload-panorama', function (Request $request) {
    foreach ($request->allFiles() as $file) {
        $file->storeAs('public/panoramas', $file->getClientOriginalName());
    }
    return response()->json(['status' => 'ok']);

    
});



Route::post('/assemble-panorama', [PanoramaController::class, 'assemble'])->name('panorama.assemble');
// Biens - Livewire CRUD
Route::get('/biens', BienIndex::class)->name('biens.index');
Route::get('/biens/create', BienForm::class)->name('biens.create');
Route::get('/biens/{id}/edit', BienForm::class)->name('biens.edit');


// Routes d'authentification supprimées - utilisent maintenant auth.php avec Livewire
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});



/*
|--------------------------------------------------------------------------
| Virtual Tour Routes
|--------------------------------------------------------------------------
*/

// Main virtual tour page
Route::get('/virtual-tour', [VirtualTourController::class, 'show'])
    ->name('virtual-tour.show');

// Show specific tour from database
Route::get('/virtual-tour/{id}', [VirtualTourController::class, 'showFromDatabase'])
    ->name('virtual-tour.detail');

// API endpoints for dynamic loading
Route::prefix('api/virtual-tour')->group(function () {
    // Get all panoramas
    Route::get('/panoramas', [VirtualTourController::class, 'getAllPanoramas'])
        ->name('api.virtual-tour.panoramas');
    
    // Get specific panorama
    Route::get('/panorama/{id}', [VirtualTourController::class, 'getPanorama'])
        ->name('api.virtual-tour.panorama');
    
    // Save configuration (admin only)
    Route::post('/configuration', [VirtualTourController::class, 'saveConfiguration'])
        ->middleware('auth')
        ->name('api.virtual-tour.save-config');
});

/*
|--------------------------------------------------------------------------
| Example of integration in existing routes
|--------------------------------------------------------------------------
*/

// Property listing with virtual tour
Route::get('/property/{id}', function($id) {
    // $property = Property::findOrFail($id);
    // return view('property.show', compact('property'));
})->name('property.show');

// Real estate agency virtual tours
Route::get('/agency/tours', function() {
    // $tours = Tour::all();
    // return view('agency.tours', compact('tours'));
})->name('agency.tours');

// Embed virtual tour in iframe
Route::get('/embed/tour/{id}', function($id) {
    // $tour = Tour::findOrFail($id);
    // return view('virtual-tour-embed', compact('tour'));
})->name('tour.embed');