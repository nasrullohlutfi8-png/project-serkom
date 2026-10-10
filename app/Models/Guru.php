<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids; 


class Guru extends Model
{
    //
    use HasUuids;
    
    protected $table = 'gurus'; // Sesuaikan jika nama tabel beda

    protected $fillable = [
        'nama_guru',
        'slug',
        'nip',
        'mapel',
        'jabatan',
        'foto'
    ];   
    protected $keyType = 'string';

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($guru) {
            $guru->id = (string) Str::uuid();
        });
    }
}
