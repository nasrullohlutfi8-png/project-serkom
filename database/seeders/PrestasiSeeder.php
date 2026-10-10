<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestasi;
use Illuminate\Support\Str;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        Prestasi::create([
            'nama_prestasi' => 'Juara 1 Olimpiade Sains',
            'slug' => Str::slug('Juara 1 Olimpiade Sains'),
            'tahun_ajaran' => '2025/2026',
            'deskripsi' => 'SMAN 1 Padakembang berhasil meraih juara 1 dalam Olimpiade Sains tingkat Kabupaten Tasikmalaya.',
            'foto' => 'tidak ada',
        ]);

        Prestasi::create([
            'nama_prestasi' => 'Juara 2 Futsal Pelajar',
            'slug' => Str::slug('Juara 2 Futsal Pelajar'),
            'tahun_ajaran' => '2025/2026',
            'deskripsi' => 'Tim futsal SMAN 1 Padakembang berhasil meraih juara 2 dalam kompetisi futsal pelajar tingkat Kabupaten Tasikmalaya.',
            'foto' => 'tidak ada',
        ]);

        Prestasi::create([
            'nama_prestasi' => 'Juara 1 Festival Seni',
            'slug' => Str::slug('Juara 1 Festival Seni'),
            'tahun_ajaran' => '2025/2026',
            'deskripsi' => 'Siswa SMAN 1 Padakembang berhasil meraih juara 1 dalam Festival Seni tingkat Kabupaten Tasikmalaya.',
            'foto' => 'tidak ada',
        ]);
    }
}