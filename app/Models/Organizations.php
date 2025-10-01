<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    protected $fillable = [
        'name',
        'jabatan',
        'tahun_masuk',
        'tahun_keluar',
        'deskripsi',
    ];
}
