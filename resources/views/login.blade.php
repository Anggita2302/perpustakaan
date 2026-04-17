<!DOCTYPE html>
<html>
<head>
    <title>Login Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(to bottom, #6fb1fc, #4364f7);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            background: white;
            padding: 30px;
        }

        .login-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-login {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="login-title">📚 Login</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login-proses" method="POST">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Masukkan email">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>

        <button type="submit" class="btn btn-primary btn-login">
            Login
        </button>
    </form>
</div>

</body>
</html>