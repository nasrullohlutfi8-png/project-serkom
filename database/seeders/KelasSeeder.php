<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        // Masukkan data kelas dengan UUID manual
        DB::table('kelas')->insert([
            [
                'id' => Str::uuid(),
                'nama_kelas' => 'XII RPL 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_kelas' => 'XII RPL 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}