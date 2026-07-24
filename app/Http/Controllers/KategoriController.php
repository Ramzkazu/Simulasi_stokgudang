<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
 * Menampilkan daftar kategori.
 */
    public function index()
    {
        $kategori = Kategori::orderBy('id')->get();

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
 * Menampilkan form tambah kategori.
 */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
 * Menyimpan kategori baru.
 */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:100|unique:kategori,nama_kategori',
        ]);

        Kategori::create($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
 * Menampilkan form edit kategori.
 */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
 * Mengupdate kategori.
 */
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'max:100',
                Rule::unique('kategori', 'nama_kategori')->ignore($kategori->id),
            ],
        ]);

        $kategori->update($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
 * Menghapus kategori.
 */
    public function destroy(Kategori $kategori)
    {
        if ($kategori->barang()->exists()) {
            return redirect()
                ->route('kategori.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh data barang.');
        }

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
