<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Bien;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ApplicationWorkflowTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function visitor_can_access_public_pages()
    {
        $publicRoutes = [
            '/' => 'Page d\'accueil',
            '/apropos' => 'À propos',
            '/contact' => 'Contact',
            '/properties' => 'Propriétés',
            '/virtual-tour' => 'Visite virtuelle',
            '/login' => 'Connexion',
            '/register' => 'Inscription',
        ];

        foreach ($publicRoutes as $route => $description) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /** @test */
    public function protected_routes_redirect_to_login()
    {
        $protectedRoutes = [
            '/bailleur' => 'Dashboard bailleur',
            '/locataire' => 'Dashboard locataire',
            '/publier_logement' => 'Publier logement',
            '/mes-logements' => 'Mes logements',
            '/reserver' => 'Réserver',
            '/settings/profile' => 'Profil',
        ];

        foreach ($protectedRoutes as $route => $description) {
            $response = $this->get($route);
            $response->assertRedirect('/login');
        }
    }

    /** @test */
    public function user_can_register_as_bailleur()
    {
        $response = Livewire::test(Register::class)
            ->set('form.nom', 'Dupont')
            ->set('form.prenom', 'Jean')
            ->set('form.email', 'jean.dupont@example.com')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'password123')
            ->set('form.status', 'bailleur')
            ->call('register');
        
        $this->assertDatabaseHas('users', [
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'email' => 'jean.dupont@example.com',
            'status' => 'bailleur',
        ]);

        $user = User::where('email', 'jean.dupont@example.com')->first();
        $this->assertTrue(password_verify('password123', $user->password));
    }

    /** @test */
    public function user_can_register_as_locataire()
    {
        $response = Livewire::test(Register::class)
            ->set('form.nom', 'Martin')
            ->set('form.prenom', 'Marie')
            ->set('form.email', 'marie.martin@example.com')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'password123')
            ->set('form.status', 'locataire')
            ->call('register');
        
        $this->assertDatabaseHas('users', [
            'nom' => 'Martin',
            'prenom' => 'Marie',
            'email' => 'marie.martin@example.com',
            'status' => 'locataire',
        ]);
    }

    /** @test */
    public function user_can_login_and_access_dashboard()
    {
        $user = User::factory()->create([
            'status' => 'bailleur',
            'password' => bcrypt('password123')
        ]);

        $response = Livewire::test(Login::class)
            ->set('form.email', $user->email)
            ->set('form.password', 'password123')
            ->call('authenticate');
        
        $this->assertAuthenticated();
        $this->assertEquals($user->id, auth()->id());
    }

    /** @test */
    public function bailleur_can_access_bailleur_dashboard()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        
        $response = $this->actingAs($user)->get('/bailleur');
        $response->assertStatus(200);
    }

    /** @test */
    public function locataire_can_access_locataire_dashboard()
    {
        $user = User::factory()->create(['status' => 'locataire']);
        
        $response = $this->actingAs($user)->get('/locataire');
        $response->assertStatus(200);
    }

    /** @test */
    public function bailleur_can_access_property_management()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        
        $routes = [
            '/publier_logement',
            '/mes-logements',
            '/ajouter-logement',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($user)->get($route);
            $response->assertStatus(200);
        }
    }

    /** @test */
    public function locataire_can_access_rental_features()
    {
        $user = User::factory()->create(['status' => 'locataire']);
        
        $routes = [
            '/reserver',
            '/reservation',
            '/contacter-bailleur',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($user)->get($route);
            $response->assertStatus(200);
        }
    }

    /** @test */
    public function biens_crud_functionality_works()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        
        // Test accès à la liste des biens
        $response = $this->actingAs($user)->get('/biens');
        $response->assertStatus(200);

        // Test accès au formulaire de création
        $response = $this->actingAs($user)->get('/biens/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function property_search_functionality_works()
    {
        $response = $this->get('/recherche-logement');
        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();
        
        $this->actingAs($user);
        $this->assertAuthenticated();
        
        $response = $this->post('/logout');
        $response->assertRedirect('/');
        $this->assertGuest();
    }

    /** @test */
    public function registration_validation_works()
    {
        // Test email requis
        $response = Livewire::test(Register::class)
            ->set('form.nom', 'Test')
            ->set('form.prenom', 'User')
            ->set('form.email', '')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'password123')
            ->set('form.status', 'locataire')
            ->call('register');
        
        $response->assertHasErrors(['form.email']);
    }

    /** @test */
    public function password_confirmation_validation_works()
    {
        $response = Livewire::test(Register::class)
            ->set('form.nom', 'Test')
            ->set('form.prenom', 'User')
            ->set('form.email', 'test@example.com')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'different123')
            ->set('form.status', 'locataire')
            ->call('register');
        
        $response->assertHasErrors(['form.password']);
    }

    /** @test */
    public function unique_email_validation_works()
    {
        // Créer un utilisateur existant
        User::factory()->create(['email' => 'existing@example.com']);
        
        // Essayer de créer un autre utilisateur avec le même email
        $response = Livewire::test(Register::class)
            ->set('form.nom', 'Test')
            ->set('form.prenom', 'User')
            ->set('form.email', 'existing@example.com')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'password123')
            ->set('form.status', 'locataire')
            ->call('register');
        
        $response->assertHasErrors(['form.email']);
    }
}
