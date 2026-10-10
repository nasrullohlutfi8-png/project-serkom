<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EkstrakulikulerController extends Controller
{

    public function publicIndex()
    {
        $ekstrakulikuler = Ekstrakulikuler::latest()->get();

        return view(
            'landing.pages.ekstrakulikuler.index',
            compact('ekstrakulikuler')
        );
    }

    public function publicShow($slug)
    {
        $ekstrakulikuler = Ekstrakulikuler::where('slug', $slug)
            ->firstOrFail();

        return view(
            'landing.pages.ekstrakulikuler.show',
            compact('ekstrakulikuler')
        );
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $ekstrakulikuler = Ekstrakulikuler::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('nama_eskul', 'like', "%{$search}%")
                    ->orWhere('pembina', 'like', "%{$search}%")
                    ->orWhere('jadwal_latihan', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        })
            ->latest()
            ->paginate(10);

        $ekstrakulikuler->appends(['search' => $search]);

        return view(
            'admin.ekstrakulikuler.index',
            compact('ekstrakulikuler')
        );
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $input = $request->only([
            'nama_eskul',
            'pembina',
            'jadwal_latihan',
            'deskripsi',
        ]);

        $input['slug'] = Str::slug($request->nama_eskul);
        $input['gambar'] = null;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')
                ->store('ekstrakulikuler', 'public');

            $input['gambar'] = basename($path);
        }

        Ekstrakulikuler::create($input);

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        return view(
            'admin.ekstrakulikuler.update',
            compact('ekstrakulikuler')
        );
    }

    public function update(Request $request, $id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        $request->validate([
            'nama_eskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $input = $request->only([
            'nama_eskul',
            'pembina',
            'jadwal_latihan',
            'deskripsi',
        ]);

        $input['slug'] = Str::slug($request->nama_eskul);

        if ($request->hasFile('gambar')) {
            $gambarLama = $ekstrakulikuler->gambar;

            $path = $request->file('gambar')
                ->store('ekstrakulikuler', 'public');

            $input['gambar'] = basename($path);

            if ($gambarLama) {
                Storage::disk('public')->delete(
                    'ekstrakulikuler/' . $gambarLama
                );
            }
        }

        $ekstrakulikuler->update($input);

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        if ($ekstrakulikuler->gambar) {
            Storage::disk('public')->delete(
                'ekstrakulikuler/' . $ekstrakulikuler->gambar
            );
        }

        $ekstrakulikuler->delete();

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus.');
    }
}