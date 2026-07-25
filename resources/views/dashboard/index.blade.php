@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Welcome -->
    <div class="alert alert-primary shadow-sm">
        <h5 class="mb-1">
            Selamat Datang 👋
        </h5>
        <p class="mb-0">
            Selamat datang di <strong>Sistem Informasi Stok Gudang Toko Bangunan Bina Guna</strong>.
        </p>
    </div>

    <!-- Card Statistik -->
    <div class="row">

        <!-- Total Barang -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Barang
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalBarang }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Kategori
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalKategori }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Total Supplier -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Supplier
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalSupplier }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Total Barang Masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Barang Masuk
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalBarangMasuk }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Total Barang Keluar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Barang Keluar
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalBarangKeluar }}
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Tabel Stok Menipis -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">
                Barang Dengan Stok Menipis (≤ 10)
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th width="120">Stok</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($stokMenipis as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>

                            <td>
                                <span class="badge badge-danger">
                                    {{ $item->stok }}
                                </span>
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center">
                                Tidak ada barang dengan stok menipis.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
