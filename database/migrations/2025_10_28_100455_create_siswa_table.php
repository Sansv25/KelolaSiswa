<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel sekolah
            $table->foreignId('asal_sekolah_id')
                ->constrained('sekolah')
                ->onDelete('cascade');

            // Data identitas dasar
            $table->string('nis');
            $table->string('nisn')->unique();
            $table->string('no_kk');
            $table->string('nik')->unique();

            // Nama dan data pribadi
            $table->string('siswa_namalengkap');
            $table->string('siswa_namapangilan');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('agama');
            $table->string('jenis_kelamin');

            // Pendidikan
            $table->string('kelas');
            $table->string('jurusan')->nullable();

            // Kontak
            $table->string('ntlp_siswa')->nullable();
            $table->string('ntlp_ortu')->nullable();

            // Alamat lengkap
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->foreignId('asal_provinsi_id')
                ->constrained('provinsi')
                ->onDelete('cascade');
            $table->string('alamat');

            // Data orang tua
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');

            // Data tambahan
            $table->string('golongan_darah')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->integer('siswa_anak_ke')->nullable();

            // Kewarganegaraan
            $table->string('kewarganegaraan')->nullable();
            $table->string('kewarganegaraan_lain')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
