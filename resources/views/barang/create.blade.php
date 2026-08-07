@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Tambah Barang
    </h1>

    <a href="{{ route('barang.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>

</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah Barang
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Kode Barang</label>
                <input
                    type="text"
                    name="kode_barang"
                    class="form-control"
                    placeholder="Contoh: BRG001">
            </div>

            <div class="form-group">
                <label>Nama Barang</label>
                <input
                    type="text"
                    name="nama_barang"
                    class="form-control"
                    placeholder="Masukkan nama barang">
            </div>

            <div class="form-group">
                <label>Harga Beli</label>

                <input
                    type="number"
                    name="harga_beli"
                    class="form-control"
                    placeholder="Masukkan harga beli"
                    min="0"
                    step="0.01">
            </div>

            <div class="form-group">
                <label>Harga Jual</label>

                <input
                    type="number"
                    name="harga_jual"
                    class="form-control"
                    placeholder="Masukkan harga jual"
                    min="0"
                    step="0.01">
            </div>

            <div class="form-group">
                <label>Kategori</label>

                <select name="kategori_id" class="form-control">

                    <option value="">-- Pilih Kategori --</option>

                    @foreach($kategori as $item)

                        <option value="{{ $item->id }}">
                            {{ $item->nama_kategori }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">
                <label>Stok Awal</label>

                <input
                    type="number"
                    name="stok"
                    class="form-control"
                    value="0">
            </div>

            <div class="form-group">
                <label>Satuan</label>

                <select name="satuan" class="form-control">

                    <option value="">-- Pilih Satuan --</option>
                    <option value="Sak">Sak</option>
                    <option value="Zak">Zak</option>
                    <option value="Batang">Batang</option>
                    <option value="Lembar">Lembar</option>
                    <option value="Buah">Buah</option>
                    <option value="Kaleng">Kaleng</option>
                    <option value="Pcs">Pcs</option>
                    <option value="Roll">Roll</option>
                    <option value="Meter">Meter</option>

                </select>
            </div>

            <div class="form-group">
                <label>Foto Barang</label>

                <input
                    type="file"
                    name="foto"
                    class="form-control-file"
                    accept="image/*">

                <small class="form-text text-muted">
                    Format: JPG, JPEG, PNG. Maksimal 2 MB.
                </small>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>

            <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
