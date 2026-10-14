<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Profil_Sekolah;
use App\Models\Siswa;

class LandingController extends Controller
{
    public function profil()
    {
        return view('landing.profil');
    }
    
    public function index()
    {
        // Data ekstrakurikuler
        $ekstrakulikuler = Ekstrakulikuler::latest()
            ->take(3)
            ->get();

        // Data prestasi
        $prestasi = Prestasi::latest()
            ->take(3)
            ->get();

        // Data pengumuman
        $pengumuman = Pengumuman::latest('tanggal')
            ->take(6)
            ->get();

        // Data guru
        $guru = Guru::latest()
            ->get();

        $siswa = Siswa::latest()
            ->take(10)
            ->get();

        // Data galeri
        $galeri = Galeri::latest('tanggal')
            ->take(3)
            ->get();

        // Data berita yang sudah dipublish
        $berita = Berita::where('status', 'Pubish')
            ->latest()
            ->take(3)
            ->get();

        // Profil sekolah
        $profilSekolah = Profil_Sekolah::first();

        // Statistik
        $jumlahSiswa = \App\Models\Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahEskul = Ekstrakulikuler::count();
        $jumlahPrestasi = Prestasi::count();

        return view('landing.index', compact(
            'profilSekolah',
            'ekstrakulikuler',
            'prestasi',
            'pengumuman',
            'guru',
            'berita',
            'galeri',
            'siswa',
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahEskul',
            'jumlahPrestasi'
        ));
    }
}