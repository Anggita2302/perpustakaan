<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public function buku()
{
    return $this->belongsTo(Buku::class);
}

    protected $table = 'public.peminjaman'; // nama tabel di database

    protected $primaryKey = 'id_peminjaman'; // kalau PK bukan 'id'

    public $timestamps = true; // kalau tidak pakai created_at & updated_at

    protected $fillable = [
        'nim',
        'kode_buku',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];
}
