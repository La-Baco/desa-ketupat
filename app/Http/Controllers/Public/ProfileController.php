<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DesaProfile;
use App\Models\DesaStatistic;
use App\Models\SiteSetting;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = DesaProfile::first();
        $statistics = DesaStatistic::all();
        $settings = SiteSetting::first();

        return view('public.profil', compact('profile', 'statistics', 'settings'));
    }
}
