<!DOCTYPE html>
<html>
<head>
    <title>Cari Data Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Cari Data Buku</h2>

   <form action="/hasil-buku" method="GET">

    </form>

    @isset($buku)

        @if($buku->count() > 0)

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Klasifikasi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($buku as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->tahun_terbit }}</td>
                        <td>{{ $item->klasifikasi }}</td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="alert alert-danger">
                Data buku tidak ditemukan!
            </div>

        @endif

    @endisset

    <div class="mt-3">
        <a href="/anggota/dashboard" class="btn btn-secondary">
            ← Kembali ke Dashboard
        </a>
    </div>

</div>

</body>
</html>
