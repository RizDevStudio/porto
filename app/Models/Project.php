<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'tech_stack',
        'demo_link',
        'github_link',
        'is_featured',
    ];

    // Accessor: pecah tech_stack jadi array
    public function getTechStackArrayAttribute()
    {
        return explode(',', $this->tech_stack);
    }

    // Mutator: gabung array jadi string sebelum disimpan
    public function setTechStackAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['tech_stack'] = implode(',', $value);
        } else {
            $this->attributes['tech_stack'] = $value;
        }
    }

    // Scope: ambil hanya project unggulan
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope: ambil project terbaru
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}