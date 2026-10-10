<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    // 
    protected $fillable = [
        'nama_eskul',
        'slug',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
