<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Desa;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_desa',
        'kebersihan',
        'keamanan',
        'akses_jalan',
        'jarak_tempuh',
        'fasilitas',
        'biaya_tiket'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}


