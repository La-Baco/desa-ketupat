<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;

class ContactPublicController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
        return view('public.kontak', compact('settings'));
    }
}
