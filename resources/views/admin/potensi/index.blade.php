@extends('layouts.admin')

@section('title', 'Kelola Potensi Desa - Admin Desa Ketupat')
@section('page_title', 'Kelola Potensi & Produk Unggulan')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <p class="text-xs text-slate-500">Daftar potensi sektor perikanan, pertanian, UMKM, wisata, dan kerajinan</p>
        <button onclick="openCreatePotensiModal()" class="px-5 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-bold shadow-md transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Potensi Baru</span>
        </button>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                    <th class="p-3 rounded-l-xl">Gambar</th>
                    <th class="p-3">Nama Potensi</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3">Lokasi Sentra</th>
                    <th class="p-3">Unggulan (Homepage)</th>
                    <th class="p-3 rounded-r-xl text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                @foreach($potensis as $pot)
                    @php
                        $pImg = $pot->image ? (Str::startsWith($pot->image, 'images/') ? asset($pot->image) : asset('storage/' . $pot->image)) : asset('images/placeholder.jpg');
                    @endphp
                    <tr>
                        <td class="p-3">
                            <img src="{{ $pImg }}" alt="{{ $pot->name }}" class="w-12 h-10 rounded-lg object-cover">
                        </td>
                        <td class="p-3 font-bold text-slate-900 dark:text-white">{{ $pot->name }}</td>
                        <td class="p-3 font-semibold text-emerald-600 dark:text-emerald-400">{{ $pot->category }}</td>
                        <td class="p-3 text-slate-500">{{ $pot->location ?? '-' }}</td>
                        <td class="p-3">
                            @if($pot->is_featured)
                                <span class="px-2.5 py-1 rounded-full bg-amber-100 dark:bg-amber-950 text-amber-700 dark:text-amber-400 font-bold text-[10px]">Ya (Homepage)</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-500 font-bold text-[10px]">Tidak</span>
                            @endif
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('potensi.show', $pot->slug) }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 hover:bg-blue-100 flex items-center justify-center transition" title="Lihat Potensi">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <script id="potensi-data-{{ $pot->id }}" type="application/json">@json($pot)</script>
                                <button type="button"
                                    onclick="openEditPotensiModal({{ $pot->id }})" 
                                    class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 hover:bg-amber-100 flex items-center justify-center transition" 
                                    title="Edit Potensi">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </button>
                                <form action="{{ route('admin.potensi.destroy', $pot->id) }}" method="POST" onsubmit="return confirm('Hapus potensi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 hover:bg-rose-100 flex items-center justify-center transition" title="Hapus Potensi">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pt-4">
            {{ $potensis->links() }}
        </div>
    </div>

</div>

<!-- Modal Create Potensi -->
<div id="modal-create-potensi" onclick="if(event.target === this) closeCreatePotensiModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-wheat-awn text-emerald-600"></i> Tambah Potensi Desa Baru
            </h3>
            <button onclick="closeCreatePotensiModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.potensi.store') }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Nama Potensi / Produk</label>
                <input type="text" name="name" required placeholder="Contoh: Hasil Laut & Budidaya Ikan Kerapu" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Kategori</label>
                    <select name="category" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="Perikanan">Perikanan</option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="UMKM">UMKM</option>
                        <option value="Wisata">Wisata</option>
                        <option value="Kerajinan">Kerajinan</option>
                        <option value="Produk Unggulan">Produk Unggulan</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Lokasi Sentra</label>
                    <input type="text" name="location" placeholder="Lokasi..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi Potensi</label>
                <textarea name="description" rows="4" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" checked class="w-4 h-4 rounded border-slate-400 text-emerald-600 focus:ring-emerald-500">
                    <span class="font-bold text-slate-700 dark:text-slate-300">Tampilkan di Homepage sebagai Potensi Unggulan</span>
                </label>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Foto Potensi</label>
                <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeCreatePotensiModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold shadow-md">Simpan Potensi</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Potensi -->
<div id="modal-edit-potensi" onclick="if(event.target === this) closeEditPotensiModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-amber-500"></i> Edit Potensi Desa
            </h3>
            <button onclick="closeEditPotensiModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="form-edit-potensi" method="POST" action="" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Nama Potensi / Produk</label>
                <input type="text" id="edit-po-name" name="name" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Kategori</label>
                    <select id="edit-po-category" name="category" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="Perikanan">Perikanan</option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="UMKM">UMKM</option>
                        <option value="Wisata">Wisata</option>
                        <option value="Kerajinan">Kerajinan</option>
                        <option value="Produk Unggulan">Produk Unggulan</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Lokasi Sentra</label>
                    <input type="text" id="edit-po-location" name="location" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi Potensi</label>
                <textarea id="edit-po-description" name="description" rows="4" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="edit-po-featured" name="is_featured" value="1" class="w-4 h-4 rounded border-slate-400 text-emerald-600 focus:ring-emerald-500">
                    <span class="font-bold text-slate-700 dark:text-slate-300">Tampilkan di Homepage sebagai Potensi Unggulan</span>
                </label>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Foto Potensi (Biarkan kosong jika tidak diubah)</label>
                <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
                <div id="preview-po-image" class="mt-2"></div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeEditPotensiModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openCreatePotensiModal() {
        document.getElementById('modal-create-potensi').classList.remove('hidden');
    }
    function closeCreatePotensiModal() {
        document.getElementById('modal-create-potensi').classList.add('hidden');
    }

    function openEditPotensiModal(id) {
        const dataElem = document.getElementById(`potensi-data-${id}`);
        if (!dataElem) return;
        const pot = JSON.parse(dataElem.textContent);
        const modal = document.getElementById('modal-edit-potensi');
        const form = document.getElementById('form-edit-potensi');
        
        form.action = `{{ url('admin/potensi') }}/${pot.id}`;
        document.getElementById('edit-po-name').value = pot.name || '';
        document.getElementById('edit-po-category').value = pot.category || 'Perikanan';
        document.getElementById('edit-po-location').value = pot.location || '';
        document.getElementById('edit-po-description').value = pot.description || '';
        document.getElementById('edit-po-featured').checked = Boolean(Number(pot.is_featured));

        const previewContainer = document.getElementById('preview-po-image');
        if (pot.image) {
            const src = pot.image.startsWith('images/') ? `/${pot.image}` : `/storage/${pot.image}`;
            previewContainer.innerHTML = `<img src="${src}" class="h-20 rounded-lg object-cover">`;
        } else {
            previewContainer.innerHTML = '';
        }

        modal.classList.remove('hidden');
    }

    function closeEditPotensiModal() {
        document.getElementById('modal-edit-potensi').classList.add('hidden');
    }
</script>
@endpush
@endsection
