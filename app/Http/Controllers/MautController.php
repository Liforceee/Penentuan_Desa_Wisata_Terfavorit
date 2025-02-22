<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class MautController extends Controller
{
    public function index()
{
    $kriteria = Kriteria::all();
    return view('user.perhitungan', compact('kriteria'));
}

public function hitung(Request $request)
{
    $kriteria = Kriteria::all();
    $alternatif = Alternatif::all();

    // Normalisasi Matriks
    $normalisasi = [];
    foreach ($alternatif as $alt) {
        $normalisasi[$alt->id] = [];
        foreach ($kriteria as $krit) {
            $nilai = $alt->{$krit->nama_kriteria};
            $max = Alternatif::max($krit->nama_kriteria);
            $normalisasi[$alt->id][$krit->nama_kriteria] = $nilai / $max;
        }
    }

    // Perhitungan Utility
    $hasil = [];
    foreach ($alternatif as $alt) {
        $utility = 0;
        foreach ($kriteria as $krit) {
            $utility += $normalisasi[$alt->id][$krit->nama_kriteria] * $krit->bobot;
        }
        $hasil[] = [
            'nama' => $alt->nama,
            'nilai' => $utility
        ];
    }

    // Sorting berdasarkan nilai tertinggi
    usort($hasil, function ($a, $b) {
        return $b['nilai'] <=> $a['nilai'];
    });

    return view('user.hasil', compact('hasil'));
}
}
