<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $alats = Alat::latest()->get();

        return view('alat.index', compact('alats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('alat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_alat' => 'required|string|max:100',
            'tahun' => 'required|numeric',
            'merek' => 'required|string|max:60',
            'lokasi' => 'required|string|max:50',
        ], [
            'nama_alat.required' => 'Nama alat medis wajib diisi.',
            'tahun.required' => 'Tahun pembuatan/pengadaan wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'merek.required' => 'Merek alat wajib diisi.',
            'lokasi.required' => 'Lokasi atau ruangan penempatan alat wajib diisi.',
        ]);

        Alat::create($validated);

        return redirect()->route('alat.index')->with('success', 'Data alat medis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alat $alat): View
    {
        return view('alat.show', compact('alat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alat $alat): View
    {
        return view('alat.edit', compact('alat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alat $alat): RedirectResponse
    {
        $validated = $request->validate([
            'nama_alat' => 'required|string|max:100',
            'tahun' => 'required|numeric',
            'merek' => 'required|string|max:60',
            'lokasi' => 'required|string|max:50',
        ], [
            'nama_alat.required' => 'Nama alat medis wajib diisi.',
            'tahun.required' => 'Tahun pembuatan/pengadaan wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'merek.required' => 'Merek alat wajib diisi.',
            'lokasi.required' => 'Lokasi atau ruangan penempatan alat wajib diisi.',
        ]);

        $alat->update($validated);

        return redirect()->route('alat.index')->with('success', 'Data alat medis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alat $alat): RedirectResponse
    {
        $alat->delete();

        return redirect()->route('alat.index')->with('success', 'Data alat medis berhasil dihapus!');
    }
}
