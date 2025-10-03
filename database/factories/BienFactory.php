<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bien>
 */
class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'prix' => $this->faker->numberBetween(100000, 2000000),
            'localisation' => $this->faker->city(),
            'type' => $this->faker->randomElement(['appartement', 'maison', 'studio', 'villa']),
            'surface' => $this->faker->numberBetween(30, 200),
            'chambres' => $this->faker->numberBetween(1, 5),
            'salles_bain' => $this->faker->numberBetween(1, 3),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
