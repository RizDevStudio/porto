<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $fillable = [
        'name',
        'publisher',
        'date_published',
        'expiry_date',
        'file',
    ];
}
