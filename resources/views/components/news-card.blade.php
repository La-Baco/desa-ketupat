@props(['news'])

@php
    $imageUrl = $news->image ? (Str::startsWith($news->image, 'images/') ? asset($news->image) : asset('storage/' . $news->image)) : asset('images/placeholder.jpg');
@endphp

<article class="bg-white dark:bg-[#1E293B] rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-emerald-600/20 dark:hover:shadow-emerald-500/20 border border-slate-200/80 dark:border-slate-800 transition-all duration-300 transform hover:-translate-y-2 flex flex-col group">
    <div class="relative h-48 sm:h-52 w-full overflow-hidden bg-slate-900">
        <img src="{{ $imageUrl }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        <div class="absolute top-4 left-4">
            <span class="px-3.5 py-1 rounded-full bg-[#14532D]/90 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md shadow-lg shadow-emerald-950/40 border border-emerald-500/30">
                {{ $news->category }}
            </span>
        </div>
    </div>
    
    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
        <div class="space-y-2.5">
            <div class="flex items-center gap-3 text-xs text-slate-500 dark:text-slate-400 font-medium">
                <span><i class="fa-regular fa-calendar-check text-emerald-600 dark:text-emerald-400 mr-1"></i> {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}</span>
                <span>&bull;</span>
                <span><i class="fa-regular fa-eye text-emerald-600 dark:text-emerald-400 mr-1"></i> {{ number_format($news->views) }} views</span>
            </div>
            
            <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-[#166534] dark:group-hover:text-emerald-400 transition-colors line-clamp-2 leading-snug">
                <a href="{{ route('berita.show', $news->slug) }}">
                    {{ $news->title }}
                </a>
            </h3>
            
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 line-clamp-3 leading-relaxed">
                {{ $news->excerpt ?? Str::limit(strip_tags($news->content), 120) }}
            </p>
        </div>

        <div class="pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
            <a href="{{ route('berita.show', $news->slug) }}" class="inline-flex items-center gap-2 text-xs font-extrabold text-[#14532D] dark:text-emerald-400 hover:text-[#166534] dark:hover:text-emerald-300 transition-colors">
                <span>Baca Selengkapnya</span>
                <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1.5 transition-transform duration-300"></i>
            </a>
        </div>
    </div>
</article>
