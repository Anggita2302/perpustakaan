@extends('layouts.auth')

@section('style')
<style>
    body{
        height:100vh;
        background: linear-gradient(to bottom, #6fb1fc, #4364f7);
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .login-card{
        width:350px;
        border-radius:15px;
        box-shadow:0 8px 20px rgba(0,0,0,.2);
        background:white;
        padding:30px;
    }
</style>
@endsection

@section('content')
<div class="card p-4 shadow" style="width:400px;">
    <h1 class="text-center">Sistem Informasi Perpustakaan</h1>

    <hr>

    <h4 class="text-center mb-3">Input Pengunjung</h4>

    <form action="/pengunjung/simpan" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100 mb-2">
            Simpan
        </button>

    </form>

    <a href="/login" class="btn btn-primary w-100">
        Login Admin
    </a>
</div>

@endsection
