<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;

class AparaturPublicController extends Controller
{
    public function index()
    {
        $kades = AparaturDesa::where('position', 'Kepala Desa')->first();
        
        $aparaturList = AparaturDesa::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('public.aparatur', compact('kades', 'aparaturList'));
    }
}
