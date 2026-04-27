<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        Anggota::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'password' => Hash::make($request->password), // WAJIB
    ]);

    return redirect('/anggota');
    }

    public function show(string $id_anggota)
    {
        $anggota = Anggota::find($id_anggota);
    return view('anggota.show', compact('anggota'));
    }

    public function edit(string $id_anggota)
    {
        $anggota = Anggota::find($id_anggota);
    return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, string $id_anggota)
{
    $anggota = Anggota::find($id_anggota);

    $anggota->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
    ]);

    return redirect('/anggota');
}

    public function destroy(string $id_anggota)
    {
        $anggota = Anggota::find($id_anggota);
    $anggota->delete();

    return redirect('/anggota');
    }
}
