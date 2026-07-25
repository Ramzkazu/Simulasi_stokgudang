<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::with('barang')
            ->orderByDesc('tanggal')
            ->get();

        return view('barang_keluar.index', compact('barangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $barang = Barang::orderBy('nama_barang')->get();

    return view('barang_keluar.create', compact('barang'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {

            $barang = Barang::findOrFail($validated['barang_id']);

            if ($barang->stok < $validated['jumlah']) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'jumlah' => 'Stok barang tidak mencukupi.'
                ]);
            }

            BarangKeluar::create($validated);

            $barang->decrement('stok', $validated['jumlah']);
        });

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil disimpan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
{
    DB::transaction(function () use ($barangKeluar) {

        $barang = Barang::findOrFail($barangKeluar->barang_id);

        $barang->increment('stok', $barangKeluar->jumlah);

        $barangKeluar->delete();
    });

    return redirect()
        ->route('barang-keluar.index')
        ->with('success', 'Barang keluar berhasil dihapus.');
}
}
