<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $primaryKey = 'id_peminjaman';

    public $timestamps = true;

    protected $fillable = [
        'id_anggota',
        'id_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'id_admin'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
