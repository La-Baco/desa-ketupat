<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Potensi;
use App\Models\Gallery;
use App\Models\WebsiteVisit;
use App\Models\AparaturDesa;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalAgenda = Agenda::count();
        $totalPotensi = Potensi::count();
        $totalGaleri = Gallery::count();
        $totalAparatur = AparaturDesa::count();
        
        $totalKunjungan = WebsiteVisit::count();
        $kunjunganHariIni = WebsiteVisit::whereDate('visited_at', today())->count();
        $kunjunganBulanIni = WebsiteVisit::whereMonth('visited_at', now()->month)
            ->whereYear('visited_at', now()->year)
            ->count();

        // Device breakdown
        $deviceStats = WebsiteVisit::select('device_type', DB::raw('count(*) as total'))
            ->groupBy('device_type')
            ->pluck('total', 'device_type')
            ->toArray();

        // Recent visits
        $recentVisits = WebsiteVisit::latest('visited_at')->take(10)->get();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalAgenda',
            'totalPotensi',
            'totalGaleri',
            'totalAparatur',
            'totalKunjungan',
            'kunjunganHariIni',
            'kunjunganBulanIni',
            'deviceStats',
            'recentVisits'
        ));
    }
}
