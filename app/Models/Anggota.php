<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'public.anggota'; // nama tabel di database

    protected $primaryKey = 'id_anggota'; // kalau PK bukan 'id'

    public $timestamps = false; // kalau tabel tidak pakai created_at & updated_at

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp'
    ];
}