<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            background: #2c3e50;
            color: white;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .navbar-custom {
            margin-left: 220px;
            background: #ecf0f1;
            padding: 10px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h5 class="p-3">PERPUSTAKAAN</h5>
    <a href="/dashboard">Dashboard</a>
    <a href="/anggota">Anggota</a>
    <a href="/logout">Logout</a>
</div>

<!-- Navbar -->
<div class="navbar-custom">
    @yield('title')
</div>

<!-- Content -->
<div class="content">
    @yield('content')
</div>

</body>
</html>