@extends('layouts.admin')

@section('title', 'Edit Foto Galeri - Admin Desa Ketupat')
@section('page_title', 'Edit Foto Galeri')

@section('content')
<div class="max-w-2xl bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
    <form method="POST" action="{{ route('admin.galeri.update', $galeri->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Judul / Caption Foto</label>
            <input type="text" name="title" value="{{ old('title', $galeri->title) }}" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Tanggal Kegiatan</label>
            <input type="date" name="event_date" value="{{ old('event_date', $galeri->event_date ? $galeri->event_date->format('Y-m-d') : '') }}" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Deskripsi Singkat (Opsional)</label>
            <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('description', $galeri->description) }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">File Foto</label>
            <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            @if($galeri->image)
                @php
                    $gImg = Str::startsWith($galeri->image, 'images/') ? asset($galeri->image) : asset('storage/' . $galeri->image);
                @endphp
                <img src="{{ $gImg }}" alt="Foto" class="h-32 rounded-xl object-cover mt-2">
            @endif
        </div>

        <div class="pt-4 flex justify-between">
            <a href="{{ route('admin.galeri.index') }}" class="px-5 py-2.5 rounded-2xl bg-slate-200 dark:bg-slate-700 text-xs font-bold">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-sm shadow-md">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
