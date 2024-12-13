<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $dokters = Pasien::all();
        return view('pasiens.index', compact('pasiens'));
    }

    // Menampilkan halaman form untuk tambah pasien
    public function create()
    {
        return view('pasiens.create');
    }

    // Menyimpan data pasien
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|integer|digits:10',
            'no_hp' => 'required|integer|digits:10',
            'no_rm' => 'nullable|string|max:10',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil ditambahkan');
    }

    // Menampilkan form untuk edit pasien
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasiens.edit', compact('pasien'));
    }

    // Memperbarui data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|integer|digits:10',
            'no_hp' => 'required|integer|digits:10',
            'no_rm' => 'nullable|string|max:10',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil diperbarui');
    }

    // Menghapus data pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil dihapus');
    }
}
