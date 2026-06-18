@extends('layouts.admin')

@section('content')
<h3>Data Peminjaman</h3>

<a href="/admin/peminjaman/create" class="btn btn-primary mb-3">+ Tambah Peminjaman</a>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="text-center table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th width="220px">Aksi</th>
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

                    <!-- STATUS -->
                    <td class="text-center">
                        @if($p->status == 'dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @elseif($p->status == 'dikembalikan')
                            <span class="badge bg-success">Kembali</span><br>
                        @endif
                    </td>

                    <!-- AKSI -->
                    <td>
    <div class="d-flex justify-content-center align-items-center gap-2">

        @if($p->status == 'dipinjam')
        <form action="/admin/peminjaman/{{ $p->id_peminjaman }}/kembalikan" method="POST" class="m-0">
            @csrf
            <button class="btn btn-success btn-sm">
                Kembalikan
            </button>
        </form>
        @endif

        <a href="/admin/peminjaman/{{ $p->id_peminjaman }}/edit"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="/admin/peminjaman/{{ $p->id_peminjaman }}" method="POST" class="m-0">
            @csrf
            @method('DELETE')
            <button type="submit"
                    onclick="return confirm('Yakin hapus data?')"
                    class="btn btn-danger btn-sm">
                Hapus
            </button>
        </form>

    </div>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        Belum ada data peminjaman
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
