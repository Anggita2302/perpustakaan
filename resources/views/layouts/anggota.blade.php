<!DOCTYPE html>
<html>
<head>
    <title>Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eaf6ff;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar a {
            color: white !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-white" href="#">Perpustakaan</a>
        <div>
            <a href="/logout" class="ms-3">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>

</body>
</html>
