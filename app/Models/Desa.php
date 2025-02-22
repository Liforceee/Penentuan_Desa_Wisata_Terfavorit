<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'gambar'];

    public function kriteria()
    {
        return $this->hasOne(Kriteria::class, 'id_desa', 'id');
    }
}
