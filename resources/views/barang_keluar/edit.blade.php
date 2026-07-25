@extends('layouts.app')

@section('title', 'Edit Barang Keluar')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Barang Keluar</h1>

    <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Barang Keluar
        </h6>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('barang-keluar.update', $barangKeluar->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal', $barangKeluar->tanggal) }}">
            </div>

            <div class="form-group">
                <label>Barang</label>

                <select name="barang_id" class="form-control">

                    <option value="">-- Pilih Barang --</option>

                    @foreach($barang as $item)

                        <option value="{{ $item->id }}"
                            {{ old('barang_id', $barangKeluar->barang_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->kode_barang }}
                            -
                            {{ $item->nama_barang }}
                            (Stok : {{ $item->stok }})

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">
                <label>Jumlah Keluar</label>

                <input
                    type="number"
                    name="jumlah"
                    class="form-control"
                    min="1"
                    value="{{ old('jumlah', $barangKeluar->jumlah) }}">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Update
            </button>

            <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
