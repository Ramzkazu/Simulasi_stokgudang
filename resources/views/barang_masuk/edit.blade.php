@extends('layouts.app')

@section('title','Edit Barang Masuk')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Barang Masuk</h1>

    <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Barang Masuk
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal', $barangMasuk->tanggal) }}">

                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Barang</label>

                <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">

                    <option value="">-- Pilih Barang --</option>

                    @foreach($barang as $item)
                        <option value="{{ $item->id }}"
                            {{ old('barang_id', $barangMasuk->barang_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->kode_barang }} - {{ $item->nama_barang }}
                        </option>
                    @endforeach

                </select>

                @error('barang_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Supplier</label>

                <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">

                    <option value="">-- Pilih Supplier --</option>

                    @foreach($supplier as $item)
                        <option value="{{ $item->id }}"
                            {{ old('supplier_id', $barangMasuk->supplier_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_supplier }}
                        </option>
                    @endforeach

                </select>

                @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Jumlah</label>

                <input
                    type="number"
                    name="jumlah"
                    class="form-control @error('jumlah') is-invalid @enderror"
                    value="{{ old('jumlah', $barangMasuk->jumlah) }}">

                @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Harga Beli</label>

                <input
                    type="number"
                    name="harga_beli"
                    class="form-control @error('harga_beli') is-invalid @enderror"
                    value="{{ old('harga_beli', $barangMasuk->harga_beli) }}"
                    step="0.01">

                @error('harga_beli')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Update
            </button>

            <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
