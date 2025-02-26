<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kriteria;
use App\Models\Maut;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total desa wisata dan total kriteria
        $totalDesaWisata = Desa::count();
        $totalKriteria = Kriteria::count();

        // // Ambil hasil perhitungan MAUT (jika sudah dihitung sebelumnya)
        // $hasilMaut = Maut::orderByDesc('nilai')->get(); // Urutkan dari yang terbesar

        // // Desa Wisata Terfavorit (nilai MAUT tertinggi)
        // $desaTerfavorit = $hasilMaut->first();

        return view('admin.dashboard.index', compact('totalDesaWisata', 'totalKriteria', 'desaTerfavorit'));
    }

}
