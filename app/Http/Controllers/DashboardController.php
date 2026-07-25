<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index()
{
    $totalBarang = Barang::count();

    $totalKategori = Kategori::count();

    $totalSupplier = Supplier::count();

    $totalBarangMasuk = BarangMasuk::count();

    $totalBarangKeluar = BarangKeluar::count();

    $stokMenipis = Barang::where('stok', '<=', 10)
                        ->orderBy('stok')
                        ->get();

    return view('dashboard.index', compact(
    'totalBarang',
    'totalKategori',
    'totalSupplier',
    'totalBarangMasuk',
    'totalBarangKeluar',
    'stokMenipis'
    ));
}
}
