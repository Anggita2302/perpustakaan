@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

<div class="card">
    <div class="card-header">Form Peminjaman</div>
    <div class="card-body">

        <form action="/peminjaman" method="POST">
            @csrf

            <div class="mb-3">
                <label>Buku</label>
                <select name="buku_id" class="form-control">
                    @foreach ($buku as $b)
                        <option value="{{ $b->id }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control">
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="/peminjaman" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
