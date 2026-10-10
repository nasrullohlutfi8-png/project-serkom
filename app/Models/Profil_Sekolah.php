<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil_Sekolah extends Model
{
    //
    protected $table = 'profil_sekolahs';

    protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'kontak',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
