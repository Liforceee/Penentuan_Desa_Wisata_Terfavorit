<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class MautController extends Controller
    {
        public function index()
    {
        // 1. Ambil Data Desa dengan Kriteria
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

        // 5. Normalisasi Data Menggunakan Rumus U(X) = (a - b) / (ai+ - xi-)
        $normalisasi = [];
        foreach ($dataAwal as $desa) {
            foreach ($bobot as $kriteria => $nilai) {
                $a = $maxValues[$kriteria] ?? 1;
                $b = $minValues[$kriteria] ?? 1;
                $xi = $desa[$kriteria];
                $normalisasi[$desa['desa']][$kriteria] = ($a - $b) ? ($xi - $b) / ($a - $b) : 0;
            }
        }

        // 6. Hitung Nilai Akhir U(X) = Σ (wj * Xij)
        $hasilMaut = [];
        foreach ($dataAwal as $desa) {
            $nilaiMaut = 0;
            foreach ($bobot as $kriteria => $nilai) {
                $nilaiMaut += $bobot[$kriteria] * ($normalisasi[$desa['desa']][$kriteria] ?? 0);
            }
            $hasilMaut[] = [
                'desa' => $desa['desa'],
                'nilai' => round($nilaiMaut, 2) // Pembulatan hasil
            ];
        }

        // 7. Urutkan Berdasarkan Nilai Tertinggi
        usort($hasilMaut, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // 8. Return Data ke View
        return view('user.perhitungan', [
            'data_awal' => $dataAwal,
            'normalisasi' => $normalisasi,
            'hasil_maut' => $hasilMaut,
        ]);

    }

    public function hitung(Request $request)
    {
        // 1. Ambil Data Desa Wisata dengan Kriteria
        $desaWisata = Desa::with('kriteria')->get();

        // 2. Validasi Input Pengguna
        $data = $request->validate([
            'nama' => 'required',
            'kebersihan' => 'required|integer|min:1|max:5',
            'keamanan' => 'required|integer|min:1|max:5',
            'akses_jalan' => 'required|integer|min:1|max:5',
            'jarak_tempuh' => 'required|integer|min:1|max:5',
            'fasilitas' => 'required|integer|min:1|max:5',
            'biaya_tiket' => 'required|integer|min:1|max:5',
        ]);


        // 3. Ambil Data Kriteria
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

        // Tambahkan Input Pengguna ke dalam List Desa Wisata
        $dataAwal[] = [
            'desa'         => $data['nama'],
            'kebersihan'   => $data['kebersihan'],
            'keamanan'     => $data['keamanan'],
            'akses_jalan'  => $data['akses_jalan'],
            'jarak_tempuh' => $data['jarak_tempuh'],
            'fasilitas'    => $data['fasilitas'],
            'biaya_tiket'  => $data['biaya_tiket'],
        ];

        // 4. Definisi Bobot Kriteria


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

        // 5. Normalisasi Data Menggunakan Rumus U(X) = (a - b) / (ai+ - xi-)
        $normalisasi = [];
        foreach ($dataAwal as $desa) {
            foreach ($bobot as $kriteria => $nilai) {
                $a = $maxValues[$kriteria] ?? 1;
                $b = $minValues[$kriteria] ?? 1;
                $xi = $desa[$kriteria];
                $normalisasi[$desa['desa']][$kriteria] = ($a - $b) ? ($xi - $b) / ($a - $b) : 0;
            }
        }

        // 6. Hitung Nilai Akhir U(X) = Σ (wj * Xij)
        $hasilMaut = [];
        foreach ($dataAwal as $desa) {
            $nilaiMaut = 0;
            foreach ($bobot as $kriteria => $nilai) {
                $nilaiMaut += $bobot[$kriteria] * ($normalisasi[$desa['desa']][$kriteria] ?? 0);
            }
            $hasilMaut[] = [
                'desa' => $desa['desa'],
                'nilai' => round($nilaiMaut, 2) // Pembulatan hasil
            ];
        }

        // 7. Urutkan Berdasarkan Nilai Tertinggi
        usort($hasilMaut, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // 8. Return Data ke View
        return view('user.perhitungan', [
            'data_awal' => $dataAwal,
            'normalisasi' => $normalisasi,
            'hasil_maut' => $hasilMaut,
        ]);
    }
}
