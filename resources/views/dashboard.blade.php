<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

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

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .card-box {
            border-radius: 15px;
            color: white;
            padding: 20px;
        }

        .bg-blue { background: #0d6efd; }
        .bg-green { background: #198754; }
        .bg-orange { background: #fd7e14; }

        .navbar {
            margin-left: 220px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center">📚 Perpustakaan</h4>
    <a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a>
    <a href="#"><i class="fa fa-book"></i> Buku</a>
    <a href="/anggota"><i class="fa fa-users"></i> Anggota</a>
    <a href="#"><i class="fa fa-exchange-alt"></i> Peminjaman</a>
    <a href="/logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm p-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h5">Dashboard</span>
    </div>
</nav>

<!-- Content -->
<div class="content">

    <div class="row">
        <div class="col-md-4">
            <div class="card-box bg-blue">
                <h5>Total Buku</h5>
                <h2>100</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box bg-green">
                <h5>Total Anggota</h5>
                <h2>50</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box bg-orange">
                <h5>Dipinjam</h5>
                <h2>20</h2>
            </div>
        </div>
    </div>

</div>

</body>
</html>