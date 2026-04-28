@extends('layouts.anggota')

@section('content')

<h3>Daftar Buku</h3>

<table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>Klasifikasi</th>
        <th>Aksi</th>
    </tr>

    @foreach($buku as $b)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $b->judul }}</td>
        <td>{{ $b->pengarang }}</td>
        <td>{{ $b->penerbit }}</td>
        <td>{{ $b->tahun_terbit }}</td>
        <td>{{ $b->klasifikasi }}</td>
        <td>
            <a href="#" class="btn btn-success btn-sm">Pinjam</a>
        </td>
    </tr>
    @endforeach

</table>

@endsection
