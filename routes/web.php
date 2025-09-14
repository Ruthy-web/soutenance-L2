<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('connexion', function(){
    return view('livewire.auth.connexion');
})->name('connexion');

Route::get('creer_compte', function(){
    return view('creer_compte');
})->name('creer_compte');

Route::get('motdepasse_oublié', function(){
    return view('livewire.auth.motdepasse_oublié');
})->name('motdepasse_oublié');


Route::get('apropos', function(){
    return view('apropos');
})->name('apropos');

Route::get('test', function(){
    return view('test');
})->name('test');

Route::get('locataire', function(){
    return view('locataire');
})->name('locataire');

Route::get('bailleur', function(){
    return view('bailleur');
})->name('bailleur');

Route::get('publier_logement', function(){
    return view('publier_logement');
})->name('publier_logement');

Route::get('contact', function(){
    return view('contact');
})->name('contact');

Route::post('/creer_compte', [RegisterController::class, 'register']);
Route::post('/connexion', [RegisterController::class, 'login']);
Route::post('/motdepasse_oublié', [RegisterController::class, 'forgotpassword']);