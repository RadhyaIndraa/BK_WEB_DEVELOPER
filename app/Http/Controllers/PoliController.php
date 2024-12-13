<?php

namespace App\Http\Controllers;

use App\Models\poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    // Menampilkan daftar poli (Read)
    public function index()
    {
        $polis = Poli::all();
        return view('polis.index', compact('polis'));
    }

    // Menampilkan halaman form untuk tambah Poli
    public function create()
    {
        return view('polis.create');
    }

    // Menyimpan data Poli
    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:25',
            'keterangan' => 'nullable|string',
        ]);

        Poli::create($request->all());

        return redirect()->route('polis.index')->with('success', 'Poli berhasil ditambahkan');
    }

   // Menampilkan form untuk edit Poli
   public function edit($id)
   {
       $polis = Poli::findOrFail($id);
       return view('polis.edit', compact('polis'));
   }

    // Memperbarui data Poli
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:25',
            'keterangan' => 'nullable|string',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update($request->all());

        return redirect()->route('polis.index')->with('success', 'Poli berhasil diperbarui');
    }

    // Menghapus data Poli
    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect()->route('polis.index')->with('success', 'Poli berhasil dihapus');
    }
}
