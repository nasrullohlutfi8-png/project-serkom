<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    //
    protected $table = 'prestasis'; // Sesuaikan jika nama tabel database-mu berbeda

    protected $fillable = [
        'nama_prestasi',
        'slug',
        'tahun_ajaran',
        'deskripsi',
        'foto',
    ];
}
