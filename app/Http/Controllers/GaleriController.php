<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $galeri = Galeri::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%");
            });
        })
            ->latest()
            ->paginate(10);

        $galeri->appends(['search' => $search]);

        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:Foto,Vidio',
            'tanggal' => 'required|date',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:20480',
        ]);
        
        $filePath = $request->file('file')->store('galeri', 'public');
        
        $slug = Str::slug($request->judul);


        Galeri::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'file' => $filePath,
        ]);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.update', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:Foto,Vidio',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:20480',
        ]);

        $input = $request->only([
            'judul',
            'keterangan',
            'kategori',
            'tanggal',
        ]);

        if ($request->hasFile('file')) {
            // Simpan file baru terlebih dahulu
            $fileBaru = $request->file('file')->store('galeri', 'public');

            // Hapus file lama jika file baru berhasil disimpan
            if ($galeri->file) {
                Storage::disk('public')->delete($galeri->file);
            }

            $input['file'] = $fileBaru;
        }

        // Jika tidak ada file baru, file lama tetap dipertahankan
        $galeri->update($input);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $galeri = Galeri::findOrFail($id);

        // Hapus file foto atau video dari storage
        if ($galeri->file) {
            Storage::disk('public')->delete($galeri->file);
        }

        // Hapus data dari database
        $galeri->delete();

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil dihapus!');
    }
}