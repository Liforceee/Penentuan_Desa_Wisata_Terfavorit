<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



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

}

