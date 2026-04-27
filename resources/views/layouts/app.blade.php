<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }

        .sidebar {
            height: 100vh;
            width: 220px;
            position: fixed;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a.active {
            background: #0d6efd;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .navbar { margin-left: 220px; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center">📚 Perpustakaan</h4>

    <!-- MENU UMUM -->
    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="fa fa-home"></i> Dashboard
    </a>

    <!-- MENU ADMIN -->
    @if(session('role') == 'admin')
        <a href="/buku" class="{{ request()->is('buku*') ? 'active' : '' }}">
            <i class="fa fa-book"></i> Buku
        </a>

        <a href="/anggota" class="{{ request()->is('anggota*') ? 'active' : '' }}">
            <i class="fa fa-users"></i> Anggota
        </a>

        <a href="/peminjaman" class="{{ request()->is('peminjaman*') ? 'active' : '' }}">
            <i class="fa fa-exchange-alt"></i> Data Peminjaman
        </a>
    @endif

    <!-- MENU ANGGOTA -->
    @if(session('role') == 'anggota')
        <a href="/peminjaman" class="{{ request()->is('peminjaman*') ? 'active' : '' }}">
            <i class="fa fa-exchange-alt"></i> Peminjaman Saya
        </a>
    @endif

    <!-- LOGOUT -->
    <a href="/logout">
        <i class="fa fa-sign-out-alt"></i> Logout
    </a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm p-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h5">
            @yield('title') - Halo, {{ session('nama') }}
        </span>
    </div>
</nav>

<!-- Content -->
<div class="content">
    @yield('content')
</div>

</body>
</html>
