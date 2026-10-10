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
        Schema::create('gurus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_guru', 40);
            $table->string('nip', 20)->unique();
            $table->string('mapel', 40);
            $table->enum('jabatan', ['guru_mapel', 'guru_produktif', 'tenaga_kependidikan']);
            $table->string('foto', 100)->default('tidak ada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
