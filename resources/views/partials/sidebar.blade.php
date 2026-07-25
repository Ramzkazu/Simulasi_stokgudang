<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-2">
            Bina Guna
        </div>
    </a>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-list"></i>
            <span>Kategori</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('supplier.index') }}">
            <i class="fas fa-truck"></i>
            <span>Supplier</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-boxes"></i>
            <span>Barang</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang-masuk.index') }}">
            <i class="fas fa-arrow-circle-down"></i>
            <span>Barang Masuk</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang-keluar.index') }}">
            <i class="fas fa-arrow-circle-up"></i>
            <span>Barang Keluar</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

</ul>
