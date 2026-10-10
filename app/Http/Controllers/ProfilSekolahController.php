<?php

namespace App\Http\Controllers;

use App\Models\Profil_Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{

    public function publicIndex()
    {
        $profil = Profil_Sekolah::latest()->get();

        return view('landing.pages.profil.index', compact('profil'));
    }

    public function index()
    {
        $profil = Profil_Sekolah::firstOrFail();

        return view('admin.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = Profil_Sekolah::firstOrFail();

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil_Sekolah::firstOrFail();

        $request->validate([
            'nama_sekolah' => 'required|string|max:100',
            'kepala_sekolah' => 'required|string|max:100',
            'npsn' => 'required|string|max:20',
            'kontak' => 'required|string',
            'tahun_berdiri' => 'required|numeric',
            'alamat' => 'required|string',
            'visi_misi' => 'required|string',
            'deskripsi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only([
            'nama_sekolah',
            'kepala_sekolah',
            'npsn',
            'kontak',
            'tahun_berdiri',
            'alamat',
            'visi_misi',
            'deskripsi',
        ]);

        if ($request->hasFile('logo')) {
            $logoBaru = $request->file('logo')
                ->store('profil', 'public');

            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }

            $data['logo'] = $logoBaru;
        }

        if ($request->hasFile('foto')) {
            $fotoBaru = $request->file('foto')
                ->store('profil', 'public');

            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            $data['foto'] = $fotoBaru;
        }

        $profil->update($data);

        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil Sekolah berhasil diperbarui!');
    }
}