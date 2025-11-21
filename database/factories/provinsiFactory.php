<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class provinsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->state(),
            'slug' => $this->faker->unique()->slug(),
            'luas_km2' => $this->faker->randomFloat(2, 1000, 50000),
            'bahasa' => $this->faker->languageCode(),
            'ekonomi' => $this->faker->word(),
        ];
    }
}
