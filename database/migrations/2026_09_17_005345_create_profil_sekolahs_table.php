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
        Schema::create('profil_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah', 40);
            $table->string('kepala_sekolah', 40);
            $table->string('logo')->nullable();
            $table->string('foto')->nullable();
            $table->string('npsn', 10);
            $table->text('alamat');
            $table->string('kontak');
            $table->text('visi_misi');
            $table->year('tahun_berdiri');
            $table->text('deskripsi');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_sekolahs');
    }
};
