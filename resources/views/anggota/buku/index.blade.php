@extends('layouts.anggota')

@section('content')

<h3 class="mb-4">Daftar Buku</h3>

<div class="card shadow">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Klasifikasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($buku as $key => $b)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $b->id_buku }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->pengarang }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>{{ $b->tahun_terbit }}</td>
                    <td>{{ $b->klasifikasi }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada buku</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
