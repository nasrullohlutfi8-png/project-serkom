<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        Berita::create([
            'judul' => 'MPLS SMAN 1 Padakembang',
            'slug' => Str::slug('MPLS SMAN 1 Padakembang'),
            'isi' => 'SMAN 1 Padakembang melaksanakan kegiatan Masa Pengenalan Lingkungan Sekolah bagi peserta didik baru. Kegiatan ini bertujuan untuk mengenalkan lingkungan sekolah, tata tertib, serta berbagai kegiatan yang ada di sekolah.',
            'tanggal' => '2026-07-15',
            'gambar' => 'berita/mpls.jpg',
            'status' => 'Pubish',
            'user_id' => $user->id,
        ]);

        Berita::create([
            'judul' => 'Prestasi Siswa SMAN 1 Padakembang',
            'slug' => Str::slug('Prestasi Siswa SMAN 1 Padakembang'),
            'isi' => 'Siswa SMAN 1 Padakembang berhasil meraih prestasi dalam berbagai kompetisi. Prestasi tersebut menjadi kebanggaan bagi sekolah dan menjadi motivasi bagi siswa lainnya.',
            'tanggal' => '2026-08-10',
            'gambar' => 'berita/prestasi.jpg',
            'status' => 'Pubish',
            'user_id' => $user->id,
        ]);

        Berita::create([
            'judul' => 'Kegiatan Hari Kemerdekaan',
            'slug' => Str::slug('Kegiatan Hari Kemerdekaan'),
            'isi' => 'SMAN 1 Padakembang mengadakan berbagai kegiatan dalam rangka memperingati Hari Kemerdekaan Republik Indonesia. Kegiatan diikuti oleh seluruh warga sekolah dengan penuh semangat.',
            'tanggal' => '2026-08-17',
            'gambar' => 'berita/kemerdekaan.jpg',
            'status' => 'Pubish',
            'user_id' => $user->id,
        ]);
    }
}