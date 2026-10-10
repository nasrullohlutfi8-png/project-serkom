<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    // Menyesuaikan nama tabel
    protected $table = 'pengumumen';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tanggal',
        'status',
        'user_id',
    ];

    // Relasi ke Model User (Pembuat pengumuman)
    public function user()
    {
        return $table = $this->belongsTo(User::class, 'user_id');
    }
}