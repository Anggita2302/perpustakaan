@extends('layouts.anggota')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height:80vh;">
    <div class="text-center">

        <h1 style="font-size:48px; font-weight:bold; color:#0d6efd;">
            Selamat Datang di Perpustakaan 📚
        </h1>

        <h3 class="mt-3">
            Halo, {{ session('nama') }} 👋
        </h3>

        <p class="mt-3 text-muted" style="font-size:18px;">
            Silakan pilih menu di bawah untuk melihat daftar buku
        </p>

        {{-- FORM CARI BUKU --}}
        <div class="mt-4">

            <form action="{{ route('anggota.cariBuku') }}" method="GET">

                <div class="input-group mx-auto" style="max-width:500px;">

                    <form action="{{ route('anggota.cariBuku') }}" method="GET">

                <div class="input-group mx-auto" style="max-width:500px;">

                    <select name="id_buku" class="form-select" required>
                        <option value="">-- Pilih Buku --</option>

                        @foreach($buku as $item)
                            <option value="{{ $item->id_buku }}">
                                {{ $item->judul }}
                            </option>
                        @endforeach

                    </select>

                    <button type="submit" class="btn btn-primary">
                        Lihat
                    </button>

                </div>

            </form>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection
