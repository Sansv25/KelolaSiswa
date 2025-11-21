<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Provinsi;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 20 sekolah terlebih dahulu
        $this->call([
            ProvinsiSeeder::class,
            SekolahSeeder::class,
        ]);

        Siswa::factory(500)
            ->recycle(Sekolah::all())
            ->create()
            ->load('sekolah')
            ->each(function ($siswa) {
                $sekolah = $siswa->sekolah;

                if (!$sekolah) return;

                $kelas = match ($sekolah->tipe_sekolah) {
                    'SD' => (string) rand(1, 6),
                    'SMP' => (string) rand(7, 9),
                    'SMA', 'SMK' => (string) rand(10, 12),
                    default => (string) rand(1, 12),
                };

                $jurusan = is_array($sekolah->jurusan)
                    ? collect($sekolah->jurusan)->random()
                    : null;

                $siswa->update([
                    'kelas' => $kelas,
                    'jurusan' => $jurusan
                ]);
            });

        User::create([
            'name' => 'Sanjaya',
            'email' => 'madesanjaya255@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Ganti dengan password yang kamu inginkan
            'remember_token' => Str::random(10),
        ]);
    }
}
