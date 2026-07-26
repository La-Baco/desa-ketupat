@extends('layouts.admin')

@section('title', 'Tambah Aparatur Desa - Admin Desa Ketupat')
@section('page_title', 'Tambah Aparatur Desa Baru')

@section('content')
<div class="max-w-2xl bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
    <form method="POST" action="{{ route('admin.aparatur.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Nama Lengkap & Gelar</label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Moh. Zainuddin, S.Pd." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Jabatan</label>
            <input type="text" name="position" value="{{ old('position') }}" required placeholder="Contoh: Sekretaris Desa / Kepala Desa / Kaur Keuangan" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Deskripsi / Tugas Singkat</label>
            <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Urutan Tampilan</label>
                <input type="number" name="order" value="{{ old('order', 1) }}" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-2 flex flex-col justify-end">
                <label class="flex items-center gap-2 cursor-pointer pb-3">
                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded border-slate-400 text-emerald-600 focus:ring-emerald-500">
                    <span class="text-xs font-bold text-slate-700 dark:text-slate-300">Status Aktif</span>
                </label>
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Foto Resmi</label>
            <input type="file" name="photo" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
        </div>

        <div class="pt-4 flex justify-between">
            <a href="{{ route('admin.aparatur.index') }}" class="px-5 py-2.5 rounded-2xl bg-slate-200 dark:bg-slate-700 text-xs font-bold">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-sm shadow-md">
                Simpan Aparatur
            </button>
        </div>
    </form>
</div>
@endsection
