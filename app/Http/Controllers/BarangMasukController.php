<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $barangMasuk = BarangMasuk::with(['barang', 'supplier'])
        ->orderByDesc('tanggal')
        ->get();

    return view('barang_masuk.index', compact('barangMasuk'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $barang = Barang::orderBy('nama_barang')->get();
    $supplier = Supplier::orderBy('nama_supplier')->get();

    return view('barang_masuk.create', compact('barang', 'supplier'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'tanggal'     => 'required|date',
        'barang_id'   => 'required|exists:barang,id',
        'supplier_id' => 'required|exists:supplier,id',
        'jumlah'      => 'required|integer|min:1',
        'harga_beli'  => 'required|numeric|min:0',
    ]);

    DB::transaction(function () use ($validated) {

        $validated['total'] =
            $validated['jumlah'] * $validated['harga_beli'];

        BarangMasuk::create($validated);

        $barang = Barang::findOrFail($validated['barang_id']);

        $barang->update([
            'stok' => $barang->stok + $validated['jumlah'],
            'harga_beli' => $validated['harga_beli'],
        ]);
    });

    return redirect()
        ->route('barang-masuk.index')
        ->with('success', 'Barang masuk berhasil disimpan.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
{
    $barang = Barang::orderBy('nama_barang')->get();
    $supplier = Supplier::orderBy('nama_supplier')->get();

    return view(
        'barang_masuk.edit',
        compact('barangMasuk', 'barang', 'supplier')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
{
    $validated = $request->validate([
        'tanggal'     => 'required|date',
        'barang_id'   => 'required|exists:barang,id',
        'supplier_id' => 'required|exists:supplier,id',
        'jumlah'      => 'required|integer|min:1',
        'harga_beli'  => 'required|numeric|min:0',
    ]);

    DB::transaction(function () use ($validated, $barangMasuk) {

        // Kembalikan stok lama
        $barangLama = Barang::findOrFail($barangMasuk->barang_id);
        $barangLama->decrement('stok', $barangMasuk->jumlah);

        // Hitung total baru
        $validated['total'] =
            $validated['jumlah'] * $validated['harga_beli'];

        // Update transaksi
        $barangMasuk->update($validated);

        // Tambah stok baru
        $barangBaru = Barang::findOrFail($validated['barang_id']);
        $barangBaru->increment('stok', $validated['jumlah']);

        // Update harga beli terakhir
        $barangBaru->update([
            'harga_beli' => $validated['harga_beli']
        ]);
    });

    return redirect()
        ->route('barang-masuk.index')
        ->with('success', 'Barang masuk berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
{
    DB::transaction(function () use ($barangMasuk) {

        $barang = Barang::findOrFail($barangMasuk->barang_id);

        $barang->decrement('stok', $barangMasuk->jumlah);

        $barangMasuk->delete();
    });

    return redirect()
        ->route('barang-masuk.index')
        ->with('success', 'Barang masuk berhasil dihapus.');
}
}
