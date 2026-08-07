<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('uploads/barang'),
                $namaFile
            );

            $validated['foto'] = $namaFile;
        }

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
        'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('foto')) {

        // Hapus foto lama jika ada
        if ($barang->foto) {
            $fotoLama = public_path('uploads/barang/' . $barang->foto);

            if (File::exists($fotoLama)) {
                File::delete($fotoLama);
            }
        }

        // Simpan foto baru
        $file = $request->file('foto');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $file->move(
            public_path('uploads/barang'),
            $namaFile
        );

        $validated['foto'] = $namaFile;
    }

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
    // Hapus foto barang jika ada
    if ($barang->foto) {
        $fotoPath = public_path('uploads/barang/' . $barang->foto);

        if (File::exists($fotoPath)) {
            File::delete($fotoPath);
        }
    }

    // Hapus data barang
    $barang->delete();

    return redirect()
        ->route('barang.index')
        ->with('success', 'Barang berhasil dihapus.');
}
}
