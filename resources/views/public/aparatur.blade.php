@extends('layouts.app')

@section('title', 'Aparatur Desa Ketupat - Struktur Organisasi Pemerintah Desa')

@section('content')
    <!-- Banner Header -->
    <div class="relative py-20 bg-gradient-to-r from-[#14532D] via-[#166534] to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Aparatur Desa Ketupat</h1>
            <p class="text-emerald-200 text-sm sm:text-base max-w-2xl mx-auto font-light">
                Struktur Organisasi dan Perangkat Pemerintahan Desa Ketupat, Kecamatan Raas
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

        @if($kades)
            <!-- Section Kepala Desa -->
            <div class="text-center max-w-xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Pimpinan Pemerintahan</span>
                <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-1">Kepala Desa Ketupat</h2>
            </div>

            <div class="max-w-3xl mx-auto bg-white dark:bg-[#1E293B] rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-200/80 dark:border-slate-800 flex flex-col md:flex-row items-center gap-8">
                <div class="w-48 h-60 rounded-2xl overflow-hidden shadow-lg shrink-0 bg-slate-800 border-2 border-emerald-500">
                    @php
                        $kadesImg = $kades->photo ? (Str::startsWith($kades->photo, 'images/') ? asset($kades->photo) : asset('storage/' . $kades->photo)) : asset('images/kades.jpg');
                    @endphp
                    <img src="{{ $kadesImg }}" alt="{{ $kades->name }}" class="w-full h-full object-cover">
                </div>
                <div class="space-y-3 text-center md:text-left">
                    <span class="px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-[#14532D] dark:text-emerald-400 text-xs font-extrabold uppercase">
                        {{ $kades->position }}
                    </span>
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $kades->name }}</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                        {{ $kades->description ?? 'Memimpin jalannya pemerintahan Desa Ketupat secara berintegritas dan melayani masyarakat sepenuh hati.' }}
                    </p>
                </div>
            </div>
        @endif

        <!-- Perangkat Desa Lainnya -->
        <div class="pt-8">
            <div class="text-center max-w-xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Jajaran Perangkat</span>
                <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-1">Perangkat Desa Ketupat</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($aparaturList->where('position', '!=', 'Kepala Desa') as $aparatur)
                    @php
                        $photoUrl = $aparatur->photo ? (Str::startsWith($aparatur->photo, 'images/') ? asset($aparatur->photo) : asset('storage/' . $aparatur->photo)) : asset('images/placeholder.jpg');
                    @endphp
                    <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-6 shadow-sm hover:shadow-xl border border-slate-200/80 dark:border-slate-800 transition-all duration-300 transform hover:-translate-y-1.5 flex flex-col items-center text-center group">
                        <div class="w-32 h-40 rounded-2xl overflow-hidden shadow-md mb-4 bg-slate-800 group-hover:scale-105 transition-transform duration-300">
                            <img src="{{ $photoUrl }}" alt="{{ $aparatur->name }}" class="w-full h-full object-cover">
                        </div>
                        <span class="px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-[#14532D] dark:text-emerald-400 text-[11px] font-extrabold uppercase mb-2 border border-emerald-200 dark:border-emerald-800/40">
                            {{ $aparatur->position }}
                        </span>
                        <h4 class="font-extrabold text-lg text-slate-900 dark:text-white group-hover:text-[#166534] dark:group-hover:text-emerald-400 transition-colors">
                            {{ $aparatur->name }}
                        </h4>
                        @if($aparatur->description)
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-3 leading-relaxed">
                                {{ $aparatur->description }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
