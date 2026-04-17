@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')

<div class="card">
    <div class="card-header">Edit Anggota</div>
    <div class="card-body">

        <form action="/anggota/update/{{ $anggota->id_anggota }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $anggota->nama }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $anggota->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ $anggota->no_hp }}" class="form-control">
            </div>

            <button class="btn btn-success">Update</button>
            <a href="/anggota" class="btn btn-danger">Cancel</a>

        </form>

    </div>
</div>

@endsection