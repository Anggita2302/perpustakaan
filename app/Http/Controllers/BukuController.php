<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('admin.buku.index', compact('buku'));
    }

    public function create()
    {
        return view('admin.buku.create');
    }

    public function store(Request $request)
    {
        Buku::create($request->all());
        return redirect('/admin/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->firstOrFail();
        return view('admin.buku.edit', compact('buku'));
    }

    public function update(Request $request, $id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->firstOrFail();
        $buku->update($request->all());

        return redirect('/admin/buku')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->firstOrFail();
        $buku->delete();

        return redirect('/admin/buku')->with('success', 'Buku berhasil dihapus');
    }

    public function indexAnggota()
    {
        $buku = Buku::all();

        return view('anggota.buku', compact('buku'));
    }

    public function formCari()
    {
        $buku = Buku::all();

        return view('buku.cari', compact('buku'));
    }

    public function cari(Request $request)
    {
        $buku = Buku::where('id_buku', $request->id_buku)->get();

        return view('buku.cari', compact('buku'));
    }
}
