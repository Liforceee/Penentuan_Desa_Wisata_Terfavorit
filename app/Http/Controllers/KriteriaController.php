<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Desa;

class KriteriaController extends Controller
{
    public function index()
    {
        $desaWisata = Desa::with('kriteria')->get();
        return view('admin.kriteria.index', compact('desaWisata'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $desas = Desa::with('kriteria')->where('id', $id)->first();
        return view('admin.kriteria.create', compact('desas', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kebersihan' => 'required|integer|min:1|max:5',
            'keamanan' => 'required|integer|min:1|max:5',
            'akses_jalan' => 'required|integer|min:1|max:5',
            'jarak_tempuh' => 'required|integer|min:1|max:5',
            'fasilitas' => 'required|integer|min:1|max:5',
            'biaya_tiket' => 'required|integer|min:1|max:5',
        ]);


        // Data yang akan disimpan
        $data = $request->only([
            'kebersihan',
            'keamanan',
            'akses_jalan',
            'jarak_tempuh',
            'fasilitas',
            'biaya_tiket',
        ]);

        // Menambahkan id_desa ke data
        $data['id_desa'] = $id;

        // Menggunakan updateOrCreate untuk menyimpan atau memperbarui kriteria
        Kriteria::updateOrCreate(
            ['id_desa' => $id], // Kondisi pencarian
            $data // Data yang akan disimpan atau diperbarui
        );
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function destroy(Kriteria $kriteria)
    {
        //
    }
}
