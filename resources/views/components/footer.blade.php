@php
    $siteSetting = \App\Models\SiteSetting::first();
    $logoUrl = ($siteSetting && $siteSetting->logo) 
        ? asset('storage/' . $siteSetting->logo) 
        : asset('images/logo.png');
@endphp

<footer class="bg-slate-950 text-slate-300 pt-16 pb-12 border-t border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Col 1: Identity -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <img src="{{ $logoUrl }}" alt="Logo Desa Ketupat" class="h-12 w-12 object-contain rounded-xl bg-white/10 p-1.5 border border-white/20 shadow-lg shadow-emerald-950/50">
                    <div>
                        <h3 class="font-extrabold text-xl text-white tracking-wide">DESA KETUPAT</h3>
                        <p class="text-xs text-emerald-400 font-semibold uppercase">Kecamatan Raas &bull; Sumenep</p>
                    </div>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    {{ $siteSetting->description ?? 'Website Resmi dan Portal Informasi Pemerintah Desa Ketupat, Kecamatan Raas, Kabupaten Sumenep, Jawa Timur.' }}
                </p>
                <div class="flex items-center gap-3 pt-2">
                    @if($siteSetting->facebook ?? false)
                        <a href="{{ $siteSetting->facebook }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-[#14532D] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-md hover:shadow-lg hover:shadow-emerald-600/30">
                            <i class="fa-brands fa-facebook-f text-sm"></i>
                        </a>
                    @endif
                    @if($siteSetting->instagram ?? false)
                        <a href="{{ $siteSetting->instagram }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-[#14532D] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-md hover:shadow-lg hover:shadow-emerald-600/30">
                            <i class="fa-brands fa-instagram text-sm"></i>
                        </a>
                    @endif
                    @if($siteSetting->youtube ?? false)
                        <a href="{{ $siteSetting->youtube }}" target="_blank" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-[#14532D] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-md hover:shadow-lg hover:shadow-emerald-600/30">
                            <i class="fa-brands fa-youtube text-sm"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Col 2: Navigasi Cepat -->
            <div>
                <h4 class="font-bold text-white text-base mb-4 relative inline-block after:content-[''] after:absolute after:-bottom-1.5 after:left-0 after:w-8 after:h-0.5 after:bg-emerald-500 shadow-sm shadow-emerald-500/20">
                    Navigasi Utama
                </h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Profil Desa</a></li>
                    <li><a href="{{ route('aparatur') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Aparatur Desa</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Berita Terkini</a></li>
                    <li><a href="{{ route('potensi.index') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Potensi Desa</a></li>
                </ul>
            </div>

            <!-- Col 3: Layanan Publik -->
            <div>
                <h4 class="font-bold text-white text-base mb-4 relative inline-block after:content-[''] after:absolute after:-bottom-1.5 after:left-0 after:w-8 after:h-0.5 after:bg-emerald-500 shadow-sm shadow-emerald-500/20">
                    Informasi Desa
                </h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('agenda.index') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Agenda Kegiatan</a></li>
                    <li><a href="{{ route('galeri.index') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Galeri Foto</a></li>
                    <li><a href="{{ route('kontak') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-emerald-500"></i> Kontak & Peta</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-emerald-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-lock text-xs text-emerald-500"></i> Portal Login Admin</a></li>
                </ul>
            </div>

            <!-- Col 4: Kontak Resmi -->
            <div>
                <h4 class="font-bold text-white text-base mb-4 relative inline-block after:content-[''] after:absolute after:-bottom-1.5 after:left-0 after:w-8 after:h-0.5 after:bg-emerald-500 shadow-sm shadow-emerald-500/20">
                    Kontak Resmi
                </h4>
                <ul class="space-y-3 text-xs sm:text-sm text-slate-400">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-emerald-400 mt-1"></i>
                        <span>{{ $siteSetting->address ?? 'Jl. Raya Desa Ketupat No. 01, Kecamatan Raas, Kabupaten Sumenep, Jawa Timur 69493' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-emerald-400"></i>
                        <span>{{ $siteSetting->phone ?? '+62 812-3456-7890' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-emerald-400"></i>
                        <span>{{ $siteSetting->email ?? 'kontak@desaketupat.id' }}</span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
            <p>&copy; {{ date('Y') }} Pemerintah Desa Ketupat, Kecamatan Raas. All Rights Reserved.</p>
            <p>Dikembangkan untuk Kesejahteraan & Transparansi Informasi Masyarakat Desa Ketupat.</p>
        </div>
    </div>
</footer>
