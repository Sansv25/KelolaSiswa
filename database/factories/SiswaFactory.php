<?php

namespace Database\Factories;

use App\Models\Sekolah;
use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    public function definition(): array
{
    $firstName = $this->faker->firstName;
    $kelas = (string) rand(1, 12); // akan disesuaikan di seeder
    $prefix = '08' . rand(10, 99);
    $noTelp = "{$prefix}-" . rand(1000, 9999) . '-' . rand(1000, 9999);

    $kewarganegaraan = $this->faker->optional(0.5)->randomElement(['Indonesia']);
    $kewarganegaraan_lain = $kewarganegaraan === null ? $this->faker->country() : null;

    return [
        'asal_sekolah_id' => Sekolah::factory(),
        'nis' => $this->faker->numerify('####'),
        'nisn' => $this->faker->unique()->numerify('############'),
        'no_kk' => $this->faker->numerify('################'),
        'nik' => $this->faker->unique()->numerify('################'),
        'siswa_namalengkap' => $firstName . ' ' . $this->faker->lastName,
        'siswa_namapangilan' => $firstName,
        'tempatlahir' => $this->faker->city(),
        'tanggallahir' => $this->faker->date(),
        'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
        'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
        'kelas' => $kelas, // akan disesuaikan di seeder
        'jurusan' => null, // akan diisi di seeder
        'ntlp_siswa' => $noTelp,
        'kecamatan' => $this->faker->city(),
        'kabupaten' => $this->faker->city(),
        'asal_provinsi_id' => Provinsi::query()->inRandomOrder()->first()?->id,
        'alamat' => $this->faker->address(),
        'nama_ayah' => $this->faker->firstNameMale . ' ' . $this->faker->lastName,
        'pekerjaan_ayah' => $this->faker->jobTitle(),
        'penghasilan_ayah' => number_format(rand(1000000, 5000000), 0, ',', '.') . ' Rp',
        'nama_ibu' => $this->faker->firstNameFemale . ' ' . $this->faker->lastName,
        'pekerjaan_ibu' => $this->faker->jobTitle(),
        'penghasilan_ibu' => number_format(rand(1000000, 5000000), 0, ',', '.') . ' Rp',
        'ntlp_ortu' => $noTelp,
        'golongan_darah' => $this->faker->optional()->randomElement(['A', 'B', 'AB', 'O']),
        'tinggi_badan' => rand(140, 180),
        'berat_badan' => rand(40, 80),
        'hobi' => $this->faker->word(),
        'cita_cita' => $this->faker->randomElement(['Dokter', 'Guru', 'Programmer', 'Polisi']),
        'siswa_anak_ke' => rand(1, 4),
        'kewarganegaraan' => $kewarganegaraan,
        'kewarganegaraan_lain' => $kewarganegaraan_lain,
    ];
}

}
