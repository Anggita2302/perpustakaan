<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class AnggotaController extends Controller
{
    private function authCheck()
    {
        if (!session('login') || session('role') != 'anggota') {
            return redirect('/login')->send();
        }
    }

    public function dashboard()
    {
        $this->authCheck();

        $id = session('id');

        return view('anggota.dashboard');
    }
}
