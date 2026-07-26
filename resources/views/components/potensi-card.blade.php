@props(['potensi'])

@php
    $imageUrl = $potensi->image ? (Str::startsWith($potensi->image, 'images/') ? asset($potensi->image) : asset('storage/' . $potensi->image)) : asset('images/placeholder.jpg');
@endphp

<div class="bg-white dark:bg-[#1E293B] rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-emerald-600/20 dark:hover:shadow-emerald-500/20 border border-slate-200/80 dark:border-slate-800 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group">
    <div class="relative h-48 w-full overflow-hidden bg-slate-900">
        <img src="{{ $imageUrl }}" alt="{{ $potensi->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        <div class="absolute top-4 left-4 flex gap-2">
            <span class="px-3.5 py-1 rounded-full bg-[#14532D]/90 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md shadow-lg shadow-emerald-950/40 border border-emerald-500/30">
                {{ $potensi->category }}
            </span>
            @if($potensi->is_featured)
                <span class="px-3 py-1 rounded-full bg-gradient-to-r from-amber-500 to-amber-600 text-white text-[10px] font-extrabold uppercase tracking-wider shadow-lg flex items-center gap-1.5 border border-amber-300/40">
                    <i class="fa-solid fa-star text-[9px]"></i> Unggulan
                </span>
            @endif
        </div>
    </div>

    <div class="p-6 flex-1 flex flex-col justify-between space-y-3">
        <div>
            <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-[#166534] dark:group-hover:text-emerald-400 transition-colors leading-snug">
                <a href="{{ route('potensi.show', $potensi->slug) }}">
                    {{ $potensi->name }}
                </a>
            </h3>
            
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 line-clamp-3 leading-relaxed mt-2">
                {{ Str::limit(strip_tags($potensi->description), 110) }}
            </p>
        </div>

        @if($potensi->location)
            <div class="text-xs text-slate-500 dark:text-slate-400 font-medium flex items-center gap-1.5 pt-1">
                <i class="fa-solid fa-location-dot text-emerald-600 dark:text-emerald-400"></i>
                <span>{{ $potensi->location }}</span>
            </div>
        @endif

        <div class="pt-3 border-t border-slate-100 dark:border-slate-800">
            <a href="{{ route('potensi.show', $potensi->slug) }}" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#14532D] dark:text-emerald-400 hover:text-[#166534] dark:hover:text-emerald-300 transition-colors">
                <span>Lihat Detail Potensi</span>
                <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1.5 transition-transform duration-300"></i>
            </a>
        </div>
    </div>
</div>
