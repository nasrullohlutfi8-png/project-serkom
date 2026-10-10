<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids; 


class Siswa extends Model
{
    //
    use HasUuids;
    protected $table = 'siswas'; // Sesuaikan jika nama tabel database-mu berbeda

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tahun_masuk',
    ];
    
    protected $keyType = 'string';

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($siswa) {
            $siswa->id = (string) Str::uuid();
        });
    }

}
