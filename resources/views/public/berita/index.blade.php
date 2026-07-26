@extends('layouts.app')

@section('title', 'Berita Desa Ketupat - Kabar Pembangunan & Informasi Terkini')

@section('content')
    <!-- Banner Header -->
    <div class="relative py-20 bg-gradient-to-r from-[#14532D] via-[#166534] to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Berita Desa Ketupat</h1>
            <p class="text-emerald-200 text-sm sm:text-base max-w-2xl mx-auto font-light">
                Informasi Resmi, Pengumuman, dan Kabar Pembangunan Terkini
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12">

        <!-- Search & Filter Form -->
        <form method="GET" action="{{ route('berita.index') }}" class="bg-white dark:bg-[#1E293B] rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-800 flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="relative flex-1 w-full">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul atau kata kunci berita..." class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#22C55E]">
            </div>

            <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
                <select name="category" class="px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#22C55E]">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>

                <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-sm shadow-md transition-all">
                    Filter
                </button>
                @if(request('q') || request('category'))
                    <a href="{{ route('berita.index') }}" class="px-4 py-3 rounded-2xl bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-200 text-sm font-semibold hover:bg-slate-300">
                        Reset
                    </a>
                @endif
            </div>
        </form>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($beritaList as $news)
                <x-news-card :news="$news" />
            @empty
                <div class="col-span-3 text-center py-16 bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200 dark:border-slate-800">
                    <i class="fa-regular fa-newspaper text-5xl text-slate-300 dark:text-slate-600 mb-3"></i>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Tidak ada berita ditemukan yang sesuai kriteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pt-6">
            {{ $beritaList->links() }}
        </div>

    </div>
@endsection
