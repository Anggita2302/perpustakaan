@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')

<div class="card">
    <div class="card-header">Form Data Anggota</div>
    <div class="card-body">

        <form action="/anggota/store" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Nama" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat" class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" placeholder="No Hp" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="/anggota" class="btn btn-danger">Cancel</a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
