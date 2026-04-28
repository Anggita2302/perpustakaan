<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eaf6ff;
        }
        .sidebar {
            height: 100vh;
            background-color: #0d6efd;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

<div class="row g-0">
    <!-- Sidebar -->
    <div class="col-2 sidebar p-3">
        <h4>Admin</h4>
        <hr>
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/buku">Data Buku</a>
        <a href="/admin/anggota">Data Anggota</a>
        <a href="/admin/peminjaman">Data Peminjaman</a>
        <a href="/logout">Logout</a>
    </div>

    <!-- Content -->
    <div class="col-10 p-4">
        @yield('content')
    </div>
</div>

</body>
</html>
