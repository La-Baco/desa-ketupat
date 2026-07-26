@extends('layouts.admin')

@section('title', 'Dashboard Admin - Desa Ketupat')
@section('page_title', 'Dashboard Ringkasan Portal')

@section('content')
<div class="space-y-8">

    <!-- Welcome Hero Banner -->
    <div class="rounded-3xl bg-gradient-to-r from-[#14532D] via-[#166534] to-emerald-900 text-white p-8 sm:p-10 shadow-xl relative overflow-hidden">
        <div class="relative z-10 space-y-2 max-w-2xl">
            <span class="px-3.5 py-1 rounded-full bg-emerald-500/30 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
                Pemerintah Desa Ketupat
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-emerald-100 text-sm font-light leading-relaxed">
                Kelola seluruh data informasi, profil desa, aparatur, berita, agenda, dan potensi Desa Ketupat secara langsung dari satu panel terpadu.
            </p>
        </div>
        <div class="absolute right-6 -bottom-10 opacity-10 text-9xl text-white pointer-events-none hidden sm:block">
            <i class="fa-solid fa-tree"></i>
        </div>
    </div>

    <!-- Stat Cards Overview Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Berita -->
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Berita</p>
                <h3 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-1">{{ number_format($totalBerita) }}</h3>
                <a href="{{ route('admin.berita.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline mt-2 inline-block">Kelola Berita &rarr;</a>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </div>

        <!-- Agenda -->
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Agenda</p>
                <h3 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-1">{{ number_format($totalAgenda) }}</h3>
                <a href="{{ route('admin.agenda.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline mt-2 inline-block">Kelola Agenda &rarr;</a>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
        </div>

        <!-- Potensi -->
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Potensi</p>
                <h3 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-1">{{ number_format($totalPotensi) }}</h3>
                <a href="{{ route('admin.potensi.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline mt-2 inline-block">Kelola Potensi &rarr;</a>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-wheat-awn"></i>
            </div>
        </div>

        <!-- Galeri -->
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Galeri</p>
                <h3 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-1">{{ number_format($totalGaleri) }}</h3>
                <a href="{{ route('admin.galeri.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline mt-2 inline-block">Kelola Galeri &rarr;</a>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-purple-50 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-images"></i>
            </div>
        </div>
    </div>

    <!-- Visitor Summary Row -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Visits Info Box -->
        <div class="lg:col-span-8 bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
                <div>
                    <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                        <i class="fa-solid fa-chart-line text-emerald-600 dark:text-emerald-400"></i> Ringkasan Kunjungan Website
                    </h3>
                    <p class="text-xs text-slate-400">Statistik pengunjung portal resmi Desa Ketupat</p>
                </div>
                <a href="{{ route('admin.statistik-pengunjung.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 dark:bg-slate-700 text-xs font-bold hover:bg-emerald-600 hover:text-white transition">
                    Laporan Lengkap
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="p-5 rounded-2xl bg-emerald-50/50 dark:bg-slate-700/40 border border-emerald-100 dark:border-slate-700 text-center">
                    <span class="text-xs font-bold text-slate-500 uppercase">Total Kunjungan</span>
                    <span class="block text-3xl font-extrabold text-emerald-700 dark:text-emerald-400 mt-1">{{ number_format($totalKunjungan) }}</span>
                    <span class="text-[10px] text-slate-400">sejak sistem diluncurkan</span>
                </div>

                <div class="p-5 rounded-2xl bg-blue-50/50 dark:bg-slate-700/40 border border-blue-100 dark:border-slate-700 text-center">
                    <span class="text-xs font-bold text-slate-500 uppercase">Kunjungan Hari Ini</span>
                    <span class="block text-3xl font-extrabold text-blue-600 dark:text-blue-400 mt-1">{{ number_format($kunjunganHariIni) }}</span>
                    <span class="text-[10px] text-slate-400">pengunjung aktif</span>
                </div>

                <div class="p-5 rounded-2xl bg-purple-50/50 dark:bg-slate-700/40 border border-purple-100 dark:border-slate-700 text-center">
                    <span class="text-xs font-bold text-slate-500 uppercase">Kunjungan Bulan Ini</span>
                    <span class="block text-3xl font-extrabold text-purple-600 dark:text-purple-400 mt-1">{{ number_format($kunjunganBulanIni) }}</span>
                    <span class="text-[10px] text-slate-400">bulan {{ now()->translatedFormat('F Y') }}</span>
                </div>
            </div>

            <!-- Recent Visits Table -->
            <div class="pt-2">
                <h4 class="font-bold text-sm text-slate-800 dark:text-slate-200 mb-3">Log Kunjungan Terakhir</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead>
                            <tr class="bg-slate-100 dark:bg-slate-700/60 text-slate-600 dark:text-slate-300">
                                <th class="p-2.5 rounded-l-xl">Perangkat / OS</th>
                                <th class="p-2.5">Browser</th>
                                <th class="p-2.5">Halaman</th>
                                <th class="p-2.5 rounded-r-xl">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                            @foreach($recentVisits as $visit)
                                <tr>
                                    <td class="p-2.5 font-medium flex items-center gap-2">
                                        @if($visit->device_type === 'mobile')
                                            <i class="fa-solid fa-mobile-screen text-emerald-500"></i>
                                        @elseif($visit->device_type === 'tablet')
                                            <i class="fa-solid fa-tablet-screen-button text-blue-500"></i>
                                        @else
                                            <i class="fa-solid fa-desktop text-purple-500"></i>
                                        @endif
                                        <span>{{ ucfirst($visit->device_type) }} &bull; {{ $visit->operating_system }}</span>
                                    </td>
                                    <td class="p-2.5 text-slate-500 dark:text-slate-400">{{ $visit->browser }}</td>
                                    <td class="p-2.5 font-semibold text-emerald-600 dark:text-emerald-400">{{ $visit->page_name }}</td>
                                    <td class="p-2.5 text-slate-400">{{ $visit->visited_at ? $visit->visited_at->diffForHumans() : '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Devices Distribution Chart -->
        <div class="lg:col-span-4 bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 space-y-4">
            <h3 class="font-extrabold text-base text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-mobile-button text-emerald-600 dark:text-emerald-400"></i> Perangkat Pengunjung
            </h3>
            <div class="relative h-64 flex items-center justify-center">
                <canvas id="deviceChart"></canvas>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('deviceChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Desktop', 'Mobile', 'Tablet'],
                datasets: [{
                    data: [
                        {{ $deviceStats['desktop'] ?? 0 }},
                        {{ $deviceStats['mobile'] ?? 0 }},
                        {{ $deviceStats['tablet'] ?? 0 }}
                    ],
                    backgroundColor: ['#14532D', '#22C55E', '#3B82F6'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: document.documentElement.classList.contains('dark') ? '#F8FAFC' : '#1F2937'
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
