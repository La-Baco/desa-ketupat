@extends('layouts.admin')

@section('title', 'Kelola Berita - Admin Desa Ketupat')
@section('page_title', 'Kelola Berita & Informasi Desa')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <p class="text-xs text-slate-500">Daftar publikasi berita dan kabar desa</p>
        <button onclick="openCreateBeritaModal()" class="px-5 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-bold shadow-md transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tulis Berita Baru</span>
        </button>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                    <th class="p-3 rounded-l-xl">Gambar</th>
                    <th class="p-3">Judul Berita</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3">Tanggal Publish</th>
                    <th class="p-3">Views</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 rounded-r-xl text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                @foreach($beritaList as $news)
                    @php
                        $bImg = $news->image ? (Str::startsWith($news->image, 'images/') ? asset($news->image) : asset('storage/' . $news->image)) : asset('images/placeholder.jpg');
                    @endphp
                    <tr>
                        <td class="p-3">
                            <img src="{{ $bImg }}" alt="{{ $news->title }}" class="w-12 h-10 rounded-lg object-cover">
                        </td>
                        <td class="p-3 font-bold text-slate-900 dark:text-white max-w-xs truncate">{{ $news->title }}</td>
                        <td class="p-3 font-semibold text-emerald-600 dark:text-emerald-400">{{ $news->category }}</td>
                        <td class="p-3 text-slate-400">{{ $news->published_at ? $news->published_at->format('d/m/Y H:i') : '-' }}</td>
                        <td class="p-3 font-bold text-purple-600 dark:text-purple-400">{{ number_format($news->views) }}</td>
                        <td class="p-3">
                            @if($news->status === 'published')
                                <span class="px-2.5 py-1 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 font-bold text-[10px]">Published</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold text-[10px]">Draft</span>
                            @endif
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('berita.show', $news->slug) }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 hover:bg-blue-100 flex items-center justify-center transition" title="Lihat Berita">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <script id="berita-data-{{ $news->id }}" type="application/json">@json($news)</script>
                                <button type="button" 
                                    onclick="openEditBeritaModal({{ $news->id }})" 
                                    class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 hover:bg-amber-100 flex items-center justify-center transition" 
                                    title="Edit Berita">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </button>
                                <form action="{{ route('admin.berita.destroy', $news->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 hover:bg-rose-100 flex items-center justify-center transition" title="Hapus Berita">
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
            {{ $beritaList->links() }}
        </div>
    </div>

</div>

<!-- Modal Create Berita -->
<div id="modal-create-berita" onclick="if(event.target === this) closeCreateBeritaModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-2xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-newspaper text-emerald-600"></i> Tulis Berita Desa Baru
            </h3>
            <button onclick="closeCreateBeritaModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Judul Berita</label>
                <input type="text" name="title" required placeholder="Judul berita..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Kategori</label>
                    <input type="text" name="category" value="Pemerintahan" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Status</label>
                    <select name="status" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="published" selected>Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Tanggal Publish</label>
                    <input type="datetime-local" name="published_at" value="{{ now()->format('Y-m-d\TH:i') }}" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Ringkasan / Excerpt</label>
                <textarea name="excerpt" rows="2" placeholder="Ringkasan singkat berita..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Isi Berita Lengkap</label>
                <textarea name="content" rows="6" required placeholder="Isi berita..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Gambar Sampul</label>
                <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeCreateBeritaModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold shadow-md">Terbitkan Berita</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Berita -->
<div id="modal-edit-berita" onclick="if(event.target === this) closeEditBeritaModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-2xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-amber-500"></i> Edit Berita Desa
            </h3>
            <button onclick="closeEditBeritaModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="form-edit-berita" method="POST" action="" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Judul Berita</label>
                <input type="text" id="edit-b-title" name="title" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Kategori</label>
                    <input type="text" id="edit-b-category" name="category" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Status</label>
                    <select id="edit-b-status" name="status" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Tanggal Publish</label>
                    <input type="datetime-local" id="edit-b-published_at" name="published_at" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Ringkasan / Excerpt</label>
                <textarea id="edit-b-excerpt" name="excerpt" rows="2" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Isi Berita Lengkap</label>
                <textarea id="edit-b-content" name="content" rows="6" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Gambar Sampul (Biarkan kosong jika tidak diubah)</label>
                <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
                <div id="preview-b-image" class="mt-2"></div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeEditBeritaModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openCreateBeritaModal() {
        document.getElementById('modal-create-berita').classList.remove('hidden');
    }
    function closeCreateBeritaModal() {
        document.getElementById('modal-create-berita').classList.add('hidden');
    }

    function openEditBeritaModal(id) {
        const dataElem = document.getElementById(`berita-data-${id}`);
        if (!dataElem) return;
        const news = JSON.parse(dataElem.textContent);
        const modal = document.getElementById('modal-edit-berita');
        const form = document.getElementById('form-edit-berita');
        
        form.action = `{{ url('admin/berita') }}/${news.id}`;
        document.getElementById('edit-b-title').value = news.title || '';
        document.getElementById('edit-b-category').value = news.category || '';
        document.getElementById('edit-b-status').value = news.status || 'published';
        document.getElementById('edit-b-excerpt').value = news.excerpt || '';
        document.getElementById('edit-b-content').value = news.content || '';

        if (news.published_at) {
            const dt = new Date(news.published_at);
            const iso = new Date(dt.getTime() - (dt.getTimezoneOffset() * 60000)).toISOString().slice(0, 16);
            document.getElementById('edit-b-published_at').value = iso;
        } else {
            document.getElementById('edit-b-published_at').value = '';
        }

        const previewContainer = document.getElementById('preview-b-image');
        if (news.image) {
            const src = news.image.startsWith('images/') ? `/${news.image}` : `/storage/${news.image}`;
            previewContainer.innerHTML = `<img src="${src}" class="h-20 rounded-lg object-cover">`;
        } else {
            previewContainer.innerHTML = '';
        }

        modal.classList.remove('hidden');
    }

    function closeEditBeritaModal() {
        document.getElementById('modal-edit-berita').classList.add('hidden');
    }
</script>
@endpush
@endsection
