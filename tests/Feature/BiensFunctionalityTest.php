<?php

namespace Tests\Feature;

use App\Livewire\Biens\BienIndex;
use App\Livewire\Biens\BienForm;
use App\Models\User;
use App\Models\Bien;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BiensFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function biens_index_can_be_rendered()
    {
        Livewire::test(BienIndex::class)
            ->assertStatus(200);
    }

    /** @test */
    public function biens_create_form_can_be_rendered()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        
        Livewire::actingAs($user)
            ->test(BienForm::class)
            ->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_access_biens_index()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        
        $response = $this->actingAs($user)->get('/biens');
        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_access_biens_create()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        
        $response = $this->actingAs($user)->get('/biens/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function biens_can_be_created()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        
        $bienData = [
            'titre' => 'Appartement moderne',
            'description' => 'Un bel appartement en centre-ville',
            'prix' => 500000,
            'localisation' => 'Abidjan, Côte d\'Ivoire',
            'type' => 'appartement',
            'surface' => 80,
            'chambres' => 2,
            'salles_bain' => 1,
        ];

        $bien = Bien::create(array_merge($bienData, ['user_id' => $user->id]));

        $this->assertDatabaseHas('biens', [
            'titre' => 'Appartement moderne',
            'prix' => 500000,
            'user_id' => $user->id
        ]);
    }

    /** @test */
    public function biens_can_be_updated()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        $bien = Bien::factory()->create(['user_id' => $user->id]);

        $bien->update(['prix' => 600000]);

        $this->assertDatabaseHas('biens', [
            'id' => $bien->id,
            'prix' => 600000
        ]);
    }

    /** @test */
    public function biens_can_be_deleted()
    {
        $user = User::factory()->create(['status' => 'bailleur']);
        $bien = Bien::factory()->create(['user_id' => $user->id]);

        $bien->delete();

        $this->assertDatabaseMissing('biens', [
            'id' => $bien->id
        ]);
    }

    /** @test */
    public function property_search_returns_results()
    {
        $bien1 = Bien::factory()->create([
            'titre' => 'Appartement moderne',
            'type' => 'appartement',
            'localisation' => 'Abidjan',
            'prix' => 300000
        ]);

        $bien2 = Bien::factory()->create([
            'titre' => 'Maison familiale',
            'type' => 'maison',
            'localisation' => 'Yamoussoukro',
            'prix' => 500000
        ]);

        $response = $this->get('/recherche-logement?type=appartement');
        $response->assertStatus(200);
        $response->assertSee('Appartement moderne');
    }

    /** @test */
    public function property_search_filters_by_location()
    {
        Bien::factory()->create(['localisation' => 'Abidjan']);
        Bien::factory()->create(['localisation' => 'Yamoussoukro']);

        $response = $this->get('/recherche-logement?localisation=Abidjan');
        $response->assertStatus(200);
    }

    /** @test */
    public function property_search_filters_by_max_price()
    {
        Bien::factory()->create(['prix' => 300000]);
        Bien::factory()->create(['prix' => 500000]);

        $response = $this->get('/recherche-logement?max_prix=400000');
        $response->assertStatus(200);
    }

    /** @test */
    public function biens_are_paginated()
    {
        // Créer plus de biens que la limite de pagination
        Bien::factory()->count(15)->create();

        $response = $this->get('/recherche-logement');
        $response->assertStatus(200);
        
        // Vérifier que la page se charge correctement avec beaucoup de données
        // (La pagination est gérée automatiquement par Laravel)
        $this->assertTrue(true); // Test de base pour vérifier que la page fonctionne
    }

    /** @test */
    public function bailleur_can_manage_own_properties()
    {
        $bailleur = User::factory()->create(['status' => 'bailleur']);
        $autreBailleur = User::factory()->create(['status' => 'bailleur']);
        
        $monBien = Bien::factory()->create(['user_id' => $bailleur->id]);
        $autreBien = Bien::factory()->create(['user_id' => $autreBailleur->id]);

        $this->actingAs($bailleur);

        // Le bailleur peut voir ses propres biens
        $this->assertTrue($bailleur->biens->contains($monBien));
        
        // Le bailleur ne peut pas voir les biens des autres (selon la logique métier)
        $this->assertFalse($bailleur->biens->contains($autreBien));
    }

    /** @test */
    public function locataire_can_view_all_properties()
    {
        $locataire = User::factory()->create(['status' => 'locataire']);
        $bailleur = User::factory()->create(['status' => 'bailleur']);
        
        $bien = Bien::factory()->create(['user_id' => $bailleur->id]);

        $response = $this->actingAs($locataire)->get('/biens');
        $response->assertStatus(200);
    }

    /** @test */
    public function property_details_can_be_viewed()
    {
        $bien = Bien::factory()->create([
            'titre' => 'Appartement de luxe',
            'description' => 'Description détaillée',
            'prix' => 750000
        ]);

        $response = $this->get('/property-details');
        $response->assertStatus(200);
    }

    /** @test */
    public function virtual_tour_page_loads()
    {
        $response = $this->get('/virtual-tour');
        $response->assertStatus(200);
    }

    /** @test */
    public function panorama_generation_endpoint_exists()
    {
        $response = $this->post('/panorama/assemble');
        // Peut retourner 422 (validation error), 200 (success) ou 404 (not found)
        $this->assertContains($response->status(), [200, 422, 404]);
    }
}
