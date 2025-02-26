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

        // 3. Hitung Nilai MAUT seperti di `indexadmin`
        $bobot = [
            'kebersihan'    => 5,
            'keamanan'      => 3,
            'akses_jalan'   => 5,
            'jarak_tempuh'  => 3, // cost
            'fasilitas'     => 5,
            'biaya_tiket'   => 4  // cost
        ];

        $benefit = ['kebersihan', 'keamanan', 'akses_jalan', 'fasilitas'];
        $cost = ['jarak_tempuh', 'biaya_tiket'];

        // 4. Normalisasi Data
        $normalisasi = [];
        foreach ($bobot as $kriteria => $nilai) {
            $dataKriteria = array_column($dataAwal, $kriteria);

            if (in_array($kriteria, $benefit)) {
                $maxValue = max($dataKriteria);
                foreach ($desaWisata as $desa) {
                    $normalisasi[$desa->nama][$kriteria] = $maxValue ? optional($desa->kriteria)->$kriteria / $maxValue : 0;
                }
            } elseif (in_array($kriteria, $cost)) {
                $minValue = min($dataKriteria);
                foreach ($desaWisata as $desa) {
                    $normalisasi[$desa->nama][$kriteria] = $minValue ? $minValue / optional($desa->kriteria)->$kriteria : 0;
                }
            }
        }

        // 5. Hitung Nilai MAUT
        $hasilMaut = [];
        foreach ($desaWisata as $desa) {
            $nilaiMaut = 0;
            foreach ($bobot as $kriteria => $nilai) {
                $nilaiMaut += $bobot[$kriteria] * ($normalisasi[$desa->nama][$kriteria] ?? 0);
            }
            $hasilMaut[] = [
                'desa' => $desa->nama,
                'nilai' => $nilaiMaut
            ];
        }

        // 6. Urutkan Berdasarkan Nilai Tertinggi
        usort($hasilMaut, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // 7. Return Data ke View
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

        // 3. Masukkan Data Input Pengguna ke dalam Format yang Sama
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
        $bobot = [
            'kebersihan'    => 5,
            'keamanan'      => 3,
            'akses_jalan'   => 5,
            'jarak_tempuh'  => 3, // cost
            'fasilitas'     => 5,
            'biaya_tiket'   => 4  // cost
        ];

        // Tentukan Kriteria Benefit dan Cost
        $benefit = ['kebersihan', 'keamanan', 'akses_jalan', 'fasilitas'];
        $cost = ['jarak_tempuh', 'biaya_tiket'];

        // 5. Normalisasi Data
        $normalisasi = [];
        foreach ($bobot as $kriteria => $nilai) {
            $dataKriteria = array_column($dataAwal, $kriteria);

            if (in_array($kriteria, $benefit)) {
                $maxValue = max($dataKriteria);
                foreach ($dataAwal as $desa) {
                    $normalisasi[$desa['desa']][$kriteria] = $maxValue ? $desa[$kriteria] / $maxValue : 0;
                }
            } elseif (in_array($kriteria, $cost)) {
                $minValue = min($dataKriteria);
                foreach ($dataAwal as $desa) {
                    $normalisasi[$desa['desa']][$kriteria] = $minValue ? $minValue / $desa[$kriteria] : 0;
                }
            }
        }

        // 6. Hitung Nilai MAUT
        $hasilMaut = [];
        foreach ($dataAwal as $desa) {
            $nilaiMaut = 0;
            foreach ($bobot as $kriteria => $nilai) {
                $nilaiMaut += $bobot[$kriteria] * ($normalisasi[$desa['desa']][$kriteria] ?? 0);
            }
            $hasilMaut[] = [
                'desa' => $desa['desa'],
                'nilai' => $nilaiMaut
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
