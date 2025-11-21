<?php

namespace Database\Factories;

use App\Models\Provinsi;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SekolahFactory extends Factory
{
    public function definition(): array
    {
        $prefix = '08' . $this->faker->numerify('##'); // hasil: 0812, 0851, dll
        $noTelp = $this->faker->numerify($prefix . '-####-####');
        return [
            'alamat' => $this->faker->address(),
            'provinsi_id' => Provinsi::factory(),
            'deskripsi' => $this->faker->sentence(),
            'no_telp' => $noTelp,
        ];
    }
}


