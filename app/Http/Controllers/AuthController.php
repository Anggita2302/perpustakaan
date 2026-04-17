<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProses(Request $request)
{
    if ($request->email == 'admin@gmail.com' && $request->password == '123') {
        session(['login' => true]);
        return redirect('/dashboard');
    }

    return back()->with('error', 'Email atau password salah');
}


    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
