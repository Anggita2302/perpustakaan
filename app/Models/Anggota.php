<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'public.anggota'; // nama tabel di database

    protected $primaryKey = 'nim'; // kalau PK bukan 'id'

    public $timestamps = true; // kalau tidak pakai created_at & updated_at

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'kelas'
    ];
}
