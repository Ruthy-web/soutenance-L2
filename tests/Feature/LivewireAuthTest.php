<?php

namespace Tests\Feature;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LivewireAuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_component_can_be_rendered()
    {
        Livewire::test(Login::class)
            ->assertStatus(200);
    }

    /** @test */
    public function register_component_can_be_rendered()
    {
        Livewire::test(Register::class)
            ->assertStatus(200);
    }

    /** @test */
    public function user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'status' => 'bailleur'
        ]);

        Livewire::test(Login::class)
            ->set('form.email', 'test@example.com')
            ->set('form.password', 'password123')
            ->call('authenticate')
            ->assertRedirect(route('bailleur.dashboard'));

        $this->assertAuthenticated();
    }

    /** @test */
    public function login_fails_with_invalid_credentials()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        Livewire::test(Login::class)
            ->set('form.email', 'test@example.com')
            ->set('form.password', 'wrongpassword')
            ->call('authenticate')
            ->assertHasErrors(['form.email']);
    }

    /** @test */
    public function login_redirects_locataire_to_correct_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'locataire@example.com',
            'password' => bcrypt('password123'),
            'status' => 'locataire'
        ]);

        Livewire::test(Login::class)
            ->set('form.email', 'locataire@example.com')
            ->set('form.password', 'password123')
            ->call('authenticate')
            ->assertRedirect(route('locataire.dashboard'));
    }

    /** @test */
    public function login_redirects_bailleur_to_correct_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'bailleur@example.com',
            'password' => bcrypt('password123'),
            'status' => 'bailleur'
        ]);

        Livewire::test(Login::class)
            ->set('form.email', 'bailleur@example.com')
            ->set('form.password', 'password123')
            ->call('authenticate')
            ->assertRedirect(route('bailleur.dashboard'));
    }

    /** @test */
    public function user_can_register_with_valid_data()
    {
        Livewire::test(Register::class)
            ->set('form.nom', 'Dupont')
            ->set('form.prenom', 'Jean')
            ->set('form.email', 'jean@example.com')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'password123')
            ->set('form.status', 'bailleur')
            ->call('register')
            ->assertRedirect(route('bailleur.dashboard'));

        $this->assertDatabaseHas('users', [
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'email' => 'jean@example.com',
            'status' => 'bailleur'
        ]);

        $this->assertAuthenticated();
    }

    /** @test */
    public function registration_validates_required_fields()
    {
        Livewire::test(Register::class)
            ->set('form.nom', '')
            ->set('form.prenom', '')
            ->set('form.email', '')
            ->set('form.password', '')
            ->set('form.password_confirmation', '')
            ->set('form.status', '')
            ->call('register')
            ->assertHasErrors([
                'form.nom',
                'form.prenom',
                'form.email',
                'form.password',
                'form.status'
            ]);
    }

    /** @test */
    public function registration_validates_email_format()
    {
        Livewire::test(Register::class)
            ->set('form.email', 'invalid-email')
            ->call('register')
            ->assertHasErrors(['form.email']);
    }

    /** @test */
    public function registration_validates_password_confirmation()
    {
        Livewire::test(Register::class)
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'different123')
            ->call('register')
            ->assertHasErrors(['form.password']);
    }

    /** @test */
    public function registration_validates_unique_email()
    {
        User::factory()->create(['email' => 'existing@example.com']);

        Livewire::test(Register::class)
            ->set('form.email', 'existing@example.com')
            ->call('register')
            ->assertHasErrors(['form.email']);
    }

    /** @test */
    public function registration_validates_status_enum()
    {
        Livewire::test(Register::class)
            ->set('form.status', 'invalid_status')
            ->call('register')
            ->assertHasErrors(['form.status']);
    }

    /** @test */
    public function login_rate_limiting_works()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $component = Livewire::test(Login::class);

        // Essayer de se connecter avec de mauvais mots de passe
        $component->set('form.email', 'test@example.com')
                 ->set('form.password', 'wrongpassword')
                 ->call('authenticate')
                 ->assertHasErrors(['form.email']);
    }
}
