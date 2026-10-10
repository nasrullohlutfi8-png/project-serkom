<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{

    public function publicIndex()
    {
        $pengumuman = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->get();

        return view(
            'landing.pages.pengumuman.index',
            compact('pengumuman')
        );
    }

    public function publicShow($slug)
    {
        $pengumuman = Pengumuman::where('status', 'Publish')
            ->where('slug', $slug)
            ->firstOrFail();

        return view(
            'landing.pages.pengumuman.show',
            compact('pengumuman')
        );
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $pengumuman = Pengumuman::with('user')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->latest()
            ->paginate(10); // Menampilkan 10 data per halaman

        // Mempertahankan parameter pencarian saat berpindah halaman pagination
        $pengumuman->appends(['search' => $search]);

        return view('admin.pengumuman.index', compact('pengumuman')); // Sesuaikan path folder view Anda jika berbeda
    }
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'status'  => 'required|in:Publish,Draft',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['user_id'] = Auth::id();

        Pengumuman::create($validated);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $pengumuman = Pengumuman::findOrFail($id);

        return view(
            'admin.pengumuman.update',
            compact('pengumuman')
        );
    }

    public function update(Request $request, $id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $pengumuman = Pengumuman::findOrFail($id);

        $validated = $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'status'  => 'required|in:Publish,Draft',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        $pengumuman->update($validated);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $id = decryptId($id);

        abort_unless(ctype_digit($id), 404);

        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}