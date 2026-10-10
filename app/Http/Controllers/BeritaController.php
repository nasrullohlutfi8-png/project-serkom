<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{

    public function publicIndex()
    {
        $berita = Berita::where('status', 'Pubish')
            ->latest('tanggal')
            ->get();

        return view(
            'landing.pages.berita.index',
            compact('berita')
        );
    }

    public function publicShow($slug)
    {
        $berita = Berita::where('status', 'Pubish')
            ->where('slug', $slug)
            ->firstOrFail();

        return view(
            'landing.pages.berita.show',
            compact('berita')
        );
    }
    
    // Menampilkan berita dan melakukan pencarian
    public function index(Request $request)
    {
        $search = $request->input('search');

        $berita = Berita::with('user')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.berita.index',
            compact('berita')
        );
    }

    // Form tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'  => 'required|in:Pubish,Draft',
        ]);

        $gambarPath = $request->file('gambar')
            ->store('berita', 'public');

        $slug = Str::slug($request->judul);

        Berita::create([
            'judul'   => $request->judul,
            'slug'    => $slug,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar'  => $gambarPath,
            'status'  => $request->status,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    // Form edit berita
    public function edit($id)
    {
        $id = decryptId($id);

        abort_unless(
            is_string($id) && ctype_digit($id),
            404
        );

        $berita = Berita::findOrFail($id);

        return view(
            'admin.berita.update',
            compact('berita')
        );
    }

    // Memperbarui berita dan menghapus foto lama jika diganti
    public function update(Request $request, $id)
    {
        $id = decryptId($id);

        abort_unless(
            is_string($id) && ctype_digit($id),
            404
        );

        $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'  => 'required|in:Pubish,Draft',
        ]);

        $berita = Berita::findOrFail($id);

        $gambarLama = $berita->gambar;
        $gambarBaru = null;

        // Upload foto baru terlebih dahulu
        if ($request->hasFile('gambar')) {
            $gambarBaru = $request->file('gambar')
                ->store('berita', 'public');
        }

        try {
            $data = [
                'judul'   => $request->judul,
                'slug'    => Str::slug($request->judul),
                'isi'     => $request->isi,
                'tanggal' => $request->tanggal,
                'status'  => $request->status,
            ];

            if ($gambarBaru !== null) {
                $data['gambar'] = $gambarBaru;
            }

            $berita->update($data);
        } catch (\Throwable $e) {
            // Jika update database gagal, hapus file baru
            if ($gambarBaru !== null) {
                Storage::disk('public')->delete($gambarBaru);
            }

            throw $e;
        }

        // Hapus foto lama setelah update berhasil
        if (
            $gambarBaru !== null &&
            $gambarLama &&
            $gambarLama !== $gambarBaru &&
            Storage::disk('public')->exists($gambarLama)
        ) {
            Storage::disk('public')->delete($gambarLama);
        }

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    // Menghapus berita beserta foto yang digunakan
    public function destroy($id)
    {
        $id = decryptId($id);

        abort_unless(
            is_string($id) && ctype_digit($id),
            404
        );

        $berita = Berita::findOrFail($id);
        $gambar = $berita->gambar;

        // Hapus data berita
        $berita->delete();

        // Hapus foto dari storage jika tidak digunakan lagi
        if (
            $gambar &&
            Storage::disk('public')->exists($gambar)
        ) {
            $masihDigunakan = Berita::where('gambar', $gambar)->exists();

            if (!$masihDigunakan) {
                Storage::disk('public')->delete($gambar);
            }
        }

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita dan foto berhasil dihapus!');
    }
}