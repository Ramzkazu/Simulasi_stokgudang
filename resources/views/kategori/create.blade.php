@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah Kategori
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('kategori.store') }}" method="POST">

            @csrf

            <<div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>

                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    class="form-control @error('nama_kategori') is-invalid @enderror"
                    placeholder="Masukkan nama kategori"
                    value="{{ old('nama_kategori') }}">

                @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
