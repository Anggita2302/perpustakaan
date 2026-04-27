<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Anggota;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 🔴 CEK ADMIN DULU
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

            session([
                'login' => true,
                'role' => 'admin',
                'nama' => $admin->nama,
                'id' => $admin->id_admin
            ]);

            return redirect('/dashboard');
        }

        // 🔵 CEK ANGGOTA
        $anggota = Anggota::where('email', $request->email)->first();

        if ($anggota && Hash::check($request->password, $anggota->password)) {

            session([
                'login' => true,
                'role' => 'anggota',
                'nama' => $anggota->nama,
                'id' => $anggota->id_anggota
            ]);

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
