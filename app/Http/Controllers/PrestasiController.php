<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{

    public function publicIndex()
    {
        $prestasi = Prestasi::latest()->get();

        return view(
            'landing.pages.prestasi.index',
            compact('prestasi')
        );
    }

    public function publicShow($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)
            ->firstOrFail();

        return view(
            'landing.pages.prestasi.show',
            compact('prestasi')
        );
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $prestasis = Prestasi::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('nama_prestasi', 'like', "%{$search}%")
                    ->orWhere('tahun_ajaran', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        })
            ->latest()
            ->paginate(10);

        $prestasis->appends(['search' => $search]);

        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:40',
            'tahun_ajaran' => 'required|string|max:20',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $input = $request->only([
            'nama_prestasi',
            'tahun_ajaran',
            'deskripsi',
        ]);

        $input['slug'] = Str::slug($request->nama_prestasi);

        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')
                ->store('prestasi', 'public');

            $input['foto'] = basename($filename);
        } else {
            $input['foto'] = 'tidak ada';
        }

        Prestasi::create($input);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.update', compact('prestasi'));
    }

    public function edit($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.update', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:40',
            'tahun_ajaran' => 'required|string|max:20',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $input = $request->only([
            'nama_prestasi',
            'tahun_ajaran',
            'deskripsi',
        ]);

        $input['slug'] = Str::slug($request->nama_prestasi);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika bukan foto default
            if ($prestasi->foto && $prestasi->foto !== 'tidak ada') {
                Storage::disk('public')->delete(
                    'prestasi/' . $prestasi->foto
                );
            }

            // Simpan foto baru
            $filename = $request->file('foto')
                ->store('prestasi', 'public');

            $input['foto'] = basename($filename);
        }

        // Jika tidak ada foto baru, foto lama tetap dipertahankan
        $prestasi->update($input);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $prestasi = Prestasi::findOrFail($id);

        // Hapus file foto sebelum menghapus data
        if ($prestasi->foto && $prestasi->foto !== 'tidak ada') {
            Storage::disk('public')->delete(
                'prestasi/' . $prestasi->foto
            );
        }

        $prestasi->delete();

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}