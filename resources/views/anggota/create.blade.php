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
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control">
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="/anggota" class="btn btn-danger">Cancel</a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
