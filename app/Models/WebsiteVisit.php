<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteVisit extends Model
{
    protected $fillable = [
        'session_id',
        'ip_address',
        'device_type',
        'browser',
        'operating_system',
        'page_url',
        'page_name',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
