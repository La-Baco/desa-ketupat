@extends('layouts.admin')

@section('title', 'Tambah Agenda - Admin Desa Ketupat')
@section('page_title', 'Tambah Agenda Kegiatan Baru')

@section('content')
<div class="max-w-3xl bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
    <form method="POST" action="{{ route('admin.agenda.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Judul Agenda / Kegiatan</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Posyandu Balita & Lansia Rutin Dusun I" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Tanggal Pelaksanaan</label>
                <input type="date" name="event_date" value="{{ old('event_date', date('Y-m-d')) }}" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Jam Mulai</label>
                <input type="text" name="start_time" value="{{ old('start_time', '08:00') }}" placeholder="08:00 WIB" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Jam Selesai</label>
                <input type="text" name="end_time" value="{{ old('end_time', '11:30') }}" placeholder="11:30 WIB / Selesai" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Lokasi Tempat Pelaksanaan</label>
            <input type="text" name="location" value="{{ old('location') }}" placeholder="Contoh: Balai Desa Ketupat / Poskesdes Dusun II" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Deskripsi / Detail Acara</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('description') }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300">Poster / Banner Acara (Opsional)</label>
            <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
        </div>

        <div class="pt-4 flex justify-between">
            <a href="{{ route('admin.agenda.index') }}" class="px-5 py-2.5 rounded-2xl bg-slate-200 dark:bg-slate-700 text-xs font-bold">Batal</a>
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold text-sm shadow-md">
                Simpan Agenda
            </button>
        </div>
    </form>
</div>
@endsection
