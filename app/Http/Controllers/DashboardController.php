<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kriteria;
use App\Models\Maut;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $jumlahDesaWisata = Desa::count();
        $jumlahUser = User::count();

        // 1. Ambil Data Desa Wisata dengan Kriteria
        $desaWisata = Desa::with('kriteria')->get();

        // 2. Ambil Data Kriteria
        $dataAwal = [];
        foreach ($desaWisata as $desa) {
            $dataAwal[] = [
                'desa'         => $desa->nama,
                'kebersihan'   => optional($desa->kriteria)->kebersihan ?? 0,
                'keamanan'     => optional($desa->kriteria)->keamanan ?? 0,
                'akses_jalan'  => optional($desa->kriteria)->akses_jalan ?? 0,
                'jarak_tempuh' => optional($desa->kriteria)->jarak_tempuh ?? 0,
                'fasilitas'    => optional($desa->kriteria)->fasilitas ?? 0,
                'biaya_tiket'  => optional($desa->kriteria)->biaya_tiket ?? 0,
            ];
        }

        if (empty($dataAwal)) {
            return view('admin.dashboard.index', compact('jumlahDesaWisata', 'jumlahUser'))->with('wisataTerfavorit', null);
        }

        // 3. Definisi Bobot Kriteria
        $bobot = [
            'kebersihan'    => 5,
            'keamanan'      => 3,
            'akses_jalan'   => 5,
            'jarak_tempuh'  => 3,
            'fasilitas'     => 5,
            'biaya_tiket'   => 4
        ];

        // 4. Hitung Nilai Maksimum dan Minimum untuk Normalisasi
        $maxValues = [];
        $minValues = [];
        foreach ($dataAwal[0] as $key => $value) {
            if ($key !== 'desa') {
                $maxValues[$key] = max(array_column($dataAwal, $key));
                $minValues[$key] = min(array_column($dataAwal, $key));
            }
        }

        // 5. Normalisasi Data
        $normalisasi = [];
        foreach ($dataAwal as $desa) {
            foreach ($bobot as $kriteria => $nilai) {
                $a = $maxValues[$kriteria] ?? 1;
                $b = $minValues[$kriteria] ?? 1;
                $xi = $desa[$kriteria];
                $normalisasi[$desa['desa']][$kriteria] = ($a - $b) ? ($xi - $b) / ($a - $b) : 0;
            }
        }

        // 6. Hitung Nilai Akhir MAUT
        $hasilMaut = [];
        foreach ($dataAwal as $desa) {
            $nilaiMaut = 0;
            foreach ($bobot as $kriteria => $nilai) {
                $nilaiMaut += $bobot[$kriteria] * ($normalisasi[$desa['desa']][$kriteria] ?? 0);
            }
            $hasilMaut[] = [
                'desa' => $desa['desa'],
                'nilai' => round($nilaiMaut, 2)
            ];
        }

        // 7. Urutkan Berdasarkan Nilai Tertinggi
        usort($hasilMaut, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // 8. Ambil Desa Wisata dengan Nilai Tertinggi
        $wisataTerfavorit = !empty($hasilMaut) ? $hasilMaut[0]['desa'] : 'Tidak ada';

        return view('admin.dashboard.index', compact('jumlahDesaWisata', 'jumlahUser', 'wisataTerfavorit'));
    }

}
