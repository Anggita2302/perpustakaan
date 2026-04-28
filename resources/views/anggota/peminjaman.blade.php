@extends('layouts.anggota')

@section('content')

<h3>Peminjaman Saya</h3>

<table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
    </tr>

    @foreach($peminjaman as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->buku->judul }}</td>
        <td>{{ $p->tanggal_pinjam }}</td>
         <td>{{ $p->tanggal_kembali }}</td>
        <td>{{ $p->status }}</td>
    </tr>
    @endforeach

</table>

@endsection
