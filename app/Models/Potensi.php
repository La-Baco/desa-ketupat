<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    protected $table = 'potensis';

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'location',
        'image',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
