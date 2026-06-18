<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Pengembalian;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('pengembalian')->get();
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
        $buku = Buku::all();

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

    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('admin.peminjaman.create', compact('anggota', 'buku'));
    }

    public function indexAnggota()
    {
        $peminjaman = Peminjaman::all();

        return view('anggota.peminjaman', compact('peminjaman'));
    }

    public function kembalikan($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);

        if ($peminjaman->status == 'dikembalikan') {
            return back()->with('error', 'Buku sudah dikembalikan');
        }

        $today = Carbon::now();
        $tglPinjam = Carbon::parse($peminjaman->tanggal_pinjam);

        $jatuhTempo = $tglPinjam->addDays(7);

        if ($today->gt($jatuhTempo)) {
            $terlambat = $today->diffInDays($jatuhTempo);
            $denda = $terlambat * 1000;
        } else {
            $denda = 0;
        }

    Pengembalian::create([
        'id_peminjaman' => $peminjaman->id_peminjaman,
        'tgl_pengembalian' => $today,
        'denda' => $denda,
        'id_admin' => auth()->user()->id_admin ?? 1
    ]);

    // 🔄 Update peminjaman
    $peminjaman->status = 'dikembalikan';
    $peminjaman->tanggal_kembali = $today;
    $peminjaman->save();

    // // 📚 Tambah stok buku
    // $buku = Buku::find($peminjaman->id_buku);
    // if ($buku) {
    //     $buku->stok += 1;
    //     $buku->save();
    // }
     return back()->with('success', 'Buku berhasil dikembalikan');
}
}
