@extends('layouts.admin')

@section('title', 'Edit Admin - Admin Desa Ketupat')
@section('page_title', 'Edit Data Admin')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100">Edit Akun Admin: {{ $user->name }}</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">Perbarui informasi profil dan hak akses pengelola</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-200 text-xs font-bold hover:bg-slate-200 dark:hover:bg-slate-600 transition flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Lengkap -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Nama Lengkap Admin <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required 
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
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required 
                           class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border @error('email') border-rose-500 @else border-slate-200 dark:border-slate-600 @enderror text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                @error('email')
                    <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Separator info untuk ubah password -->
            <div class="pt-4 border-t border-slate-100 dark:border-slate-700/50">
                <p class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">Reset Kata Sandi (Opsional)</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">Biarkan kolom di bawah ini kosong jika Anda tidak ingin mengubah kata sandi akun ini.</p>
                
                <div class="space-y-4">
                    <!-- Password Baru -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Kata Sandi Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-key"></i>
                            </div>
                            <input type="password" name="password" 
                                   placeholder="Minimal 8 karakter (Opsional)"
                                   class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border @error('password') border-rose-500 @else border-slate-200 dark:border-slate-600 @enderror text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                        </div>
                        @error('password')
                            <p class="text-xs text-rose-500 font-medium mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Konfirmasi Kata Sandi Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <input type="password" name="password_confirmation" 
                                   placeholder="Ulangi kata sandi baru"
                                   class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-slate-700/50">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-3 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold hover:bg-slate-200 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-xs shadow-md transition-all flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
