<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    protected $fillable = [
        'jenjang',
        'instansi',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
    ];
}
