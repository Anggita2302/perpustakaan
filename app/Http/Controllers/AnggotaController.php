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
        $buku = Buku::all();

        return view('anggota.dashboard', compact('buku'));
    }
}
