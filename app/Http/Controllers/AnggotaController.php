<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Anggota::create($request->all());
    return redirect('/anggota');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_anggota)
    {
        $anggota = Anggota::find($id_anggota);
    return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_anggota)
    {
        $anggota = Anggota::find($id_anggota);
    return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_anggota)
    {
         $anggota = Anggota::find($id_anggota);
    $anggota->update($request->all());
    return redirect('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_anggota)
    {
        $anggota = Anggota::find($id_anggota);
    $anggota->delete();

    return redirect('/anggota');
    }
}
