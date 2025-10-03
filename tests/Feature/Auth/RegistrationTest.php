<?php

use App\Livewire\Auth\Register;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = Livewire::test(Register::class)
        ->set('form.nom', 'Test')
        ->set('form.prenom', 'User')
        ->set('form.email', 'test@example.com')
        ->set('form.password', 'password')
        ->set('form.password_confirmation', 'password')
        ->set('form.status', 'locataire')
        ->call('register');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('locataire.dashboard', absolute: false));

    expect(auth()->check())->toBeTrue();
});