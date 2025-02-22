<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'kebersihan', 'keamanan', 'akses_jalan', 'jarak_tempuh', 'fasilitas', 'biaya_tiket'];
}
