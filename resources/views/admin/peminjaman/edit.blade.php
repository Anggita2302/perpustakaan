@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Edit Peminjaman</h3>

<div class="card shadow">
    <div class="card-body">

        <form action="/admin/peminjaman/{{ $peminjaman->id_peminjaman }}" method="POST">
            @csrf
               @method('PUT')

            <!-- ID ANGGOTA -->
            <div class="mb-3">
                <label>ID Anggota</label>
                <input type="text" name="id_anggota"
                    class="form-control"
                    value="{{ $peminjaman->id_anggota }}"
                    required>
            </div>

            <!-- ID BUKU -->
            <div class="mb-3">
                <label>ID Buku</label>
                <input type="text" name="id_buku"
                    class="form-control"
                    value="{{ $peminjaman->id_buku }}"
                    required>
            </div>

            <!-- PILIH JUDUL BUKU -->
            <div class="mb-3">
                <label>Judul Buku</label>
                <select name="id_buku" class="form-control" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($buku as $item)
                        <option value="{{ $item->id_buku }}"
                            {{ $peminjaman->id_buku == $item->id_buku ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- TANGGAL PINJAM -->
            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam"
                    class="form-control"
                    value="{{ $peminjaman->tanggal_pinjam }}"
                    required>
            </div>

            <!-- TANGGAL KEMBALI -->
            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali"
                    class="form-control"
                    value="{{ $peminjaman->tanggal_kembali }}">
            </div>

            <!-- STATUS -->
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>
                        Dipinjam
                    </option>
                    <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>
                        Dikembalikan
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="/admin/peminjaman" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection
