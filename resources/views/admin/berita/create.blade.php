@extends('layouts.admin')

@section('title', 'Tulis Berita Baru - Admin Desa Ketupat')
@section('page_title', 'Tulis Berita Desa Baru')

@section('content')
<div class="max-w-4xl bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Judul Berita</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Tuliskan judul berita yang menarik..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Kategori</label>
                <input type="text" name="category" value="{{ old('category', 'Pemerintahan') }}" required placeholder="Pemerintahan / Ekonomi / Lingkungan" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Status</label>
                <select name="status" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                    <option value="published" selected>Published (Terbitkan)</option>
                    <option value="draft">Draft (Simpan Konsep)</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Tanggal Publikasi</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Ringkasan / Excerpt</label>
            <textarea name="excerpt" rows="2" placeholder="Ringkasan singkat berita (opsional)..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('excerpt') }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Isi Berita Lengkap (HTML Didukung)</label>
            <textarea name="content" rows="10" required placeholder="Tuliskan berita secara lengkap..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('content') }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Gambar Sampul Berita</label>
            <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
        </div>

        <div class="pt-4 flex justify-between">
            <a href="{{ route('admin.berita.index') }}" class="px-5 py-2.5 rounded-2xl bg-slate-200 dark:bg-slate-700 text-xs font-bold">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-sm shadow-md">
                Terbitkan Berita
            </button>
        </div>
    </form>
</div>
@endsection
