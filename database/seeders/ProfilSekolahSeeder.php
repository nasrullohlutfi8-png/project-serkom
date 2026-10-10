<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil_Sekolah;

class ProfilSekolahSeeder extends Seeder
{
    public function run(): void
    {
        Profil_Sekolah::create([
            'nama_sekolah' => 'SMAN 1 Padakembang',
            'kepala_sekolah' => 'Nama Kepala Sekolah',
            'logo' => 'profil/logo-sekolah.png',
            'foto' => 'profil/foto-sekolah.jpg',
            'npsn' => '20210215',
            'alamat' => 'Padakembang, Kabupaten Tasikmalaya, Jawa Barat',
            'kontak' => '081234567890',
            'visi_misi' => 'Menjadi sekolah yang unggul dalam prestasi, berkarakter, berwawasan lingkungan, dan mampu bersaing di era global.',
            'tahun_berdiri' => 1985,
            'deskripsi' => 'SMAN 1 Padakembang merupakan sekolah menengah atas yang berkomitmen memberikan pendidikan berkualitas serta mengembangkan potensi akademik dan nonakademik peserta didik.',
        ]);
    }
}