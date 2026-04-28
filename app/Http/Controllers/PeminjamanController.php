<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        Peminjaman::create([
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam',
            'id_admin' => session('id'),
        ]);

        return redirect('/admin/peminjaman')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
{
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::all(); // ambil semua buku

        return view('admin.peminjaman.edit', compact('peminjaman', 'buku'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        return redirect('/admin/peminjaman')->with('success', 'Data berhasil diupdate');
}

    public function destroy($id)
    {
        $peminjaman = Peminjaman::where('id_peminjaman', $id)->firstOrFail();
        $peminjaman->delete();

        return redirect('/admin/peminjaman')->with('success', 'Data berhasil dihapus');
}
}
