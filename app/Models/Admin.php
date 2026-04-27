<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'public.admin'; // nama tabel di database

    protected $primaryKey = 'id_admin'; // kalau PK bukan 'id'

    public $timestamps = true; // kalau tidak pakai created_at & updated_at

    protected $fillable = [
        'nama',
        'email',
        'password'
    ];
}
