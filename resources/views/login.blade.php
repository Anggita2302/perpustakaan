@extends('layouts.auth')

@section('title', 'Login Perpustakaan')

@section('style')
<style>
    body{
        height:100vh;
        background: linear-gradient(to bottom, #6fb1fc, #4364f7);
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .login-card{
        width:350px;
        border-radius:15px;
        box-shadow:0 8px 20px rgba(0,0,0,.2);
        background:white;
        padding:30px;
    }
</style>
@endsection

@section('content')
<div class="login-card">
    <h3 class="text-center">📚 Login</h3>

    <form action="/login" method="POST">
        @csrf

        <input type="email" name="email" class="form-control mb-3">

        <input type="password" name="password" class="form-control mb-3">

        <button class="btn btn-primary w-100">
            Login
        </button>

    </form>
</div>
@endsection
