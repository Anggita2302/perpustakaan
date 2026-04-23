@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>Data Peminjaman</span>
        <a href="/peminjaman/create" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $i => $item)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->nama_peminjam }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>
                        <a href="/peminjaman/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                        <form action="/peminjaman/{{ $item->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
