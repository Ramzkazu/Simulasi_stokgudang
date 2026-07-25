@extends('layouts.app')

@section('title','Tambah Barang Masuk')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Barang Masuk</h1>

    <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Barang Masuk
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('barang-masuk.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ date('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label>Barang</label>

                <select name="barang_id" class="form-control">

                    <option value="">-- Pilih Barang --</option>

                    @foreach($barang as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->kode_barang }} - {{ $item->nama_barang }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Supplier</label>

                <select name="supplier_id" class="form-control">

                    <option value="">-- Pilih Supplier --</option>

                    @foreach($supplier as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama_supplier }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Jumlah</label>

                <input
                    type="number"
                    name="jumlah"
                    class="form-control">
            </div>

            <div class="form-group">
                <label>Harga Beli</label>

                <input
                    type="number"
                    name="harga_beli"
                    class="form-control"
                    step="0.01">
            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection
