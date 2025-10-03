<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PanoramaGenerationTest extends TestCase
{
    use RefreshDatabase;

    public function test_assemble_panorama_validation_errors(): void
    {
        $response = $this->postJson(route('panorama.assemble'), []);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['inputs']);
    }
}



