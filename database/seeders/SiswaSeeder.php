<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil data kelas yang sudah ada di database
        $kelasRpl1 = DB::table('kelas')->where('nama_kelas', 'XII RPL 1')->first();
        $kelasRpl2 = DB::table('kelas')->where('nama_kelas', 'XII RPL 2')->first();

        DB::table('siswas')->insert([
            [
                'id' => Str::uuid(),
                'nisn' => '0081234567',
                'nama_siswa' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'Laki-laki',
                'kelas_id' => $kelasRpl1 ? $kelasRpl1->id : null,
                'tahun_masuk' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nisn' => '0087654321',
                'nama_siswa' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'Perempuan',
                'kelas_id' => $kelasRpl2 ? $kelasRpl2->id : null,
                'tahun_masuk' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}