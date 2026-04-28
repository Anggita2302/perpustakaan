<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku'; // opsional (kalau nama tabel beda)

    protected $primaryKey = 'id_buku'; // kalau PK bukan 'id'

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = true; // kalau tidak pakai created_at & updated_at

    protected $fillable = [
        'id_buku',
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'klasifikasi'
    ];

    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class, 'id_buku');
}

}
