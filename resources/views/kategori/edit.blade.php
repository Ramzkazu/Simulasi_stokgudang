@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Kategori</h1>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow">

    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Kategori
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>

                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    class="form-control @error('nama_kategori') is-invalid @enderror"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    placeholder="Masukkan nama kategori">

                @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Update
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

@endsection
