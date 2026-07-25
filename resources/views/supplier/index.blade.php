@extends('layouts.app')

@section('title', 'Data Supplier')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">
    <i class="fas fa-plus"></i>
    Tambah Supplier
</a>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Supplier
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($supplier as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_supplier }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>

                            <td>
                                <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>

                                <form action="{{ route('supplier.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">

                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada data supplier.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
