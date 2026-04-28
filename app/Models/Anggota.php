<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'public.anggota'; // nama tabel di database

    protected $primaryKey = 'id_anggota'; // kalau PK bukan 'id'

    public $timestamps = true; // kalau tidak pakai created_at & updated_at

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_hp',
        'password'
    ];

    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class, 'id_anggota');
}
}
