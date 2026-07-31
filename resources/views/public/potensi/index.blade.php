@extends('layouts.app')

@section('title', 'Potensi Desa Ketupat - Perikanan, UMKM, Wisata & Produk Unggulan')

@section('content')
    <!-- Banner Header -->
    <div class="relative py-20 bg-gradient-to-r from-[#14532D] via-[#166534] to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">POTENSI DESA KETUPAT</h1>
            <p class="text-emerald-200 text-sm sm:text-base max-w-2xl mx-auto font-light">
                Kekayaan Alam, Sektor Perikanan, Wisata Bahari, dan Produk Unggulan UMKM
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12">

        <!-- Category Filters -->
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('potensi.index') }}" class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ !request('category') ? 'bg-[#14532D] text-white shadow-md' : 'bg-white dark:bg-[#1E293B] text-slate-700 dark:text-slate-200 hover:bg-slate-100 border border-slate-200 dark:border-slate-800' }}">
                Semua Potensi
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('potensi.index', ['category' => $cat]) }}" class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ request('category') == $cat ? 'bg-[#14532D] text-white shadow-md' : 'bg-white dark:bg-[#1E293B] text-slate-700 dark:text-slate-200 hover:bg-slate-100 border border-slate-200 dark:border-slate-800' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Grid Potensi -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($potensis as $potensi)
                <x-potensi-card :potensi="$potensi" />
            @empty
                <div class="col-span-4 text-center py-16 bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200 dark:border-slate-800">
                    <i class="fa-solid fa-wheat-awn text-5xl text-slate-300 dark:text-slate-600 mb-3"></i>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Belum ada potensi terdaftar pada kategori ini.</p>
                </div>
            @endforelse
        </div>

        <div class="pt-6">
            {{ $potensis->links() }}
        </div>
    </div>
@endsection
