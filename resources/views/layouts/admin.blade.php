<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Desa Ketupat</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#14532D',
                            50: '#F0FDF4',
                            100: '#DCFCE7',
                            500: '#22C55E',
                            600: '#166534',
                            700: '#15803D',
                            800: '#166534',
                            900: '#14532D',
                        },
                        accent: '#22C55E',
                        bgLight: '#F8FAFC',
                        textLight: '#1F2937',
                        bgDark: '#0F172A',
                        cardDark: '#1E293B',
                        textDark: '#F8FAFC'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* Utility class to hide scrollbars while keeping scroll functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>

    <!-- Theme Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    @stack('styles')
</head>
<body class="font-sans bg-slate-100 text-slate-800 dark:bg-slate-900 dark:text-slate-100 min-h-screen flex antialiased">

    <!-- Sidebar overlay mobile -->
    <div id="sidebar-backdrop" onclick="toggleAdminSidebar()" class="fixed inset-0 z-30 bg-black/50 hidden md:hidden"></div>

    <!-- Admin Sidebar -->
    <aside id="admin-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0 bg-[#14532D] text-white flex flex-col justify-between shadow-xl">
        <div class="overflow-y-auto py-5 px-4 flex-1 no-scrollbar">
            <!-- Brand -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 mb-6 border-b border-emerald-700/50 pb-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 font-bold text-xl border border-emerald-500/30">
                    <i class="fa-solid fa-tree"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg leading-tight tracking-wide text-white">Desa Ketupat</h1>
                    <p class="text-xs text-emerald-300 font-medium">Admin Portal System</p>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="space-y-1 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie text-lg w-6 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <div class="pt-3 pb-1 px-3 text-xs uppercase font-bold text-emerald-300/70 tracking-wider">Kelola Desa</div>

                <a href="{{ route('admin.profil.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.profil.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-landmark text-lg w-6 text-center"></i>
                    <span>Profil Desa</span>
                </a>

                <a href="{{ route('admin.statistik.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.statistik.index') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-chart-column text-lg w-6 text-center"></i>
                    <span>Statistik Desa</span>
                </a>

                <a href="{{ route('admin.aparatur.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.aparatur.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-users-gear text-lg w-6 text-center"></i>
                    <span>Aparatur Desa</span>
                </a>

                <div class="pt-3 pb-1 px-3 text-xs uppercase font-bold text-emerald-300/70 tracking-wider">Konten & Informasi</div>

                <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.berita.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-newspaper text-lg w-6 text-center"></i>
                    <span>Berita Desa</span>
                </a>

                <a href="{{ route('admin.agenda.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.agenda.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-calendar-days text-lg w-6 text-center"></i>
                    <span>Agenda Desa</span>
                </a>

                <a href="{{ route('admin.potensi.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.potensi.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-wheat-awn text-lg w-6 text-center"></i>
                    <span>Potensi Desa</span>
                </a>

                <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.galeri.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-images text-lg w-6 text-center"></i>
                    <span>Galeri Foto</span>
                </a>

                <div class="pt-3 pb-1 px-3 text-xs uppercase font-bold text-emerald-300/70 tracking-wider">Sistem</div>

                <a href="{{ route('admin.statistik-pengunjung.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.statistik-pengunjung.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-chart-line text-lg w-6 text-center"></i>
                    <span>Statistik Pengunjung</span>
                </a>

                <a href="{{ route('admin.pengaturan.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.pengaturan.*') ? 'bg-emerald-600 text-white font-semibold shadow-md' : 'text-emerald-100 hover:bg-emerald-800/60 hover:text-white' }}">
                    <i class="fa-solid fa-sliders text-lg w-6 text-center"></i>
                    <span>Pengaturan Website</span>
                </a>
            </nav>
        </div>

        <!-- Footer Sidebar -->
        <div class="p-4 border-t border-emerald-700/50 bg-emerald-950/40">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-2 text-xs font-semibold text-emerald-200 hover:text-white py-2 rounded-lg bg-emerald-800/50 hover:bg-emerald-700 transition">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>Lihat Website Publik</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 md:ml-64 flex flex-col min-h-screen">
        <!-- Top Navbar -->
        <header class="sticky top-0 z-20 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-700/60 px-4 py-3 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <button onclick="toggleAdminSidebar()" class="md:hidden text-slate-600 dark:text-slate-300 hover:text-emerald-600 text-xl p-1">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h2 class="font-bold text-lg text-slate-800 dark:text-slate-100">@yield('page_title', 'Dashboard Admin')</h2>
            </div>

            <div class="flex items-center gap-3">
                <!-- Theme Toggle Button -->
                <button onclick="toggleTheme()" class="w-9 h-9 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-amber-400 hover:bg-slate-200 dark:hover:bg-slate-600 flex items-center justify-center transition" title="Toggle Tema">
                    <i class="fa-solid fa-moon dark:hidden"></i>
                    <i class="fa-solid fa-sun hidden dark:block"></i>
                </button>

                <!-- User Profile & Logout -->
                <div class="flex items-center gap-3 pl-3 border-l border-slate-200 dark:border-slate-700">
                    <div class="hidden sm:block text-right">
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-100">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-[10px] text-emerald-600 dark:text-emerald-400 font-semibold uppercase">Admin Utama</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 hover:bg-rose-100 dark:hover:bg-rose-900/60 flex items-center justify-center transition" title="Logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 p-4 md:p-6">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 text-emerald-800 border border-emerald-200 dark:bg-emerald-950/50 dark:text-emerald-200 dark:border-emerald-800/60 flex items-center gap-3 shadow-sm">
                    <i class="fa-solid fa-circle-check text-emerald-600 dark:text-emerald-400 text-xl"></i>
                    <div class="font-medium text-sm">{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-rose-50 text-rose-800 border border-rose-200 dark:bg-rose-950/50 dark:text-rose-200 dark:border-rose-800/60 flex items-center gap-3 shadow-sm">
                    <i class="fa-solid fa-circle-exclamation text-rose-600 dark:text-rose-400 text-xl"></i>
                    <div class="font-medium text-sm">{{ session('error') }}</div>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Admin Footer -->
        <footer class="py-4 px-6 text-center text-xs text-slate-500 dark:text-slate-400 border-t border-slate-200 dark:border-slate-800">
            &copy; {{ date('Y') }} Pemerintah Desa Ketupat, Kecamatan Raas, Sumenep. All Rights Reserved.
        </footer>
    </div>

    <!-- Admin JS Scripts -->
    <script>
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
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
    @stack('scripts')
</body>
</html>
