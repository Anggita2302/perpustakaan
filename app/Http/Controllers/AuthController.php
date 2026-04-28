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
        // CEK ADMIN
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'login' => true,
                'role' => 'admin',
                'id' => $admin->id_admin,
                'nama' => $admin->nama
            ]);

            return redirect('/admin/dashboard');
        }

        // CEK ANGGOTA
        $anggota = Anggota::where('email', $request->email)->first();

        if ($anggota && Hash::check($request->password, $anggota->password)) {
            session([
                'login' => true,
                'role' => 'anggota',
                'id' => $anggota->id_anggota,
                'nama' => $anggota->nama
            ]);

            return redirect('/anggota/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
