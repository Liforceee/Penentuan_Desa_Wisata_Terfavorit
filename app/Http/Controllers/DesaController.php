<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaWisata = Desa::all();
        return view('admin.desawisata.index', compact('desaWisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.desawisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validasi input
            $request->validate([
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle upload gambar
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('desa_wisata', 'public');
            } else {
                $gambarPath = null;
            }

            // Simpan ke database
            Desa::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath,
            ]);

            return redirect()->route('desa_wisata.index')->with('success', 'Desa Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $desaWisata = Desa::findOrFail($id);
        return view('admin.desawisata.edit', compact('desaWisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|nullable|max:1999',
        ]);

        $desa = Desa::findOrFail($id);

        // Jika ada gambar baru, simpan gambar baru dan hapus gambar lama
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($desa->gambar) {
                Storage::delete('public/' . $desa->gambar);
            }
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $desa->gambar = $gambarPath;
        }

        $desa->nama = $request->nama;
        $desa->deskripsi = $request->deskripsi;
        $desa->save();

        return redirect()->route('desa_wisata.index')->with('success', 'Desa Wisata berhasil diperbarui.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $desa = Desa::findOrFail($id);

        // Hapus gambar jika ada
        if ($desa->gambar) {
            Storage::delete('public/' . $desa->gambar);
        }

        $desa->delete();

        return redirect()->route('desa_wisata.index')->with('success', 'Desa Wisata berhasil dihapus.');
    }

    public function indexUser()
    {
        $desaWisata = Desa::all();
        return view('user.desawisata', compact('desaWisata'));
    }

    public function indexHome()
    {
        $desaWisata = Desa::all();
        return view('user.home', compact('desaWisata'));
    }
    public function indexadmin()
    {
          // 1. Ambil Data Desa Wisata dengan Kriteria
$desaWisata = Desa::with('kriteria')->get();

// 2. Masukkan Data Input Pengguna ke dalam Format yang Sama
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

// 4. Normalisasi Data dengan Rumus U(X) = (a - b) / (ai+ - xi-)
$maxValues = [];
$minValues = [];
foreach ($dataAwal[0] as $key => $value) {
    if ($key !== 'desa') {
        $maxValues[$key] = max(array_column($dataAwal, $key));
        $minValues[$key] = min(array_column($dataAwal, $key));
    }
}

$normalisasi = [];
foreach ($dataAwal as $desa) {
    foreach ($bobot as $kriteria => $nilai) {
        $a = $maxValues[$kriteria] ?? 1;
        $b = $minValues[$kriteria] ?? 1;
        $xi = $desa[$kriteria];
        $normalisasi[$desa['desa']][$kriteria] = ($a - $b) ? ($xi - $b) / ($a - $b) : 0;
    }
}

// 5. Hitung Nilai Akhir U(X) = Σ (wj * Xij)
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

// 6. Urutkan Berdasarkan Nilai Tertinggi
usort($hasilMaut, function ($a, $b) {
    return $b['nilai'] <=> $a['nilai'];
});

// 7. Return Data ke View
return view('admin.perhitungan.index', [
    'data_awal' => $dataAwal,
    'normalisasi' => $normalisasi,
    'hasil_maut' => $hasilMaut
]);

    }

}

