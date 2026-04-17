@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

<a href="/anggota/create" class="btn btn-primary mb-3">+ Tambah Anggota</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>

            @foreach($anggota as $no => $a)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->alamat }}</td>
                <td>{{ $a->no_hp }}</td>
                <td>
                    <a href="/anggota/edit/{{ $a->id_anggota }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/anggota/delete/{{ $a->id_anggota }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection