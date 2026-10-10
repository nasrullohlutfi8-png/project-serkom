<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;
use Illuminate\Support\Str;


class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::create([
            'judul' => 'Upacara HUT Kemerdekaan',
            'slug' => Str::slug('Upacara HUT Kemerdekaan '),
            'keterangan' => 'Dokumentasi kegiatan upacara peringatan Hari Kemerdekaan Republik Indonesia di SMAN 1 Padakembang.',
            'file' => 'galeri/upacara.jpg',
            'kategori' => 'Foto',
            'tanggal' => '2026-08-17',
        ]);

        Galeri::create([
            'judul' => 'Kegiatan MPLS Siswa Baru',
            'slug' => Str::slug('Kegiatan Mpls Siswa Baru'),
            'keterangan' => 'Dokumentasi kegiatan Masa Pengenalan Lingkungan Sekolah bagi peserta didik baru SMAN 1 Padakembang.',
            'file' => 'galeri/mpls.jpg',
            'kategori' => 'Foto',
            'tanggal' => '2026-07-15',
        ]);

        Galeri::create([
            'judul' => 'Pentas Seni Sekolah',
            'slug' => Str::slug('Pentas Seni Sekolah'),
            'keterangan' => 'Dokumentasi kegiatan pentas seni yang diikuti oleh siswa-siswi SMAN 1 Padakembang.',
            'file' => 'galeri/pentas-seni.mp4',
            'kategori' => 'Vidio',
            'tanggal' => '2026-08-25',
        ]);

        Galeri::create([
            'judul' => 'Kegiatan KTC Siswa Baru',
            'slug' => Str::slug('Kegiatan KTC Siswa Baru'),
            'keterangan' => 'Dokumentasi kegiatan upacara peringatan Hari Kemerdekaan Republik Indonesia di SMAN 1 Padakembang.',
            'file' => 'galeri/upacara.jpg',
            'kategori' => 'Foto',
            'tanggal' => '2026-08-17',
        ]);

        Galeri::create([
            'judul' => 'Kegiatan Olahraga',
            'slug' => Str::slug('Kegiatan Olahraga'),
            'keterangan' => 'Dokumentasi kegiatan Masa Pengenalan Lingkungan Sekolah bagi peserta didik baru SMAN 1 Padakembang.',
            'file' => 'galeri/mpls.jpg',
            'kategori' => 'Foto',
            'tanggal' => '2026-07-15',
        ]);

        Galeri::create([
            'judul' => 'Hari Batik Nasional',
            'slug' => Str::slug('Hari Batik Nasional'),
            'keterangan' => 'Dokumentasi kegiatan pentas seni yang diikuti oleh siswa-siswi SMAN 1 Padakembang.',
            'file' => 'galeri/pentas-seni.mp4',
            'kategori' => 'Vidio',
            'tanggal' => '2026-08-25',
        ]);
    }
}