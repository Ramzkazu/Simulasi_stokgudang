@extends('layouts.app')

@section('title', 'Barang Masuk')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang Masuk</h1>

    <a href="{{ route('barang-masuk.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        Tambah Barang Masuk
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>

</div>
@endif

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Barang Masuk
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Supplier</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($barangMasuk as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->supplier->nama_supplier }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->jumlah }}</td>

                        <td>
                            <a href="{{ route('barang-masuk.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                    Edit
                            </a>

                            <form action="{{ route('barang-masuk.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
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
                        <td colspan="6" class="text-center">
                            Belum ada transaksi barang masuk.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
