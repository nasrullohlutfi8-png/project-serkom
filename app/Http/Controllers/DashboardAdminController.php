<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{

    public function index()
    {
        // 1. Data untuk 4 Card Statistik
        $totalSiswa    = Siswa::count();
        $totalGuru     = Guru::count();
        $totalPrestasi  = Prestasi::count();
        $totalEkskul    = Ekstrakulikuler::count();

        // 2. Ambil 5 Pengumuman Terbaru
        $pengumumanTerbaru = Pengumuman::latest()->take(2)->get();

        // 3. Ambil 5 Berita Terbaru
        $beritaTerbaru = Berita::latest()->take(2)->get();

        return view('admin.index', compact(
            'totalSiswa',
            'totalGuru',
            'totalPrestasi',
            'totalEkskul',
            'pengumumanTerbaru',
            'beritaTerbaru'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
