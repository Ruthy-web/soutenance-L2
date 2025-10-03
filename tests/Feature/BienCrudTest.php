<?php

namespace Tests\Feature;

use App\Models\Bien;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BienCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_biens_index_page_loads(): void
    {
        $response = $this->get(route('biens.index'));
        $response->assertOk();
    }

    public function test_create_bien_validation(): void
    {
        $response = $this->post(route('biens.create'));
        // Livewire components are mounted via GET; ensure route exists
        $response->assertStatus(405); // Method not allowed
    }
}



