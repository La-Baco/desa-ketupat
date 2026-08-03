@extends('layouts.admin')

@section('title', 'Kelola Galeri - Admin Desa Ketupat')
@section('page_title', 'Kelola Galeri Foto Desa')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <p class="text-xs text-slate-500">Daftar foto dokumentasi kegiatan dan keindahan Desa Ketupat</p>
        <button onclick="openCreateGaleriModal()" class="px-5 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-bold shadow-md transition flex items-center gap-2">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <span>Unggah Foto Baru</span>
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($galleries as $galeri)
            @php
                $gImg = $galeri->image ? (Str::startsWith($galeri->image, 'images/') ? asset($galeri->image) : asset('storage/' . $galeri->image)) : asset('images/placeholder.jpg');
            @endphp
            <div class="bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-sm border border-slate-200/80 dark:border-slate-700/60 flex flex-col justify-between">
                <div class="h-48 w-full bg-slate-900 overflow-hidden relative">
                    <img src="{{ $gImg }}" alt="{{ $galeri->title }}" class="w-full h-full object-cover">
                </div>

                <div class="p-5 space-y-2 flex-1 flex flex-col justify-between">
                    <div>
                        <h4 class="font-bold text-sm text-slate-900 dark:text-white leading-snug">{{ $galeri->title }}</h4>
                        @if($galeri->event_date)
                            <p class="text-[11px] text-slate-400 mt-1"><i class="fa-regular fa-calendar-days text-emerald-500 mr-1"></i> {{ \Carbon\Carbon::parse($galeri->event_date)->translatedFormat('d F Y') }}</p>
                        @endif
                    </div>

                    <div class="pt-3 border-t border-slate-100 dark:border-slate-700 flex justify-end gap-2">
                        <script id="galeri-data-{{ $galeri->id }}" type="application/json">@json($galeri)</script>
                        <button type="button"
                            onclick="openEditGaleriModal({{ $galeri->id }})" 
                            class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 hover:bg-amber-100 flex items-center justify-center transition" 
                            title="Edit Foto">
                            <i class="fa-solid fa-pen-to-square text-sm"></i>
                        </button>
                        <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Hapus foto galeri ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 hover:bg-rose-100 flex items-center justify-center transition" title="Hapus Foto">
                                <i class="fa-solid fa-trash-can text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pt-4">
        {{ $galleries->links() }}
    </div>

</div>

<!-- Modal Create Galeri -->
<div id="modal-create-galeri" onclick="if(event.target === this) closeCreateGaleriModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-lg w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-images text-emerald-600"></i> Unggah Foto Galeri Baru
            </h3>
            <button onclick="closeCreateGaleriModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Judul / Caption Foto</label>
                <input type="text" name="title" required placeholder="Judul foto..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Tanggal Kegiatan</label>
                <input type="date" name="event_date" value="{{ date('Y-m-d') }}" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi Singkat</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">File Foto</label>
                <input type="file" name="image" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeCreateGaleriModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold shadow-md">Unggah Foto</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Galeri -->
<div id="modal-edit-galeri" onclick="if(event.target === this) closeEditGaleriModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-lg w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-amber-500"></i> Edit Foto Galeri
            </h3>
            <button onclick="closeEditGaleriModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="form-edit-galeri" method="POST" action="" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Judul / Caption Foto</label>
                <input type="text" id="edit-ga-title" name="title" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Tanggal Kegiatan</label>
                <input type="date" id="edit-ga-event_date" name="event_date" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi Singkat</label>
                <textarea id="edit-ga-description" name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">File Foto (Biarkan kosong jika tidak diubah)</label>
                <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
                <div id="preview-ga-image" class="mt-2"></div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeEditGaleriModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openCreateGaleriModal() {
        document.getElementById('modal-create-galeri').classList.remove('hidden');
    }
    function closeCreateGaleriModal() {
        document.getElementById('modal-create-galeri').classList.add('hidden');
    }

    function openEditGaleriModal(id) {
        const dataElem = document.getElementById(`galeri-data-${id}`);
        if (!dataElem) return;
        const galeri = JSON.parse(dataElem.textContent);
        const modal = document.getElementById('modal-edit-galeri');
        const form = document.getElementById('form-edit-galeri');
        
        form.action = `{{ url('admin/galeri') }}/${galeri.id}`;
        document.getElementById('edit-ga-title').value = galeri.title || '';
        document.getElementById('edit-ga-event_date').value = galeri.event_date ? galeri.event_date.split('T')[0] : '';
        document.getElementById('edit-ga-description').value = galeri.description || '';

        const previewContainer = document.getElementById('preview-ga-image');
        if (galeri.image) {
            const src = galeri.image.startsWith('images/') ? `/${galeri.image}` : `/storage/${galeri.image}`;
            previewContainer.innerHTML = `<img src="${src}" class="h-20 rounded-lg object-cover">`;
        } else {
            previewContainer.innerHTML = '';
        }

        modal.classList.remove('hidden');
    }

    function closeEditGaleriModal() {
        document.getElementById('modal-edit-galeri').classList.add('hidden');
    }
</script>
@endpush
@endsection
