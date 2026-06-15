<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Anggota;

class AuthController extends Controller
{
    private $key = "UNISLA";

    // FUNGSI ENKRIPSI VIGENERE
    private function encryptVigenere($text)
    {
        $result = '';

        for ($i = 0; $i < strlen($text); $i++) {
            $textChar = ord($text[$i]);
            $keyChar = ord($this->key[$i % strlen($this->key)]);

            $encrypted = ($textChar + $keyChar) % 256;

            $result .= chr($encrypted);
        }

        return bin2hex($result);
    }

    // MENAMPILKAN HALAMAN LOGIN
    public function login()
    {
        return view('login');
    }

    // PROSES LOGIN
    public function loginProses(Request $request)
    {
        $passwordInput = $this->encryptVigenere($request->password);

        // CEK ADMIN
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && $passwordInput == $admin->password) {

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

        if ($anggota && $passwordInput == $anggota->password) {

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

    // LOGOUT
    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
