<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteVisitController extends Controller
{
    public function index(Request $request)
    {
        $totalKunjungan = WebsiteVisit::count();
        $kunjunganHariIni = WebsiteVisit::whereDate('visited_at', today())->count();
        $kunjunganBulanIni = WebsiteVisit::whereMonth('visited_at', now()->month)
            ->whereYear('visited_at', now()->year)
            ->count();

        // Device Stats
        $deviceStats = WebsiteVisit::select('device_type', DB::raw('count(*) as total'))
            ->groupBy('device_type')
            ->get();

        // Browser Stats
        $browserStats = WebsiteVisit::select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // OS Stats
        $osStats = WebsiteVisit::select('operating_system', DB::raw('count(*) as total'))
            ->groupBy('operating_system')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // Top Visited Pages
        $topPages = WebsiteVisit::select('page_name', 'page_url', DB::raw('count(*) as total'))
            ->groupBy('page_name', 'page_url')
            ->orderBy('total', 'desc')
            ->take(7)
            ->get();

        // Recent Visit Logs
        $recentVisits = WebsiteVisit::latest('visited_at')->paginate(15);

        return view('admin.statistik.visitors', compact(
            'totalKunjungan',
            'kunjunganHariIni',
            'kunjunganBulanIni',
            'deviceStats',
            'browserStats',
            'osStats',
            'topPages',
            'recentVisits'
        ));
    }
}
