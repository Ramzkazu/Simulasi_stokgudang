@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Barang</h1>

    <a href="{{ route('barang.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Barang
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('barang.update', $barang->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Kode Barang</label>
                <input
                    type="text"
                    name="kode_barang"
                    class="form-control"
                    value="{{ old('kode_barang', $barang->kode_barang) }}">
            </div>

            <div class="form-group">
                <label>Nama Barang</label>
                <input
                    type="text"
                    name="nama_barang"
                    class="form-control"
                    value="{{ old('nama_barang', $barang->nama_barang) }}">
            </div>

            <div class="form-group">
                <label>Kategori</label>

                <select name="kategori_id" class="form-control">

                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ old('kategori_id', $barang->kategori_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input
                    type="number"
                    name="harga_beli"
                    class="form-control"
                    step="0.01"
                    value="{{ old('harga_beli', $barang->harga_beli) }}">
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input
                    type="number"
                    name="harga_jual"
                    class="form-control"
                    step="0.01"
                    value="{{ old('harga_jual', $barang->harga_jual) }}">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input
                    type="number"
                    name="stok"
                    class="form-control"
                    value="{{ old('stok', $barang->stok) }}">
            </div>

            <div class="form-group">
                <label>Satuan</label>

                <select name="satuan" class="form-control">

                    @php
                        $satuanList = ['Sak', 'Zak', 'Batang', 'Lembar', 'Buah', 'Kaleng', 'Pcs', 'Roll', 'Meter'];
                    @endphp

                    @foreach($satuanList as $satuan)
                        <option value="{{ $satuan }}"
                            {{ old('satuan', $barang->satuan) == $satuan ? 'selected' : '' }}>
                            {{ $satuan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Update
            </button>

            <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
