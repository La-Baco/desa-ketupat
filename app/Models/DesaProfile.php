<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesaProfile extends Model
{
    protected $fillable = [
        'sejarah',
        'deskripsi',
        'visi',
        'misi',
        'sambutan',
        'foto_kantor',
    ];
}
