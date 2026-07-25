<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
 * Menampilkan daftar supplier.
 */
public function index()
{
    $supplier = Supplier::orderBy('id')->get();

    return view('supplier.index', compact('supplier'));
}

    /**
     * Menampilkan form tambah supplier.
     */
    /**
 * Menampilkan form tambah supplier.
 */
public function create()
{
    return view('supplier.create');
}

    /**
     * Menyimpan supplier baru.
     */
    /**
 * Menyimpan supplier baru.
 */
/**
 * Menyimpan supplier baru.
 */
public function store(Request $request)
{
    $validated = $request->validate([
        'nama_supplier' => 'required|max:100',
        'alamat'        => 'required',
        'no_hp'         => 'required|max:20',
    ]);

    Supplier::create($validated);

    return redirect()
        ->route('supplier.index')
        ->with('success', 'Supplier berhasil ditambahkan.');
}
    /**
     * Menampilkan detail supplier.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Menampilkan form edit supplier.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Mengupdate supplier.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Menghapus supplier.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
