@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <!-- HEADER -->
    <div class="card shadow-sm border-0 mb-4" style="background: linear-gradient(135deg, #4facfe, #00c6ff); color: white;">
        <div class="card-body">
            <h4 class="mb-0">📘 Data Pengembalian Buku</h4>
            <small>Daftar riwayat pengembalian buku perpustakaan</small>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead style="background-color: #0d6efd; color: white;">
                        <tr>
                            <th>ID</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $p)
                        <tr>
                            <td><strong>#{{ $p->id_pengembalian }}</strong></td>

                            <!-- NAMA ANGGOTA -->
                            <td>
                                {{ optional($p->peminjaman->anggota)->nama ?? '-' }}
                            </td>

                            <!-- JUDUL BUKU -->
                            <td>
                                {{ optional($p->peminjaman->buku)->judul ?? '-' }}
                            </td>

                            <!-- TANGGAL -->
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $p->tgl_pengembalian }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="text-center text-muted py-4">
                                    📭 Belum ada data pengembalian
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
