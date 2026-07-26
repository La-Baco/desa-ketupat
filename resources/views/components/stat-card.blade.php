@props(['stat'])

@php
    $icons = [
        'Jumlah Penduduk' => 'fa-users',
        'Jumlah Kepala Keluarga' => 'fa-house-user',
        'Jumlah Dusun' => 'fa-map-location-dot',
        'Jumlah RT' => 'fa-people-roof',
        'Jumlah RW' => 'fa-building-user',
        'Penduduk Laki-laki' => 'fa-person',
        'Penduduk Perempuan' => 'fa-person-dress',
    ];
    $icon = $icons[$stat->name] ?? 'fa-chart-simple';
@endphp

<div class="stat-card group relative overflow-hidden bg-white dark:bg-[#1E293B] rounded-3xl p-6 shadow-sm hover:shadow-2xl hover:shadow-emerald-600/20 dark:hover:shadow-emerald-500/20 border border-slate-200/80 dark:border-slate-800 transition-all duration-300 transform hover:-translate-y-1.5 flex items-center gap-5">
    <div class="absolute -right-8 -bottom-8 w-28 h-28 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/25 transition-all"></div>
    <div class="w-14 h-14 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-[#14532D] dark:text-emerald-400 flex items-center justify-center text-2xl font-bold border border-emerald-200 dark:border-emerald-800/40 shrink-0 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-md shadow-emerald-600/10">
        <i class="fa-solid {{ $icon }}"></i>
    </div>
    <div class="relative z-10">
        <p class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">{{ $stat->name }}</p>
        <div class="flex items-baseline gap-2 mt-1">
            <span class="counter-val text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors" data-target="{{ $stat->value }}">
                0
            </span>
            <span class="text-[11px] font-extrabold text-emerald-700 dark:text-emerald-300 bg-emerald-100 dark:bg-emerald-950 px-2.5 py-0.5 rounded-full border border-emerald-300/40 shadow-sm shadow-emerald-500/10">
                {{ $stat->unit }}
            </span>
        </div>
        <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-1">Data Resmi {{ $stat->year }}</p>
    </div>
</div>
