<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $barang = Barang::with('kategori')
                    ->orderBy('kode_barang')
                    ->get();

    return view('barang.index', compact('barang'));
}

    /**
     * Menampilkan form tambah barang.
     */
    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('barang.create', compact('kategori'));
    }

    /**
     * Menyimpan barang baru.
     */
        public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|max:20|unique:barang,kode_barang',
            'nama_barang' => 'required|max:100',
            'kategori_id' => 'required|exists:kategori,id',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|max:20',
        ]);

        Barang::create($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
 * Menampilkan form edit barang.
 */
    public function edit(Barang $barang)
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('barang.edit', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
{
    $validated = $request->validate([
        'kode_barang' => 'required|max:20|unique:barang,kode_barang,' . $barang->id,
        'nama_barang' => 'required|max:100',
        'kategori_id' => 'required|exists:kategori,id',
        'harga_beli'  => 'required|numeric|min:0',
        'harga_jual'  => 'required|numeric|min:0',
        'stok'        => 'required|integer|min:0',
        'satuan'      => 'required|max:20',
    ]);

    $barang->update($validated);

    return redirect()
        ->route('barang.index')
        ->with('success', 'Barang berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    /**
 * Menghapus barang.
 */
public function destroy(Barang $barang)
{
    $barang->delete();

    return redirect()
        ->route('barang.index')
        ->with('success', 'Barang berhasil dihapus.');
}
}
