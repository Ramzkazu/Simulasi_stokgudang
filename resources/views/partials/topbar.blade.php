<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Mobile) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Judul -->
    <h5 class="mb-0 font-weight-bold text-gray-800">
        Sistem Informasi Stok Gudang Toko Bangunan Bina Guna
    </h5>

    <!-- Menu Kanan -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item d-flex align-items-center">

            <span class="mr-3 text-gray-700">
                <i class="fas fa-user-circle"></i>
                {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="mb-0">
                @csrf

                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>

        </li>

    </ul>

</nav>
