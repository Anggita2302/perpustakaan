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
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:anggota,email',
            'password' => 'required|min:6',
        ]);

        Anggota::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/anggota')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);
        return view('anggota.show', compact('anggota'));
    }

    public function edit(string $id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, string $id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
        ]);

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ];

        // kalau password diisi baru
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $anggota->update($data);

        return redirect('/anggota')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(string $id_anggota)
    {
        $anggota = Anggota::findOrFail($id_anggota);
        $anggota->delete();

        return redirect('/anggota')->with('success', 'Data berhasil dihapus');
    }
}
