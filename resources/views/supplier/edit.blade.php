@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Supplier</h1>

    <a href="{{ route('supplier.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Supplier
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Supplier</label>
                <input
                    type="text"
                    name="nama_supplier"
                    class="form-control @error('nama_supplier') is-invalid @enderror"
                    value="{{ old('nama_supplier', $supplier->nama_supplier) }}">

                @error('nama_supplier')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea
                    name="alamat"
                    class="form-control @error('alamat') is-invalid @enderror"
                    rows="3">{{ old('alamat', $supplier->alamat) }}</textarea>

                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input
                    type="text"
                    name="no_hp"
                    class="form-control @error('no_hp') is-invalid @enderror"
                    value="{{ old('no_hp', $supplier->no_hp) }}">

                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Update
            </button>

            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
