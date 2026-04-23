@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')

<div class="card">
    <div class="card-header">Edit Peminjaman</div>
    <div class="card-body">

        <form action="/peminjaman/{{ $peminjaman->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Buku</label>
                <select name="buku_id" class="form-control">
                    @foreach ($buku as $b)
                        <option value="{{ $b->id }}"
                            {{ $peminjaman->buku_id == $b->id ? 'selected' : '' }}>
                            {{ $b->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control"
                       value="{{ $peminjaman->nama_peminjam }}">
            </div>

            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control"
                       value="{{ $peminjaman->tanggal_pinjam }}">
            </div>

            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control"
                       value="{{ $peminjaman->tanggal_kembali }}">
            </div>

            <button class="btn btn-success">Update</button>
            <a href="/peminjaman" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
