@extends('layouts.app')

@section('title', 'Barang Keluar')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang Keluar</h1>

    <a href="{{ route('barang-keluar.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        Tambah Barang Keluar
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}

    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Barang Keluar
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($barangKeluar as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>

                        <td>

                            <a href="{{ route('barang-keluar.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>
                                Edit
                            </a>

                            <form action="{{ route('barang-keluar.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus transaksi ini?')">

                                    <i class="fas fa-trash"></i>
                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada transaksi barang keluar.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
