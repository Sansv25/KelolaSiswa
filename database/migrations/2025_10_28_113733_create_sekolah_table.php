<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah')->index();
            $table->string('slug')->unique();
            $table->string('gambar')->nullable(); // logo sekolah
            $table->text('alamat');
            $table->string('no_telp')->unique()->nullable();
            $table->foreignId('provinsi_id')
                ->constrained('provinsi')
                ->onDelete('cascade');
            $table->enum('tipe_sekolah', ['SMA', 'SMK', 'SMP', 'SD', 'Lainnya']);
            $table->json('jurusan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
