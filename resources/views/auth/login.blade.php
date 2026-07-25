<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Sistem Informasi Stok Gudang</title>

    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>

        body{
            font-family:'Poppins',sans-serif;
            background:linear-gradient(135deg,#0b4f8a,#2b7de9);
            height:100vh;
        }

        .login-card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 50px rgba(0,0,0,.25);
        }

        .left-side{

            background:linear-gradient(rgba(11,79,138,.92),rgba(43,125,233,.92));

            color:white;

            min-height:550px;

            display:flex;

            flex-direction:column;

            justify-content:center;

            align-items:center;

            padding:50px;

        }

        .left-side i{

            font-size:80px;

            margin-bottom:25px;

        }

        .left-side h2{

            font-weight:700;

        }

        .left-side p{

            text-align:center;

            opacity:.9;

        }

        .right-side{

            padding:60px;

            background:white;

        }

        .input-group-text{

            background:#fff;

        }

        .btn-login{

            border-radius:30px;

            padding:12px;

            font-weight:600;

        }

        .copyright{

            text-align:center;

            margin-top:30px;

            color:#888;

            font-size:14px;

        }

    </style>

</head>

<body>

<div class="container h-100">

<div class="row justify-content-center align-items-center h-100">

<div class="col-lg-10">

<div class="card login-card">

<div class="row no-gutters">

<div class="col-lg-6 d-none d-lg-flex">

<div class="left-side">

<i class="fas fa-warehouse"></i>

<h2>Sistem Informasi</h2>

<h4>Stok Gudang</h4>

<h5>Toko Bangunan Bina Guna</h5>

<p class="mt-4">

Kelola data barang, supplier, barang masuk dan barang keluar dengan mudah, cepat, dan akurat.

</p>

</div>

</div>

<div class="col-lg-6">

<div class="right-side">

<div class="text-center mb-4">

<h3 class="font-weight-bold">

LOGIN

</h3>

<p class="text-muted">

Silakan masuk ke sistem

</p>

</div>

@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form method="POST" action="{{ route('login.process') }}">

@csrf

<div class="form-group">

<label>Email</label>

<div class="input-group">

<div class="input-group-prepend">

<span class="input-group-text">

<i class="fas fa-user"></i>

</span>

</div>

<input
type="email"
name="email"
class="form-control"
placeholder="Masukkan email"
value="{{ old('email') }}"
required>

</div>

</div>

<div class="form-group">

<label>Password</label>

<div class="input-group">

<div class="input-group-prepend">

<span class="input-group-text">

<i class="fas fa-lock"></i>

</span>

</div>

<input
type="password"
id="password"
name="password"
class="form-control"
placeholder="Masukkan password"
required>

<div class="input-group-append">

<span
class="input-group-text"
style="cursor:pointer"
onclick="togglePassword()">

<i id="eyeIcon" class="fas fa-eye"></i>

</span>

</div>

</div>

</div>

<button class="btn btn-primary btn-block btn-login">

<i class="fas fa-sign-in-alt"></i>

Masuk ke Sistem

</button>

</form>

<div class="copyright">

© {{ date('Y') }}

Toko Bangunan Bina Guna
<hr>

<div class="alert alert-info">

    <h6 class="font-weight-bold mb-2">
        <i class="fas fa-info-circle"></i>
        Akun Demo
    </h6>

    <p class="mb-1">
        <strong>Email :</strong> admin@gmail.com
    </p>

    <p class="mb-0">
        <strong>Password :</strong> admin123
    </p>

</div>
</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

<script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>

function togglePassword(){

let password=document.getElementById('password');

let eye=document.getElementById('eyeIcon');

if(password.type==="password"){

password.type="text";

eye.classList.remove('fa-eye');

eye.classList.add('fa-eye-slash');

}else{

password.type="password";

eye.classList.remove('fa-eye-slash');

eye.classList.add('fa-eye');

}

}

</script>

</body>

</html>
