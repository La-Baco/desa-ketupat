<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DesaProfile;
use App\Models\AparaturDesa;
use App\Models\DesaStatistic;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Potensi;
use App\Models\Gallery;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $profile = DesaProfile::first();
        $settings = SiteSetting::first();
        
        $kades = AparaturDesa::where('position', 'Kepala Desa')
            ->where('is_active', true)
            ->first();
            
        $statistics = DesaStatistic::all();
        
        $beritaTerbaru = Berita::where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();
            
        $agendas = Agenda::where('event_date', '>=', now()->subDays(30))
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();
            
        $potensis = Potensi::where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();
            
        $galleries = Gallery::latest('event_date')
            ->take(6)
            ->get();

        return view('home', compact(
            'profile',
            'settings',
            'kades',
            'statistics',
            'beritaTerbaru',
            'agendas',
            'potensis',
            'galleries'
        ));
    }
}
