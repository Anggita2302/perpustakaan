@extends('layouts.admin')

@section('content')
<h3>Data Peminjaman</h3>

<a href="/admin/peminjaman/create" class="btn btn-primary mb-3">+ Tambah Peminjaman</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjaman as $i => $p)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>

                    <td>{{ $p->anggota->nama ?? '-' }}</td>
                    <td>{{ $p->buku->judul ?? '-' }}</td>

                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->tanggal_kembali ?? '-' }}</td>

                    <td class="text-center">
                        @if($p->status == 'dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @else
                            <span class="badge bg-success">Kembali</span>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex justify-content-center gap-2">

                            <a href="/admin/peminjaman/{{ $p->id_peminjaman }}/edit"
                               class="btn btn-warning btn-sm px-3">
                                Edit
                            </a>

                            <form action="/admin/peminjaman/{{ $p->id_peminjaman }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                        class="btn btn-danger btn-sm px-3">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
