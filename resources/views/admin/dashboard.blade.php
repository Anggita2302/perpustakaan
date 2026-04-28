@extends('layouts.admin')

@section('content')
<h3 class="mb-4">Dashboard Admin</h3>

<div class="row">

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Total Buku</h6>
                <h2>{{ $totalBuku }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Total Anggota</h6>
                <h2>{{ $totalAnggota }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Total Peminjaman</h6>
                <h2>{{ $totalPeminjaman }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow text-center">
            <div class="card-body">
                <h6>Sedang Dipinjam</h6>
                <h2>{{ $peminjamanAktif }}</h2>
            </div>
        </div>
    </div>

</div>
@endsection
