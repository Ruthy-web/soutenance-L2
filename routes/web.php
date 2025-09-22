<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;





Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('properties', function () {
    return view('properties');
})->name('properties');

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

Route::get('property-details', function () {
    return view('property-details');
})->name('property-details');

Route::get('visite_virtuelle', function () {
    return view('visite_virtuelle');
})->name('visite_virtuelle');

Route::get('laisser-avis', function () {
    return view('laisser-avis');
})->name('laisser-avis');

Route::get('reserver', function () {
    return view('reserver');
})->name('gerer-profil');

Route::get('gerer-profil', function () {
    return view('gerer-profil');
})->name('reserver');

Route::get('contacter-bailleur', function () {
    return view('contacter-bailleur');
})->name('contacter-bailleur');

Route::get('reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('ajouter-logement', function () {
    return view('ajouter-logement');
})->name('ajouter-logement');

Route::get('mes-logements', function () {
    return view('mes-logements');
})->name('mes-logements');

Route::get('admin', function () {
    return view('admin');
})->name('admin');

Route::get('users', function () {
    return view('users');
})->name('users');

Route::get('fonctionnalités', function () {
    return view('fonctionnalités');
})->name('fonctionnalités');

Route::post('/creer_compte', [RegisterController::class, 'register']);
Route::post('/connexion', [RegisterController::class, 'login']);
Route::post('/motdepasse_oublié', [RegisterController::class, 'forgotpassword']);

