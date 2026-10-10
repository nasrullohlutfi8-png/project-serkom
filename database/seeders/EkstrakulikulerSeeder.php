<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Str;

class EkstrakulikulerSeeder extends Seeder
{
    public function run(): void
    {
        Ekstrakulikuler::create([
            'nama_eskul' => 'Futsal',
            'slug' => Str::slug('Futsal'),
            'pembina' => 'Bapak Asep',
            'jadwal_latihan' => 'Senin, 15:30 - 17:00',
            'deskripsi' => 'Kegiatan olahraga futsal untuk mengembangkan kemampuan, kerja sama tim, kedisiplinan, dan sportivitas siswa.',
            'gambar' => null,
        ]);

        Ekstrakulikuler::create([
            'nama_eskul' => 'Pramuka',
            'slug' => Str::slug('Pramuka'),
            'pembina' => 'Ibu Siti',
            'jadwal_latihan' => 'Jumat, 13:30 - 15:30',
            'deskripsi' => 'Kegiatan Pramuka yang bertujuan membentuk karakter siswa agar mandiri, disiplin, bertanggung jawab, dan memiliki jiwa kepemimpinan.',
            'gambar' => null,
        ]);

        Ekstrakulikuler::create([
            'nama_eskul' => 'Bulu Tangkis',
            'slug' => Str::slug('Bulu Tangkis'),
            'pembina' => 'Bapak Dodo',
            'jadwal_latihan' => 'Rabu, 15:30 - 17:00',
            'deskripsi' => 'Kegiatan seni musik dan vokal untuk mengembangkan bakat siswa dalam bernyanyi serta meningkatkan kekompakan dan kreativitas.',
            'gambar' => null,
        ]);

        Ekstrakulikuler::create([
            'nama_eskul' => 'Paskibra',
            'slug' => Str::slug('Paskibra'),
            'pembina' => 'Bapak Yana',
            'jadwal_latihan' => 'Senin, 15:30 - 17:00',
            'deskripsi' => 'Kegiatan olahraga futsal untuk mengembangkan kemampuan, kerja sama tim, kedisiplinan, dan sportivitas siswa.',
            'gambar' => null,
        ]);

        Ekstrakulikuler::create([
            'nama_eskul' => 'Voly',
            'slug' => Str::slug('Voly'),
            'pembina' => 'Bapak Jokowi',
            'jadwal_latihan' => 'Jumat, 13:30 - 15:30',
            'deskripsi' => 'Kegiatan Pramuka yang bertujuan membentuk karakter siswa agar mandiri, disiplin, bertanggung jawab, dan memiliki jiwa kepemimpinan.',
            'gambar' => null,
        ]);

        Ekstrakulikuler::create([
            'nama_eskul' => 'Sanggar Seni',
            'slug' => Str::slug('Sanggar Seni'),
            'pembina' => 'Ibu Rina',
            'jadwal_latihan' => 'Rabu, 15:30 - 17:00',
            'deskripsi' => 'Kegiatan seni musik dan vokal untuk mengembangkan bakat siswa dalam bernyanyi serta meningkatkan kekompakan dan kreativitas.',
            'gambar' => null,
        ]);
    }
}