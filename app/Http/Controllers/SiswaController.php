<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $siswas = Siswa::when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nisn', 'like', "%{$search}%")
                    ->orWhere('nama_siswa', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                    ->orWhere('tahun_masuk', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10); // Menampilkan 10 data per halaman

        // Mempertahankan parameter pencarian saat berpindah halaman pagination
        $siswas->appends(['search' => $search]);

        return view('admin.siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswas',
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        Siswa::create($request->only(['nisn', 'nama_siswa', 'jenis_kelamin', 'tahun_masuk']));

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
        return view('admin.siswa.update', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
        return view('admin.siswa.update', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        $request->validate([
            'nisn'           => 'required|string|max:10|unique:siswas,nisn,' . $siswa->id,
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        $siswa->update($request->only(['nisn', 'nama_siswa', 'jenis_kelamin', 'tahun_masuk']));

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
