<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Stok Gudang</title>

    <!-- Font Awesome -->
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
        rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-6 col-md-8">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <h3 class="text-gray-900">
                            Login
                        </h3>

                        <p class="text-muted">
                            Sistem Informasi Stok Gudang
                            <br>
                            Toko Bangunan Bina Guna
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.process') }}">

                        @csrf

                        <div class="form-group">

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                placeholder="Masukkan Email"
                                value="{{ old('email') }}"
                                required>

                        </div>

                        <div class="form-group">

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                placeholder="Masukkan Password"
                                required>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary btn-user btn-block">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- JQuery -->
<script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- JQuery Easing -->
<script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- SB Admin -->
<script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
