@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Data Buku</h3>

<a href="/admin/buku/create" class="btn btn-primary mb-3">
    + Tambah Buku
</a>

<div class="card shadow">
    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Id Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Klasifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($buku as $no => $item)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $item->id_buku }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun_terbit }}</td>
                    <td>{{ $item->klasifikasi }}</td>

                    <td>
                        <a href="/admin/buku/{{ $item->id_buku }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/admin/buku/{{ $item->id_buku }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus buku ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection
