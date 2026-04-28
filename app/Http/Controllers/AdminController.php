<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;

class AdminController extends Controller
{

    // 🔐 helper login check (tanpa middleware)
    private function authCheck()
    {
        if (!session('login') || session('role') != 'admin') {
            return redirect('/login')->send();
        }
    }

    public function dashboard()
    {
        $this->authCheck(); // 🔥 dipanggil di sini

        $totalBuku = Buku::count();
        $totalPeminjaman = Peminjaman::count();
        $totalAnggota = Anggota::count();

        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();

        return view('admin.dashboard', compact(
            'totalBuku',
            'totalPeminjaman',
            'totalAnggota',
            'peminjamanAktif'
        ));
    }

    public function index()
{
    $this->authCheck();

    $peminjaman = Peminjaman::with(['buku', 'anggota'])
        ->whereNotNull('id_buku')
        ->whereNotNull('id_anggota')
        ->get();

    return view('admin.peminjaman.index', compact('peminjaman'));
}

    public function create()
{
    $this->authCheck();

    $anggota = \App\Models\Anggota::all();
    $buku = \App\Models\Buku::all();

    return view('admin.peminjaman.create', compact('anggota', 'buku'));
}

    public function store(Request $request)
{
    $this->authCheck();

    $request->validate([
        'id_buku' => 'required',
        'id_anggota' => 'required',
        'tanggal_pinjam' => 'required',
    ]);

    Peminjaman::create([
        'id_buku' => $request->id_buku,
        'id_anggota' => $request->id_anggota,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => null,
        'status' => 'dipinjam',
        'id_admin' => session('id')
    ]);

    return redirect('/admin/peminjaman')->with('success', 'Berhasil dipinjam');
}

    public function show(string $id)
    {
        $this->authCheck();
    }

    public function edit(string $id)
    {
        $this->authCheck();

        $peminjaman = Peminjaman::findOrFail($id);

    return view('admin.peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, string $id)
    {
        $this->authCheck();

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
        'id_anggota' => $request->id_anggota,
        'id_buku' => $request->id_buku,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status' => $request->status
    ]);

    return redirect('/admin/peminjaman')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $this->authCheck();
    }
}
