<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alats = Alat::all();
        return view('alat.index', compact('alats'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'tahun'     => 'required|numeric',
            'merek'     => 'required',
            'lokasi'    => 'required',
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil ditambahkan!');
    }

    public function show(Alat $alat)
    {
        return view('alat.show', compact('alat'));
    }

    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama_alat' => 'required',
            'tahun'     => 'required|numeric',
            'merek'     => 'required',
            'lokasi'    => 'required',
        ]);

        $alat->update($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil diperbarui!');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil dihapus!');
    }
}