@extends('layouts.admin')

@section('title', 'Ganti Password - Admin Desa Ketupat')
@section('page_title', 'Ganti Kata Sandi Akun')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header info -->
    <div class="bg-gradient-to-r from-[#14532D] to-emerald-800 text-white rounded-3xl p-6 shadow-md flex items-center justify-between">
        <div>
            <span class="px-3 py-1 rounded-full bg-emerald-700/50 border border-emerald-500/30 text-emerald-200 text-[10px] font-bold uppercase tracking-wider">Keamanan Akun</span>
            <h3 class="text-xl font-bold mt-2">Ubah Kata Sandi Anda</h3>
            <p class="text-xs text-emerald-100/80 mt-1">Pastikan Anda menggunakan kata sandi yang kuat dan tidak digunakan di situs lain.</p>
        </div>
        <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 border border-emerald-400/30 hidden sm:flex items-center justify-center text-emerald-300 text-2xl">
            <i class="fa-solid fa-key"></i>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
        <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Password Saat Ini -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Kata Sandi Saat Ini <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" name="current_password" required 
                           placeholder="Masukkan kata sandi lama Anda"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border @error('current_password') border-rose-500 @else border-slate-200 dark:border-slate-600 @enderror text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                @error('current_password')
                    <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Baru -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Kata Sandi Baru <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-key text-sm"></i>
                    </div>
                    <input type="password" name="password" required 
                           placeholder="Minimal 8 karakter"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border @error('password') border-rose-500 @else border-slate-200 dark:border-slate-600 @enderror text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                @error('password')
                    <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Konfirmasi Kata Sandi Baru <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-shield-halved text-sm"></i>
                    </div>
                    <input type="password" name="password_confirmation" required 
                           placeholder="Ulangi kata sandi baru Anda"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
            </div>

            <!-- Action Button -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-slate-700/50">
                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-xs shadow-md transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-check-double"></i>
                    <span>Perbarui Kata Sandi</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
