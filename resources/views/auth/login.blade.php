<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Desa Ketupat</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#14532D',
                        accent: '#22C55E'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden antialiased">
    <!-- Background Glow -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-emerald-800/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-md w-full relative z-10">
        <!-- Card -->
        <div class="bg-slate-900/90 backdrop-blur-xl rounded-3xl p-8 border border-slate-800 shadow-2xl space-y-6">
            
            <!-- Header -->
            <div class="text-center space-y-2">
                @php
                    $siteSetting = \App\Models\SiteSetting::first();
                    $logoUrl = ($siteSetting && $siteSetting->logo) 
                        ? asset('storage/' . $siteSetting->logo) 
                        : asset('images/logo.png');
                @endphp
                <img src="{{ $logoUrl }}" alt="Logo Desa" class="w-16 h-16 object-contain p-2 rounded-2xl bg-[#14532D] mx-auto shadow-lg border border-emerald-500/30">
                <h1 class="text-2xl font-extrabold text-white tracking-tight">Admin Portal</h1>
                <p class="text-xs text-slate-400">Website Resmi Desa Ketupat, Kecamatan Raas</p>
            </div>

            <!-- Error Alerts -->
            @if ($errors->any())
                <div class="p-4 rounded-2xl bg-rose-950/60 border border-rose-800 text-rose-300 text-xs space-y-1">
                    <div class="font-bold flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation"></i> Gagal Masuk:
                    </div>
                    @foreach ($errors->all() as $error)
                        <p>&bull; {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="p-4 rounded-2xl bg-emerald-950/60 border border-emerald-800 text-emerald-300 text-xs font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Alamat Email</label>
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@desaketupat.id" class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Kata Sandi</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                        <input type="password" id="password" name="password" required placeholder="••••••••" class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-800/80 border border-slate-700 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-700 bg-slate-800 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-xs text-slate-400 font-medium">Ingat Saya</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-sm shadow-xl transition-all duration-300 hover:scale-[1.02] flex items-center justify-center gap-2">
                    <span>Masuk ke Dashboard</span>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
            </form>

            <div class="pt-4 border-t border-slate-800 text-center">
                <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-emerald-400 transition-colors flex items-center justify-center gap-1.5 font-medium">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i> Kembali ke Website Publik
                </a>
            </div>

        </div>
    </div>
</body>
</html>
