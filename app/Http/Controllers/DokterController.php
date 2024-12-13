<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    // Menampilkan daftar dokter (Read)
    public function index()
    {
        $dokters = Dokter::with('poli')->get();
        return view('dokters.index', compact('dokters'));
    }

    // Menampilkan form tambah dokter (Create)
    public function create()
    {
        $polis = Poli::all(); // Ambil data poli untuk dropdown
        return view('dokters.create', compact('polis'));
    }

    // Menyimpan data dokter baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'nullable|string|max:250',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required|exists:poli,id',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokters.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    // Menampilkan form edit dokter (Update)
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $polis = Poli::all(); // Ambil data poli untuk dropdown
        return view('dokters.edit', compact('dokter', 'polis'));
    }

    // Menyimpan perubahan data dokter
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'alamat' => 'nullable|string|max:250',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required|exists:poli,id',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokters.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    // Menghapus data dokter (Delete)
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokters.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}
