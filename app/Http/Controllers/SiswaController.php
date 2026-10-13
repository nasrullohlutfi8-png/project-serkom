<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $siswas = Siswa::with('kelas')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nisn', 'like', "%{$search}%")
                        ->orWhere('nama_siswa', 'like', "%{$search}%")
                        ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                        ->orWhere('tahun_masuk', 'like', "%{$search}%")
                        ->orWhereHas('kelas', function ($kelas) use ($search) {
                            $kelas->where('nama_kelas', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10);

        $siswas->appends(['search' => $search]);

        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswas,nisn',
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
            'kelas_id'      => 'required|exists:kelas,id',
        ]);

        Siswa::create($request->only([
            'nisn',
            'nama_siswa',
            'jenis_kelamin',
            'tahun_masuk',
            'kelas_id',
        ]));

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        return view('admin.siswa.update', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.siswa.update', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswas,nisn,' . $siswa->id,
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
            'kelas_id'      => 'required|exists:kelas,id',
        ]);

        $siswa->update($request->only([
            'nisn',
            'nama_siswa',
            'jenis_kelamin',
            'tahun_masuk',
            'kelas_id',
        ]));

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
