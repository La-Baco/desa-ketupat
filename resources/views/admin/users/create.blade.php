@extends('layouts.admin')

@section('title', 'Tambah Admin Baru - Admin Desa Ketupat')
@section('page_title', 'Tambah Admin Baru')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100">Form Pendaftaran Admin</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">Buat akun pengelola baru untuk Admin Portal Desa Ketupat</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-200 text-xs font-bold hover:bg-slate-200 dark:hover:bg-slate-600 transition flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
            @csrf

            <!-- Nama Lengkap -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Nama Lengkap Admin <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                           placeholder="Contoh: Ahmad Subagyo"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border @error('name') border-rose-500 @else border-slate-200 dark:border-slate-600 @enderror text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                @error('name')
                    <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Alamat Email <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           placeholder="admin@desaketupat.id"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border @error('email') border-rose-500 @else border-slate-200 dark:border-slate-600 @enderror text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                @error('email')
                    <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Kata Sandi <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="password" name="password" required 
                           placeholder="Minimal 8 karakter"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border @error('password') border-rose-500 @else border-slate-200 dark:border-slate-600 @enderror text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                @error('password')
                    <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Konfirmasi Kata Sandi <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <input type="password" name="password_confirmation" required 
                           placeholder="Ulangi kata sandi di atas"
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-slate-700/50">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-3 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold hover:bg-slate-200 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-xs shadow-md transition-all flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Akun Admin</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
