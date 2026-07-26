@props(['gallery'])

@php
    $imageUrl = $gallery->image ? (Str::startsWith($gallery->image, 'images/') ? asset($gallery->image) : asset('storage/' . $gallery->image)) : asset('images/placeholder.jpg');
@endphp

<div onclick="openLightbox('{{ $imageUrl }}', '{{ addslashes($gallery->title) }}')" class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-emerald-600/30 dark:hover:shadow-emerald-500/30 border border-slate-200/80 dark:border-slate-800 cursor-pointer bg-slate-950 h-64 transition-all duration-300 transform hover:-translate-y-2">
    <img src="{{ $imageUrl }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90 group-hover:opacity-100 ease-out">
    
    <!-- Dark Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/40 to-transparent opacity-80 group-hover:opacity-95 transition-opacity duration-300"></div>

    <!-- Zoom Icon Badge -->
    <div class="absolute top-4 right-4 w-10 h-10 rounded-2xl bg-black/40 hover:bg-emerald-600 backdrop-blur-md text-white flex items-center justify-center transition-all duration-300 opacity-0 group-hover:opacity-100 scale-75 group-hover:scale-100 shadow-xl shadow-emerald-950/50 border border-white/20">
        <i class="fa-solid fa-magnifying-glass-plus text-sm"></i>
    </div>

    <!-- Caption Bottom -->
    <div class="absolute bottom-0 left-0 right-0 p-5 space-y-1 text-white transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
        <h4 class="font-bold text-base leading-snug drop-shadow-sm group-hover:text-emerald-400 transition-colors">
            {{ $gallery->title }}
        </h4>
        @if($gallery->event_date)
            <p class="text-xs text-slate-300/80 font-medium flex items-center gap-1.5">
                <i class="fa-regular fa-calendar-days text-emerald-400 text-[11px]"></i>
                {{ \Carbon\Carbon::parse($gallery->event_date)->translatedFormat('d F Y') }}
            </p>
        @endif
    </div>
</div>
