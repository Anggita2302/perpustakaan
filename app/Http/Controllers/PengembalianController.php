<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;

class PengembalianController extends Controller
{
public function index()
{
    $data = Pengembalian::with('peminjaman.anggota', 'peminjaman.buku')->get();
    return view('admin.pengembalian.index', compact('data'));
}
}
