<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $user = DB::table('users')->first();

        DB::table('pengumumen')->insert([
            [
                'judul' => 'Pendaftaran Peserta Didik Baru',
                'slug' => Str::slug('Pendaftaran Peserta Didik Baru'),
                'isi' => 'Pendaftaran Peserta Didik Baru SMAN 1 Padakembang telah dibuka. Silakan melakukan pendaftaran sesuai dengan jadwal dan ketentuan yang telah ditentukan oleh sekolah.',
                'tanggal' => '2026-06-01',
                'status' => 'Publish',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pelaksanaan Ujian Sekolah',
                'slug' => Str::slug('Pelaksanaan Ujian Sekolah'),
                'isi' => 'Ujian sekolah akan dilaksanakan sesuai dengan jadwal yang telah ditetapkan. Seluruh siswa diharapkan mempersiapkan diri dengan baik dan mengikuti ujian dengan tertib.',
                'tanggal' => '2026-06-10',
                'status' => 'Publish',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Libur Semester',
                'slug' => Str::slug('Libur Semester'),
                'isi' => 'Sekolah akan melaksanakan libur semester sesuai dengan kalender pendidikan. Siswa diharapkan kembali ke sekolah sesuai dengan tanggal yang telah ditentukan.',
                'tanggal' => '2026-06-20',
                'status' => 'Publish',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Rapat Orang Tua dan Wali Siswa',
                'slug' => Str::slug('Rapat Orang Tua dan Wali Siswa'),
                'isi' => 'Sekolah mengundang orang tua dan wali siswa untuk menghadiri kegiatan rapat yang akan dilaksanakan di lingkungan SMAN 1 Padakembang.',
                'tanggal' => '2026-07-05',
                'status' => 'Publish',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Informasi Kegiatan Sekolah',
                'slug' => Str::slug('Informasi Kegiatan Sekolah'),
                'isi' => 'Informasi mengenai kegiatan sekolah akan disampaikan melalui website resmi sekolah. Siswa diharapkan selalu mengikuti informasi terbaru dari pihak sekolah.',
                'tanggal' => '2026-07-10',
                'status' => 'Draft',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}