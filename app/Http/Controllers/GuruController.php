<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function publicIndex()
    {
        $guru = Guru::latest()->get();

        return view('landing.pages.guru.index', compact('guru'));
    }

    public function publicShow($uuid)
    {
        $guru = Guru::where('id', $uuid)->firstOrFail();

        return view('landing.pages.guru.show', compact('guru'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $gurus = Guru::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_guru', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('mapel', 'like', "%{$search}%")
                    ->orWhere('jabatan', 'like', "%{$search}%");
            });
        })
            ->latest()
            ->paginate(10);

        $gurus->appends(['search' => $search]);

        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:20|unique:gurus,nip',
            'mapel' => 'required|string|max:40',
            'jabatan' => 'required|in:guru_mapel,guru_produktif,tenaga_kependidikan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $input = $request->only([
            'nama_guru',
            'nip',
            'mapel',
            'jabatan',
        ]);

        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')
                ->store('guru', 'public');

            $input['foto'] = basename($filename);
        } else {
            $input['foto'] = 'tidak ada';
        }

        Guru::create($input);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function show(Guru $guru)
    {
        return view('admin.guru.update', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.update', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:20|unique:gurus,nip,' . $guru->id,
            'mapel' => 'required|string|max:40',
            'jabatan' => 'required|in:guru_mapel,guru_produktif,tenaga_kependidikan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $input = $request->only([
            'nama_guru',
            'nip',
            'mapel',
            'jabatan',
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto && $guru->foto !== 'tidak ada') {
                Storage::disk('public')->delete('guru/' . $guru->foto);
            }

            $filename = $request->file('foto')
                ->store('guru', 'public');

            $input['foto'] = basename($filename);
        }

        $guru->update($input);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto && $guru->foto !== 'tidak ada') {
            Storage::disk('public')->delete('guru/' . $guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}