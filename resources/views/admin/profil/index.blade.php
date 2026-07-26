@extends('layouts.admin')

@section('title', 'Kelola Profil Desa - Admin Desa Ketupat')
@section('page_title', 'Kelola Profil & Sejarah Desa')

@section('content')
<div class="max-w-4xl bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
    <form method="POST" action="{{ route('admin.profil.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Deskripsi Singkat Desa</label>
            <textarea name="deskripsi" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('deskripsi', $profile->deskripsi) }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Sejarah Desa</label>
            <textarea name="sejarah" rows="6" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('sejarah', $profile->sejarah) }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Visi Desa</label>
            <textarea name="visi" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('visi', $profile->visi) }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Misi Desa (Tuliskan per poin)</label>
            <textarea name="misi" rows="5" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('misi', $profile->misi) }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Sambutan Kepala Desa</label>
            <textarea name="sambutan" rows="6" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('sambutan', $profile->sambutan) }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Foto Kantor Desa</label>
            <input type="file" name="foto_kantor" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            @if($profile->foto_kantor)
                @php
                    $fUrl = Str::startsWith($profile->foto_kantor, 'images/') ? asset($profile->foto_kantor) : asset('storage/' . $profile->foto_kantor);
                @endphp
                <img src="{{ $fUrl }}" alt="Foto Kantor" class="h-32 rounded-xl object-cover mt-2">
            @endif
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-sm shadow-md transition-all">
                Simpan Profil Desa
            </button>
        </div>
    </form>
</div>
@endsection
