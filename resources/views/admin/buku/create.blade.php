@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Tambah Buku</h3>

<div class="card shadow">
    <div class="card-body">

        <form action="/admin/buku" method="POST">
            @csrf

            <div class="mb-3">
                <label>Id Buku</label>
                <input type="text" name="id_buku" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Klasifikasi</label>
                <input type="text" name="klasifikasi" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/admin/buku" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
