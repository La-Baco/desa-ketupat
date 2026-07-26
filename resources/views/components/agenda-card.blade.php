@props(['agenda'])

@php
    $eventDate = \Carbon\Carbon::parse($agenda->event_date);
@endphp

<div class="bg-white dark:bg-[#1E293B] rounded-3xl p-6 shadow-sm hover:shadow-xl border border-slate-200/80 dark:border-slate-800 transition-all duration-300 transform hover:-translate-y-1.5 flex items-start gap-5 group">
    <!-- Date Box -->
    <div class="w-16 h-20 rounded-2xl bg-[#14532D] text-white flex flex-col items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform">
        <span class="text-2xl font-extrabold leading-none">{{ $eventDate->format('d') }}</span>
        <span class="text-[11px] font-bold uppercase tracking-widest text-emerald-300 mt-1">{{ $eventDate->translatedFormat('M') }}</span>
        <span class="text-[9px] text-emerald-200/70">{{ $eventDate->format('Y') }}</span>
    </div>

    <!-- Content -->
    <div class="space-y-2 flex-1">
        <h3 class="font-bold text-base text-slate-900 dark:text-white group-hover:text-[#166534] dark:group-hover:text-emerald-400 transition-colors leading-snug">
            {{ $agenda->title }}
        </h3>
        
        @if($agenda->description)
            <p class="text-xs text-slate-600 dark:text-slate-300 line-clamp-2 leading-relaxed">
                {{ $agenda->description }}
            </p>
        @endif

        <div class="pt-2 flex flex-wrap items-center gap-x-4 gap-y-1.5 text-xs text-slate-500 dark:text-slate-400 font-medium">
            @if($agenda->start_time)
                <span class="flex items-center gap-1.5">
                    <i class="fa-regular fa-clock text-emerald-600 dark:text-emerald-400"></i>
                    {{ $agenda->start_time }} {{ $agenda->end_time ? '- '.$agenda->end_time : 'WIB' }}
                </span>
            @endif
            @if($agenda->location)
                <span class="flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-emerald-600 dark:text-emerald-400"></i>
                    {{ $agenda->location }}
                </span>
            @endif
        </div>
    </div>
</div>
