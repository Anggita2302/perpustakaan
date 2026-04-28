@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Data Anggota</h3>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="/admin/anggota/create" class="btn btn-primary mb-3">
    + Tambah Anggota
</a>

<div class="card shadow">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggota as $key => $a)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->no_hp }}</td>
                    <td>
                        <!-- EDIT -->
                        <a href="/admin/anggota/{{ $a->id_anggota }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form action="/admin/anggota/{{ $a->id_anggota }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau hapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
