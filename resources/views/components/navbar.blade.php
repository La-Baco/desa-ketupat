@php
    $siteSetting = \App\Models\SiteSetting::first();
    $logoUrl = ($siteSetting && $siteSetting->logo) 
        ? asset('storage/' . $siteSetting->logo) 
        : asset('images/logo.png');
@endphp

<header class="sticky top-0 z-40 bg-white/90 dark:bg-[#0F172A]/90 backdrop-blur-xl border-b border-slate-200/80 dark:border-slate-800/80 transition-colors duration-300 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">
            <!-- Brand Logo & Name -->
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 group shrink-0">
                <img src="{{ $logoUrl }}" alt="Logo Desa Ketupat" class="h-11 w-11 object-contain p-1.5 rounded-xl shadow-md border border-emerald-600/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 bg-white/50 dark:bg-slate-800/50">
                <div class="flex flex-col">
                    <span class="font-extrabold text-lg sm:text-xl text-[#14532D] dark:text-emerald-400 tracking-tight leading-tight group-hover:text-[#166534] dark:group-hover:text-emerald-300 transition-colors">
                        DESA KETUPAT
                    </span>
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 font-medium tracking-wide">
                        Kec. Raas &bull; Kab. Sumenep
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Items -->
            <nav class="hidden xl:flex items-center gap-1 font-semibold text-sm">
                <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('home') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Beranda
                </a>
                <a href="{{ route('profil') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('profil') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Profil
                </a>
                <a href="{{ route('aparatur') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('aparatur') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Aparatur
                </a>
                <a href="{{ route('berita.index') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('berita.*') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Berita
                </a>
                <a href="{{ route('agenda.index') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('agenda.*') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Agenda
                </a>
                <a href="{{ route('potensi.index') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('potensi.*') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Potensi
                </a>
                <a href="{{ route('galeri.index') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('galeri.*') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Galeri
                </a>
                <a href="{{ route('kontak') }}" class="px-3.5 py-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('kontak') ? 'text-[#14532D] dark:text-emerald-400 font-extrabold bg-emerald-50 dark:bg-emerald-950/60 shadow-sm' : 'text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    Kontak
                </a>
            </nav>

            <!-- Search Bar + Actions -->
            <div class="flex items-center gap-2 sm:gap-3">

                <!-- Desktop Search Input Form -->
                <form action="{{ route('berita.index') }}" method="GET" class="hidden lg:flex items-center relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita desa..." class="w-48 xl:w-56 pl-9 pr-4 py-2 rounded-2xl bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-800 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:w-64 transition-all duration-300">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 text-slate-400 text-xs"></i>
                </form>

                <!-- Mobile / Tablet Search Modal Button Trigger -->
                <button onclick="toggleNavSearchModal()" aria-label="Cari Berita" class="lg:hidden w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-emerald-100 dark:hover:bg-slate-700 flex items-center justify-center transition-all duration-300 shadow-sm border border-slate-200 dark:border-slate-700">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </button>

                <!-- Theme Toggle Button -->
                <button onclick="toggleTheme()" aria-label="Toggle Theme" class="w-10 h-10 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-amber-400 hover:bg-emerald-100 dark:hover:bg-slate-700 flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-sm border border-slate-200 dark:border-slate-700">
                    <i class="fa-solid fa-moon text-lg dark:hidden"></i>
                    <i class="fa-solid fa-sun text-lg hidden dark:block"></i>
                </button>

                <!-- Admin Login Button -->
                <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-extrabold transition-all duration-300 shadow-md hover:shadow-emerald-900/40 hover:scale-105">
                    <i class="fa-solid fa-user-lock"></i>
                    <span>Admin</span>
                </a>

                <!-- Mobile Hamburger Button -->
                <button onclick="toggleMobileMenu()" aria-label="Open Navigation Menu" class="xl:hidden p-2.5 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:text-[#14532D] dark:hover:text-emerald-400 focus:outline-none transition">
                    <i class="fa-solid fa-bars text-xl" id="menu-icon-bars"></i>
                    <i class="fa-solid fa-xmark text-xl hidden" id="menu-icon-x"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Navigation -->
    <div id="mobile-menu" class="hidden xl:hidden bg-white/95 dark:bg-[#0F172A]/95 backdrop-blur-lg border-b border-slate-200 dark:border-slate-800 px-4 pt-3 pb-6 transition-all duration-300 shadow-xl space-y-3">
        
        <!-- Mobile Search Bar Input inside Menu -->
        <form action="{{ route('berita.index') }}" method="GET" class="relative">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita desa..." class="w-full pl-10 pr-4 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs text-slate-800 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
        </form>

        <nav class="flex flex-col space-y-1 text-sm font-semibold">
            <a href="{{ route('home') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('home') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-house w-6 text-center text-emerald-600"></i> Beranda
            </a>
            <a href="{{ route('profil') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('profil') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-landmark w-6 text-center text-emerald-600"></i> Profil Desa
            </a>
            <a href="{{ route('aparatur') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('aparatur') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-users w-6 text-center text-emerald-600"></i> Aparatur Desa
            </a>
            <a href="{{ route('berita.index') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('berita.*') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-newspaper w-6 text-center text-emerald-600"></i> Berita
            </a>
            <a href="{{ route('agenda.index') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('agenda.*') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-calendar-days w-6 text-center text-emerald-600"></i> Agenda
            </a>
            <a href="{{ route('potensi.index') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('potensi.*') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-wheat-awn w-6 text-center text-emerald-600"></i> Potensi Desa
            </a>
            <a href="{{ route('galeri.index') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('galeri.*') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-images w-6 text-center text-emerald-600"></i> Galeri
            </a>
            <a href="{{ route('kontak') }}" class="px-4 py-3 rounded-xl transition {{ request()->routeIs('kontak') ? 'bg-emerald-100 text-[#14532D] dark:bg-emerald-950/60 dark:text-emerald-400 font-bold' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                <i class="fa-solid fa-envelope w-6 text-center text-emerald-600"></i> Kontak
            </a>

            <div class="pt-3">
                <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-[#14532D] text-white text-sm font-bold shadow-md">
                    <i class="fa-solid fa-user-lock"></i> Login Admin
                </a>
            </div>
        </nav>
    </div>
</header>

<!-- Quick Search Overlay Modal (Mobile/Tablet) -->
<div id="nav-search-modal" onclick="if(event.target === this) toggleNavSearchModal()" class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-md flex items-start justify-center pt-20 p-4">
    <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-6 max-w-lg w-full shadow-2xl border border-slate-200 dark:border-slate-700 space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="font-extrabold text-base text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass text-emerald-600"></i> Cari Berita Desa
            </h3>
            <button onclick="toggleNavSearchModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form action="{{ route('berita.index') }}" method="GET" class="space-y-4">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" autofocus placeholder="Ketik kata kunci berita..." class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none text-slate-900 dark:text-white">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="toggleNavSearchModal()" class="px-4 py-2 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold text-xs">Batal</button>
                <button type="submit" class="px-5 py-2 rounded-xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-xs shadow-md">Cari Berita</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleNavSearchModal() {
        const modal = document.getElementById('nav-search-modal');
        modal.classList.toggle('hidden');
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const iconBars = document.getElementById('menu-icon-bars');
        const iconX = document.getElementById('menu-icon-x');
        
        menu.classList.toggle('hidden');
        iconBars.classList.toggle('hidden');
        iconX.classList.toggle('hidden');
    }

    function toggleTheme() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }
</script>
