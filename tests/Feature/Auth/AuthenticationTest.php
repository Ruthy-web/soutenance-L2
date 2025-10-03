<?php

use App\Livewire\Auth\Login;
use App\Models\User;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create(['status' => 'bailleur']);

    $response = Livewire::test(Login::class)
        ->set('form.email', $user->email)
        ->set('form.password', 'password')
        ->call('authenticate');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('bailleur.dashboard', absolute: false));

    expect(auth()->check())->toBeTrue();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $response = Livewire::test(Login::class)
        ->set('form.email', $user->email)
        ->set('form.password', 'wrong-password')
        ->call('authenticate');

    $response->assertHasErrors('form.email');

    expect(auth()->check())->toBeFalse();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $response->assertRedirect('/');

    expect(auth()->check())->toBeFalse();
});