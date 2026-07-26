@extends('layouts.app')

@section('title', $berita->title . ' - Berita Desa Ketupat')
@section('meta_description', Str::limit(strip_tags($berita->excerpt ?? $berita->content), 150))

@section('content')
    <!-- Banner Header -->
    <div class="relative py-16 bg-gradient-to-r from-[#14532D] via-[#166534] to-slate-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-emerald-300 hover:text-white text-xs font-bold transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
            </a>
            <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs font-bold uppercase tracking-wider">
                {{ $berita->category }}
            </span>
            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-snug">
                {{ $berita->title }}
            </h1>
            <div class="flex items-center gap-4 text-xs text-slate-300 font-medium pt-2 border-t border-white/10">
                <span><i class="fa-regular fa-calendar-check text-emerald-400 mr-1.5"></i> {{ $berita->published_at ? $berita->published_at->format('d M Y') : $berita->created_at->format('d M Y') }}</span>
                <span>&bull;</span>
                <span><i class="fa-regular fa-eye text-emerald-400 mr-1.5"></i> Dibaca {{ number_format($berita->views) }} kali</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Content Area -->
            <div class="lg:col-span-8 space-y-8">
                @php
                    $imageUrl = $berita->image ? (Str::startsWith($berita->image, 'images/') ? asset($berita->image) : asset('storage/' . $berita->image)) : asset('images/placeholder.jpg');
                @endphp
                <div class="rounded-3xl overflow-hidden shadow-2xl bg-slate-900 border border-slate-200 dark:border-slate-800">
                    <img src="{{ $imageUrl }}" alt="{{ $berita->title }}" class="w-full max-h-[500px] object-cover">
                </div>

                <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 sm:p-10 shadow-sm border border-slate-200/80 dark:border-slate-800 prose dark:prose-invert max-w-none text-slate-700 dark:text-slate-200 leading-relaxed space-y-4">
                    {!! $berita->content !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-800 space-y-6">
                    <h3 class="font-extrabold text-lg text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3 flex items-center gap-2">
                        <i class="fa-solid fa-newspaper text-emerald-600 dark:text-emerald-400"></i> Berita Terkait & Terkini
                    </h3>

                    <div class="space-y-4">
                        @foreach($recentBerita as $recent)
                            @php
                                $rImg = $recent->image ? (Str::startsWith($recent->image, 'images/') ? asset($recent->image) : asset('storage/' . $recent->image)) : asset('images/placeholder.jpg');
                            @endphp
                            <a href="{{ route('berita.show', $recent->slug) }}" class="flex gap-4 group items-center">
                                <div class="w-20 h-20 rounded-2xl overflow-hidden bg-slate-800 shrink-0">
                                    <img src="{{ $rImg }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                </div>
                                <div class="space-y-1">
                                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">{{ $recent->category }}</span>
                                    <h4 class="font-bold text-xs sm:text-sm text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors line-clamp-2 leading-snug">
                                        {{ $recent->title }}
                                    </h4>
                                    <p class="text-[11px] text-slate-400">{{ $recent->published_at ? $recent->published_at->format('d M Y') : $recent->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
