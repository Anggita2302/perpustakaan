<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class AnggotaController extends Controller
{

    // 🔐 helper login check (tanpa middleware)
    private function authCheck()
    {
        if (!session('login') || session('role') != 'anggota') {
            return redirect('/login')->send();
        }
    }

    public function dashboard()
    {
        $this->authCheck();

        $id = session('id'); // 🔥 samakan dengan login admin

        $totalPinjam = Peminjaman::where('id_anggota', $id)->count();

        $sedangPinjam = Peminjaman::where('id_anggota', $id)
                            ->where('status', 'dipinjam')
                            ->count();

        return view('anggota.dashboard', compact(
            'totalPinjam',
            'sedangPinjam'
        ));
    }

    public function peminjaman()
    {
        $this->authCheck();

        $peminjaman = Peminjaman::where('id_anggota', session('id'))->get();

        return view('anggota.peminjaman', compact('peminjaman'));
    }

    public function buku()
    {
        $buku = Buku::all();
        return view('anggota.buku.index', compact('buku'));
    }
}
