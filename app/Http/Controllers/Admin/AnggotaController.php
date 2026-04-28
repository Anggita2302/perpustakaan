<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use App\Models\Anggota;

    class AnggotaController extends Controller
    {
        public function index()
        {
            $anggota = Anggota::all();
            return view('admin.anggota.index', compact('anggota'));
        }

        public function create()
        {
            return view('admin.anggota.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'password' => 'required',
            ]);

            Anggota::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

            return redirect('/admin/anggota')->with('success', 'Data berhasil ditambahkan');
        }

        public function edit($id)
        {
            $anggota = Anggota::findOrFail($id);
            return view('admin.anggota.edit', compact('anggota'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'no_hp' => 'required',
            ]);

            $anggota = Anggota::findOrFail($id);

            $anggota->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);

        return redirect('/admin/anggota')->with('success', 'Data berhasil diupdate');
        }

        public function destroy($id)
        {
            $anggota = Anggota::findOrFail($id);
            $anggota->delete();

            return redirect('/admin/anggota')->with('success', 'Data berhasil dihapus');
        }
    }
