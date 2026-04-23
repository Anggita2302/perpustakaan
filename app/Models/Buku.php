<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class);
}
    protected $table = 'public.buku'; // nama tabel di database

    protected $primaryKey = 'kode_buku'; // kalau PK bukan 'id'

    public $timestamps = true; // kalau tidak pakai created_at & updated_at

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit'
    ];
}
