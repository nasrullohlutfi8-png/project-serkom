<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gurus')->insert([
            [
                'id' => (string) Str::uuid(),
                'nama_guru' => 'Ahmad Fauzi',
                'nip' => '198501012010011001',
                'mapel' => 'Matematika',
                'jabatan' => 'guru_mapel',
                'foto' => 'tidak ada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_guru' => 'Siti Nurhaliza',
                'nip' => '198702152011012002',
                'mapel' => 'Bahasa Indonesia',
                'jabatan' => 'guru_mapel',
                'foto' => 'tidak ada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_guru' => 'Dedi Kurniawan',
                'nip' => '198903202012011003',
                'mapel' => 'Pemrograman Dasar',
                'jabatan' => 'guru_produktif',
                'foto' => 'tidak ada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_guru' => 'Rina Marlina',
                'nip' => '199005102013012004',
                'mapel' => 'Bahasa Inggris',
                'jabatan' => 'guru_mapel',
                'foto' => 'tidak ada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_guru' => 'Budi Santoso',
                'nip' => '198406252009011005',
                'mapel' => 'Administrasi Sekolah',
                'jabatan' => 'tenaga_kependidikan',
                'foto' => 'tidak ada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}