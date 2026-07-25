@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Supplier</h1>

    <a href="{{ route('supplier.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah Supplier
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('supplier.store') }}" method="POST">

            @csrf

            <div class="form-group">
    <label>Nama Supplier</label>

    <input
        type="text"
        name="nama_supplier"
        class="form-control @error('nama_supplier') is-invalid @enderror"
        value="{{ old('nama_supplier') }}"
        placeholder="Masukkan nama supplier">

    @error('nama_supplier')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="3"
                          placeholder="Masukkan alamat supplier"></textarea>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    placeholder="Masukkan nomor HP supplier">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>

            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
