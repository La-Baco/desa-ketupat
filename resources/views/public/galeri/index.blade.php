@extends('layouts.app')

@section('title', 'Galeri Foto Desa Ketupat - Dokumentasi Kegiatan & Keindahan Desa')

@section('content')
    <!-- Banner Header -->
    <div class="relative py-20 bg-gradient-to-r from-[#14532D] via-[#166534] to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Galeri Desa Ketupat</h1>
            <p class="text-emerald-200 text-sm sm:text-base max-w-2xl mx-auto font-light">
                Dokumentasi Foto Kegiatan Kemasyarakatan, Pembangunan, dan Panorama Desa
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleries as $gallery)
                <x-gallery-card :gallery="$gallery" />
            @empty
                <div class="col-span-3 text-center py-16 bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-200 dark:border-slate-800">
                    <i class="fa-solid fa-images text-5xl text-slate-300 dark:text-slate-600 mb-3"></i>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Belum ada foto dalam galeri.</p>
                </div>
            @endforelse
        </div>

        <div class="pt-6">
            {{ $galleries->links() }}
        </div>
    </div>
@endsection
