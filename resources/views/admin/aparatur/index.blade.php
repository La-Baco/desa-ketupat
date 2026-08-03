@extends('layouts.admin')

@section('title', 'Kelola Aparatur Desa - Admin Desa Ketupat')
@section('page_title', 'Kelola Aparatur Desa')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <p class="text-xs text-slate-500">Daftar Kepala Desa dan Perangkat Desa Ketupat</p>
        <button onclick="openCreateAparaturModal()" class="px-5 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-bold shadow-md transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Aparatur</span>
        </button>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                    <th class="p-3 rounded-l-xl">Foto</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Jabatan</th>
                    <th class="p-3">Urutan</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 rounded-r-xl text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                @foreach($aparaturList as $ap)
                    @php
                        $photoUrl = $ap->photo ? (Str::startsWith($ap->photo, 'images/') ? asset($ap->photo) : asset('storage/' . $ap->photo)) : asset('images/placeholder.jpg');
                    @endphp
                    <tr>
                        <td class="p-3">
                            <img src="{{ $photoUrl }}" alt="{{ $ap->name }}" class="w-10 h-12 rounded-lg object-cover">
                        </td>
                        <td class="p-3 font-bold text-slate-900 dark:text-white">{{ $ap->name }}</td>
                        <td class="p-3 font-semibold text-emerald-600 dark:text-emerald-400">{{ $ap->position }}</td>
                        <td class="p-3">{{ $ap->order }}</td>
                        <td class="p-3">
                            @if($ap->is_active)
                                <span class="px-2.5 py-1 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 font-bold text-[10px]">Aktif</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full bg-rose-100 dark:bg-rose-950 text-rose-700 dark:text-rose-400 font-bold text-[10px]">Nonaktif</span>
                            @endif
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <script id="aparatur-data-{{ $ap->id }}" type="application/json">@json($ap)</script>
                                <button type="button" 
                                    onclick="openEditAparaturModal({{ $ap->id }})" 
                                    class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 hover:bg-amber-100 flex items-center justify-center transition" 
                                    title="Edit Aparatur">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </button>
                                <form action="{{ route('admin.aparatur.destroy', $ap->id) }}" method="POST" onsubmit="return confirm('Hapus data aparatur ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 hover:bg-rose-100 flex items-center justify-center transition" title="Hapus Aparatur">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- Modal Create Aparatur -->
<div id="modal-create-aparatur" onclick="if(event.target === this) closeCreateAparaturModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-emerald-600"></i> Tambah Aparatur Desa Baru
            </h3>
            <button onclick="closeCreateAparaturModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.aparatur.store') }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Nama Lengkap & Gelar</label>
                <input type="text" name="name" required placeholder="Contoh: Moh. Zainuddin, S.Pd." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Jabatan</label>
                <input type="text" name="position" required placeholder="Contoh: Sekretaris Desa / Kaur Keuangan" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi / Tugas Singkat</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Urutan Tampilan</label>
                    <input type="number" name="order" value="1" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>

                <div class="space-y-1.5 flex flex-col justify-end">
                    <label class="flex items-center gap-2 cursor-pointer pb-3">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded border-slate-400 text-emerald-600 focus:ring-emerald-500">
                        <span class="font-bold text-slate-700 dark:text-slate-300">Status Aktif</span>
                    </label>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Foto Resmi</label>
                <input type="file" name="photo" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeCreateAparaturModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold shadow-md">Simpan Aparatur</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Aparatur -->
<div id="modal-edit-aparatur" onclick="if(event.target === this) closeEditAparaturModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-amber-500"></i> Edit Data Aparatur Desa
            </h3>
            <button onclick="closeEditAparaturModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="form-edit-aparatur" method="POST" action="" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Nama Lengkap & Gelar</label>
                <input type="text" id="edit-ap-name" name="name" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Jabatan</label>
                <input type="text" id="edit-ap-position" name="position" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi / Tugas Singkat</label>
                <textarea id="edit-ap-description" name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Urutan Tampilan</label>
                    <input type="number" id="edit-ap-order" name="order" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>

                <div class="space-y-1.5 flex flex-col justify-end">
                    <label class="flex items-center gap-2 cursor-pointer pb-3">
                        <input type="checkbox" id="edit-ap-active" name="is_active" value="1" class="w-4 h-4 rounded border-slate-400 text-emerald-600 focus:ring-emerald-500">
                        <span class="font-bold text-slate-700 dark:text-slate-300">Status Aktif</span>
                    </label>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Foto Resmi (Biarkan kosong jika tidak diubah)</label>
                <input type="file" name="photo" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
                <div id="preview-ap-photo" class="mt-2"></div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeEditAparaturModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openCreateAparaturModal() {
        document.getElementById('modal-create-aparatur').classList.remove('hidden');
    }
    function closeCreateAparaturModal() {
        document.getElementById('modal-create-aparatur').classList.add('hidden');
    }

    function openEditAparaturModal(id) {
        const dataElem = document.getElementById(`aparatur-data-${id}`);
        if (!dataElem) return;
        const ap = JSON.parse(dataElem.textContent);
        const modal = document.getElementById('modal-edit-aparatur');
        const form = document.getElementById('form-edit-aparatur');
        
        form.action = `{{ url('admin/aparatur') }}/${ap.id}`;
        document.getElementById('edit-ap-name').value = ap.name || '';
        document.getElementById('edit-ap-position').value = ap.position || '';
        document.getElementById('edit-ap-description').value = ap.description || '';
        document.getElementById('edit-ap-order').value = ap.order || 1;
        document.getElementById('edit-ap-active').checked = Boolean(Number(ap.is_active));

        const previewContainer = document.getElementById('preview-ap-photo');
        if (ap.photo) {
            const src = ap.photo.startsWith('images/') ? `/${ap.photo}` : `/storage/${ap.photo}`;
            previewContainer.innerHTML = `<img src="${src}" class="h-16 rounded-lg object-cover">`;
        } else {
            previewContainer.innerHTML = '';
        }

        modal.classList.remove('hidden');
    }

    function closeEditAparaturModal() {
        document.getElementById('modal-edit-aparatur').classList.add('hidden');
    }
</script>
@endpush
@endsection
