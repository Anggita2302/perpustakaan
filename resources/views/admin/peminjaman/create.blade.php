@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Tambah Peminjaman</h3>
        @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                    @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
        @endif

<div class="card shadow">
    <div class="card-body">

        <form action="/admin/peminjaman" method="POST">
            @csrf

            <!-- PILIH ANGGOTA -->
            <div class="mb-3">
                <label>Anggota</label>
                <select name="id_anggota" class="form-control" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($anggota as $a)
                        <option value="{{ $a->id_anggota }}">
                            {{ $a->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- PILIH BUKU -->
            <div class="mb-3">
                <label>Buku</label>
                <select name="id_buku" class="form-control" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($buku as $b)
                        <option value="{{ $b->id_buku }}">
                            {{ $b->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- TANGGAL PINJAM -->
            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>

            <!-- BUTTON -->
            <button class="btn btn-primary">
                Simpan
            </button>

            <a href="/admin/peminjaman" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection
