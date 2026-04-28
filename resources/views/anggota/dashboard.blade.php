@extends('layouts.anggota')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="text-center">

        <h1 style="font-size: 48px; font-weight: bold; color: #0d6efd;">
            Selamat Datang di Perpustakaan 📚
        </h1>

        <h3 class="mt-3">
            Halo, {{ session('nama') }} 👋
        </h3>

        <p class="mt-3 text-muted" style="font-size: 18px;">
            Silakan pilih menu di atas untuk melihat daftar buku atau peminjaman Anda.
        </p>

    </div>
</div>

@endsection
