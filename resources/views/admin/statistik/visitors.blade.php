@extends('layouts.admin')

@section('title', 'Statistik Pengunjung Website - Desa Ketupat')
@section('page_title', 'Statistik & Analisis Pengunjung')

@section('content')
<div class="space-y-8">

    <!-- Overview Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Seluruh Kunjungan</p>
                <h3 class="text-3xl font-extrabold text-[#14532D] dark:text-emerald-400 mt-1">{{ number_format($totalKunjungan) }}</h3>
                <p class="text-[11px] text-slate-400 mt-1">Lalu lintas pengunjung portal</p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-[#14532D] fa-chart-area"></i>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Kunjungan Hari Ini</p>
                <h3 class="text-3xl font-extrabold text-blue-600 dark:text-blue-400 mt-1">{{ number_format($kunjunganHariIni) }}</h3>
                <p class="text-[11px] text-slate-400">Data realtime hari ini</p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-users-viewfinder"></i>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Kunjungan Bulan Ini</p>
                <h3 class="text-3xl font-extrabold text-purple-600 dark:text-purple-400 mt-1">{{ number_format($kunjunganBulanIni) }}</h3>
                <p class="text-[11px] text-slate-400">Bulan {{ now()->translatedFormat('F Y') }}</p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-purple-50 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
        </div>
    </div>

    <!-- Analytics Breakdown Charts & Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Top Pages Table -->
        <div class="lg:col-span-6 bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 space-y-4">
            <h3 class="font-extrabold text-base text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-fire text-amber-500"></i> Halaman Paling Sering Dikunjungi
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                            <th class="p-3 rounded-l-xl">Nama Halaman</th>
                            <th class="p-3">URL</th>
                            <th class="p-3 rounded-r-xl text-right">Total Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                        @foreach($topPages as $page)
                            <tr>
                                <td class="p-3 font-bold text-slate-800 dark:text-slate-200">{{ $page->page_name }}</td>
                                <td class="p-3 text-slate-400 truncate max-w-[180px]">{{ $page->page_url }}</td>
                                <td class="p-3 text-right font-extrabold text-emerald-600 dark:text-emerald-400">{{ number_format($page->total) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Browser & OS Breakdown -->
        <div class="lg:col-span-6 space-y-6">
            <!-- Browser Stats -->
            <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 space-y-3">
                <h3 class="font-extrabold text-base text-slate-900 dark:text-white flex items-center gap-2">
                    <i class="fa-solid fa-globe text-blue-500"></i> Browser Pengunjung
                </h3>
                <div class="space-y-2">
                    @foreach($browserStats as $b)
                        @php
                            $percentage = $totalKunjungan > 0 ? round(($b->total / $totalKunjungan) * 100, 1) : 0;
                        @endphp
                        <div>
                            <div class="flex justify-between text-xs font-semibold mb-1">
                                <span>{{ $b->browser }}</span>
                                <span class="text-slate-400">{{ $b->total }} ({{ $percentage }}%)</span>
                            </div>
                            <div class="w-full h-2.5 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-500 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- OS Stats -->
            <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 space-y-3">
                <h3 class="font-extrabold text-base text-slate-900 dark:text-white flex items-center gap-2">
                    <i class="fa-solid fa-laptop text-emerald-500"></i> Sistem Operasi (OS)
                </h3>
                <div class="space-y-2">
                    @foreach($osStats as $os)
                        @php
                            $percentage = $totalKunjungan > 0 ? round(($os->total / $totalKunjungan) * 100, 1) : 0;
                        @endphp
                        <div>
                            <div class="flex justify-between text-xs font-semibold mb-1">
                                <span>{{ $os->operating_system }}</span>
                                <span class="text-slate-400">{{ $os->total }} ({{ $percentage }}%)</span>
                            </div>
                            <div class="w-full h-2.5 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- Detailed Visit Logs Table -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 space-y-4">
        <h3 class="font-extrabold text-base text-slate-900 dark:text-white flex items-center gap-2">
            <i class="fa-solid fa-list-check text-slate-500"></i> Riwayat Lengkap Kunjungan
        </h3>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                        <th class="p-3 rounded-l-xl">Waktu</th>
                        <th class="p-3">Halaman</th>
                        <th class="p-3">IP Address</th>
                        <th class="p-3">Tipe Perangkat</th>
                        <th class="p-3">Browser</th>
                        <th class="p-3 rounded-r-xl">Sistem Operasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                    @foreach($recentVisits as $visit)
                        <tr>
                            <td class="p-3 text-slate-400 whitespace-nowrap">{{ $visit->visited_at ? $visit->visited_at->format('d/m/Y H:i:s') : '-' }}</td>
                            <td class="p-3 font-semibold text-emerald-600 dark:text-emerald-400">{{ $visit->page_name }}</td>
                            <td class="p-3 font-mono text-slate-500">{{ $visit->ip_address }}</td>
                            <td class="p-3 capitalize font-medium">{{ $visit->device_type }}</td>
                            <td class="p-3 text-slate-500">{{ $visit->browser }}</td>
                            <td class="p-3 text-slate-500">{{ $visit->operating_system }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-4">
            {{ $recentVisits->links() }}
        </div>
    </div>

</div>
@endsection
