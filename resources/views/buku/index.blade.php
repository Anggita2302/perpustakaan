@extends('layouts.app')

@section('title', 'Peminjaman Buku')

@section('content')

<a href="/peminjaman/create" class="btn btn-primary mb-3">+ Tambah Peminjaman</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>tahun Terbit</th>
            </tr>

            @foreach($buku as $item)
            <tr>
                <td>{{ $item->kode_buku }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->pengarang }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun_terbit }}</td>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection
