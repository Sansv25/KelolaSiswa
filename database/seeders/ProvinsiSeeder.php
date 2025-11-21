<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provinsi::factory()->create([
            'nama' => 'Bali',
            'slug' => 'bali',
            'gambar' => "bali.png",
            'luas_km2' => 5780.06,
            'bahasa' => 'Bahasa Bali',
            'ekonomi' => 'Pariwisata dan Pertanian',
        ]);

        Provinsi::factory()->create([
            'nama' => 'Jakarta',
            'slug' => 'jakarta',
            'gambar' => 'jakarta.png',
            'luas_km2' => 1000.06,
            'bahasa' => 'Bahasa Indonesia',
            'ekonomi' => 'Kantoran',
        ]);
    }
}
