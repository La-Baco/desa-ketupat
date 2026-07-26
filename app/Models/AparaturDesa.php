<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AparaturDesa extends Model
{
    protected $fillable = [
        'name',
        'position',
        'photo',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
