@extends('layouts.app')

@section('title', 'Profil Desa Ketupat - Sejarah, Visi, Misi & Wilayah')

@section('content')
    <!-- Banner Header -->
    <div class="relative py-20 bg-gradient-to-r from-[#14532D] via-[#166534] to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">PROFIL DESA KETUPAT</h1>
            <p class="text-emerald-200 text-sm sm:text-base max-w-2xl mx-auto font-light">
                Kecamatan Raas, Kabupaten Sumenep, Provinsi Jawa Timur
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

        <!-- Deskripsi & Foto Kantor -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-6 space-y-4">
                <span class="px-3.5 py-1 rounded-full bg-emerald-100 dark:bg-emerald-950/60 text-[#14532D] dark:text-emerald-400 text-xs font-bold uppercase tracking-wider border border-emerald-200 dark:border-emerald-800">
                    Gambaran Umum
                </span>
                <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white">Tentang Desa Ketupat</h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                    {{ $profile->deskripsi ?? 'Desa Ketupat adalah desa pesisir dan kepulauan di Kecamatan Raas, Kabupaten Sumenep yang kaya akan potensi hasil laut, perkebunan kelapa, serta usaha mikro kecil dan menengah.' }}
                </p>
            </div>
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white dark:border-slate-800 bg-slate-800">
                    @php
                        $fotoKantor = ($profile && $profile->foto_kantor) ? (Str::startsWith($profile->foto_kantor, 'images/') ? asset($profile->foto_kantor) : asset('storage/' . $profile->foto_kantor)) : asset('images/kantor.jpg');
                    @endphp
                    <img src="{{ $fotoKantor }}" alt="Kantor Desa Ketupat" class="w-full h-80 sm:h-96 object-cover">
                </div>
            </div>
        </div>

        <!-- Sejarah Desa -->
        <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 sm:p-12 shadow-sm border border-slate-200/80 dark:border-slate-800 space-y-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-950 text-[#14532D] dark:text-emerald-400 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-scroll"></i>
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Sejarah Desa Ketupat</h3>
            </div>
            <div class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base whitespace-pre-line">
                {{ $profile->sejarah ?? 'Desa Ketupat memiliki sejarah panjang dalam perkembangan wilayah kepulauan Raas...' }}
            </div>
        </div>

        <!-- Visi & Misi Detail -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-800 space-y-4">
                <h3 class="text-2xl font-extrabold text-[#14532D] dark:text-emerald-400 flex items-center gap-3">
                    <i class="fa-solid fa-eye"></i> Visi Desa
                </h3>
                <p class="text-slate-600 dark:text-slate-300 italic text-sm sm:text-base leading-relaxed bg-emerald-50 dark:bg-emerald-950/40 p-5 rounded-2xl border-l-4 border-[#22C55E]">
                    "{{ $profile->visi }}"
                </p>
            </div>

            <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-800 space-y-4">
                <h3 class="text-2xl font-extrabold text-[#14532D] dark:text-emerald-400 flex items-center gap-3">
                    <i class="fa-solid fa-bullseye"></i> Misi Desa
                </h3>
                <div class="text-slate-600 dark:text-slate-300 text-sm sm:text-base leading-relaxed whitespace-pre-line">
                    {{ $profile->misi }}
                </div>
            </div>
        </div>

    </div>
@endsection
