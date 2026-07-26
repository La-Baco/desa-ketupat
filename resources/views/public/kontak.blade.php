@extends('layouts.app')

@section('title', 'Kontak Resmi Pemerintah Desa Ketupat')

@section('content')
    <!-- Banner Header -->
    <div class="relative py-20 bg-gradient-to-r from-[#14532D] via-[#166534] to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Kontak Desa Ketupat</h1>
            <p class="text-emerald-200 text-sm sm:text-base max-w-2xl mx-auto font-light">
                Hubungi Kantor Desa Ketupat untuk Informasi, Pertanyaan, dan Pelayanan Publik
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Contact Info Cards -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-800 space-y-6">
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-4">
                        Informasi Alamat & Kontak
                    </h3>

                    <div class="space-y-6 text-sm text-slate-600 dark:text-slate-300">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950/80 text-[#14532D] dark:text-emerald-400 flex items-center justify-center text-xl shrink-0 border border-emerald-200 dark:border-emerald-800/40">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 dark:text-white text-base">Alamat Kantor Desa</h4>
                                <p class="mt-1 leading-relaxed">{{ $settings->address ?? 'Jl. Raya Desa Ketupat No. 01, Kecamatan Raas, Kabupaten Sumenep, Jawa Timur 69493' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950/80 text-[#14532D] dark:text-emerald-400 flex items-center justify-center text-xl shrink-0 border border-emerald-200 dark:border-emerald-800/40">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 dark:text-white text-base">Telepon / WhatsApp</h4>
                                <p class="mt-1 font-mono font-bold text-emerald-600 dark:text-emerald-400">{{ $settings->phone ?? '+62 812-3456-7890' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950/80 text-[#14532D] dark:text-emerald-400 flex items-center justify-center text-xl shrink-0 border border-emerald-200 dark:border-emerald-800/40">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 dark:text-white text-base">Email Resmi</h4>
                                <p class="mt-1 font-medium">{{ $settings->email ?? 'kontak@desaketupat.id' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 space-y-3">
                        <h4 class="font-bold text-slate-900 dark:text-white text-sm">Media Sosial Resmi</h4>
                        <div class="flex items-center gap-3">
                            @if($settings->facebook ?? false)
                                <a href="{{ $settings->facebook }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-blue-600 text-white text-xs font-bold flex items-center gap-2 hover:bg-blue-700 transition">
                                    <i class="fa-brands fa-facebook-f"></i> Facebook
                                </a>
                            @endif
                            @if($settings->instagram ?? false)
                                <a href="{{ $settings->instagram }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-pink-600 text-white text-xs font-bold flex items-center gap-2 hover:bg-pink-700 transition">
                                    <i class="fa-brands fa-instagram"></i> Instagram
                                </a>
                            @endif
                            @if($settings->youtube ?? false)
                                <a href="{{ $settings->youtube }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-red-600 text-white text-xs font-bold flex items-center gap-2 hover:bg-red-700 transition">
                                    <i class="fa-brands fa-youtube"></i> YouTube
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jam Operasional & Peta Layanan -->
            <div class="lg:col-span-7 space-y-6">
                <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-800 space-y-6">
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-4 flex items-center gap-3">
                        <i class="fa-regular fa-clock text-emerald-600 dark:text-emerald-400"></i> Jam Pelayanan Kantor Desa
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div class="bg-slate-50 dark:bg-slate-800/80 p-5 rounded-2xl border border-slate-200 dark:border-slate-700">
                            <span class="font-bold text-slate-900 dark:text-white block mb-1">Senin - Kamis</span>
                            <span class="text-emerald-600 dark:text-emerald-400 font-extrabold text-lg">08.00 - 15.00 WIB</span>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800/80 p-5 rounded-2xl border border-slate-200 dark:border-slate-700">
                            <span class="font-bold text-slate-900 dark:text-white block mb-1">Jumat</span>
                            <span class="text-emerald-600 dark:text-emerald-400 font-extrabold text-lg">08.00 - 11.30 WIB</span>
                        </div>
                    </div>

                    <div class="pt-4 space-y-3">
                        <h4 class="font-bold text-slate-900 dark:text-white text-base">Lokasi Wilayah Desa Ketupat</h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300">
                            Desa Ketupat berada di wilayah kepulauan Raas, Kabupaten Sumenep. Dapat dijangkau via transportasi laut dari Pelabuhan Dungkek atau Pelabuhan Kalianget Sumenep.
                        </p>
                        <div class="rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 h-64 bg-slate-800 relative flex items-center justify-center text-white">
                            <div class="text-center p-6 space-y-2">
                                <i class="fa-solid fa-map-location-dot text-4xl text-emerald-400"></i>
                                <h5 class="font-bold text-lg">Peta Lokasi Desa Ketupat</h5>
                                <p class="text-xs text-slate-300">Pulau Raas, Kabupaten Sumenep, Jawa Timur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
