<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesaStatistic extends Model
{
    protected $fillable = [
        'name',
        'value',
        'unit',
        'year',
        'category',
    ];
}
