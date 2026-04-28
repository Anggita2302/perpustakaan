@extends('layouts.admin')

@section('content')

<h3 class="mb-4">Edit Anggota</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow">
    <div class="card-body">

        <form action="/admin/anggota/{{ $anggota->id_anggota }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control"
                       value="{{ $anggota->nama }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $anggota->email }}" required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ $anggota->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control"
                       value="{{ $anggota->no_hp }}" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="/admin/anggota" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
