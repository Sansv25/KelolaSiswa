<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Sekolah::factory()->create([
            'nama_sekolah' => 'SD 4 Ubung',
            'slug' => 'sd-4-ubung',
            'gambar' => 'sd-4-ubung.png',
            'provinsi_id' => 1,
            'tipe_sekolah' => 'SD',
            'jurusan' => null,
            'website' => 'https://www.sd4ubung.sch.id',
        ]);

        Sekolah::factory()->create([
            'nama_sekolah' => 'SMK TI Bali Global Badung',
            'slug' => 'smk-ti-bali-global-badung',
            'gambar' => 'smk-ti-bali-global-badung.png',
            'provinsi_id' => 1,
            'tipe_sekolah' => 'SMK',
            'jurusan' => ['Desain Komunikasi Visual', 'pengembangan Perangkat Lunak Dan Gim'],
            'website' => 'https://www.smkti.sch.id',
        ]);

        Sekolah::factory()->create([
            'nama_sekolah' => 'SMK 1 Denpasar',
            'slug' => 'smk-1-denpasar',
            'gambar' => 'smk-1-denpasar.png',
            'provinsi_id' => 2,
            'tipe_sekolah' => 'SMK',
            'jurusan' => ['Teknik Komputer dan Jaringan', 'Multimedia', 'Akuntansi'],
            'website' => 'https://www.smk1denpasar.sch.id',
        ]);
    }
}
