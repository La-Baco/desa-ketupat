@extends('layouts.admin')

@section('title', 'Kelola Agenda - Admin Desa Ketupat')
@section('page_title', 'Kelola Agenda & Jadwal Desa')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <p class="text-xs text-slate-500">Daftar agenda kegiatan kemasyarakatan dan pemdes</p>
        <button onclick="openCreateAgendaModal()" class="px-5 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-bold shadow-md transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Agenda Baru</span>
        </button>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                    <th class="p-3 rounded-l-xl">Tanggal Event</th>
                    <th class="p-3">Judul Agenda</th>
                    <th class="p-3">Waktu</th>
                    <th class="p-3">Lokasi</th>
                    <th class="p-3 rounded-r-xl text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                @foreach($agendas as $agenda)
                    <tr>
                        <td class="p-3 font-bold text-emerald-600 dark:text-emerald-400 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($agenda->event_date)->translatedFormat('d F Y') }}
                        </td>
                        <td class="p-3 font-bold text-slate-900 dark:text-white">{{ $agenda->title }}</td>
                        <td class="p-3 text-slate-500 whitespace-nowrap">{{ $agenda->start_time ?? '-' }} {{ $agenda->end_time ? '- '.$agenda->end_time : '' }}</td>
                        <td class="p-3 text-slate-500">{{ $agenda->location ?? '-' }}</td>
                        <td class="p-3 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <script id="agenda-data-{{ $agenda->id }}" type="application/json">@json($agenda)</script>
                                <button type="button"
                                    onclick="openEditAgendaModal({{ $agenda->id }})" 
                                    class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 hover:bg-amber-100 flex items-center justify-center transition" 
                                    title="Edit Agenda">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </button>
                                <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('Hapus agenda ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 hover:bg-rose-100 flex items-center justify-center transition" title="Hapus Agenda">
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
            {{ $agendas->links() }}
        </div>
    </div>

</div>

<!-- Modal Create Agenda -->
<div id="modal-create-agenda" onclick="if(event.target === this) closeCreateAgendaModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-calendar-plus text-emerald-600"></i> Tambah Agenda Kegiatan Baru
            </h3>
            <button onclick="closeCreateAgendaModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.agenda.store') }}" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Judul Agenda / Kegiatan</label>
                <input type="text" name="title" required placeholder="Judul agenda..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Tanggal Execution</label>
                    <input type="date" name="event_date" value="{{ date('Y-m-d') }}" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Jam Mulai</label>
                    <input type="text" name="start_time" value="08:00" placeholder="08:00 WIB" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Jam Selesai</label>
                    <input type="text" name="end_time" value="11:30" placeholder="11:30 WIB" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Lokasi Tempat Pelaksanaan</label>
                <input type="text" name="location" placeholder="Lokasi kegiatan..." class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi / Detail Acara</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Poster / Banner Acara (Opsional)</label>
                <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeCreateAgendaModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-bold shadow-md">Simpan Agenda</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Agenda -->
<div id="modal-edit-agenda" onclick="if(event.target === this) closeEditAgendaModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-xl w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-amber-500"></i> Edit Agenda Kegiatan
            </h3>
            <button onclick="closeEditAgendaModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="form-edit-agenda" method="POST" action="" enctype="multipart/form-data" class="space-y-4 text-xs">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Judul Agenda / Kegiatan</label>
                <input type="text" id="edit-ag-title" name="title" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Tanggal Pelaksanaan</label>
                    <input type="date" id="edit-ag-event_date" name="event_date" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Jam Mulai</label>
                    <input type="text" id="edit-ag-start_time" name="start_time" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div class="space-y-1.5">
                    <label class="block font-bold uppercase text-slate-500">Jam Selesai</label>
                    <input type="text" id="edit-ag-end_time" name="end_time" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Lokasi Tempat Pelaksanaan</label>
                <input type="text" id="edit-ag-location" name="location" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Deskripsi / Detail Acara</label>
                <textarea id="edit-ag-description" name="description" rows="3" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block font-bold uppercase text-slate-500">Poster / Banner Acara (Biarkan kosong jika tidak diubah)</label>
                <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
                <div id="preview-ag-image" class="mt-2"></div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeEditAgendaModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openCreateAgendaModal() {
        document.getElementById('modal-create-agenda').classList.remove('hidden');
    }
    function closeCreateAgendaModal() {
        document.getElementById('modal-create-agenda').classList.add('hidden');
    }

    function openEditAgendaModal(id) {
        const dataElem = document.getElementById(`agenda-data-${id}`);
        if (!dataElem) return;
        const agenda = JSON.parse(dataElem.textContent);
        const modal = document.getElementById('modal-edit-agenda');
        const form = document.getElementById('form-edit-agenda');
        
        form.action = `{{ url('admin/agenda') }}/${agenda.id}`;
        document.getElementById('edit-ag-title').value = agenda.title || '';
        document.getElementById('edit-ag-event_date').value = agenda.event_date ? agenda.event_date.split('T')[0] : '';
        document.getElementById('edit-ag-start_time').value = agenda.start_time || '';
        document.getElementById('edit-ag-end_time').value = agenda.end_time || '';
        document.getElementById('edit-ag-location').value = agenda.location || '';
        document.getElementById('edit-ag-description').value = agenda.description || '';

        const previewContainer = document.getElementById('preview-ag-image');
        if (agenda.image) {
            const src = agenda.image.startsWith('images/') ? `/${agenda.image}` : `/storage/${agenda.image}`;
            previewContainer.innerHTML = `<img src="${src}" class="h-20 rounded-lg object-cover">`;
        } else {
            previewContainer.innerHTML = '';
        }

        modal.classList.remove('hidden');
    }

    function closeEditAgendaModal() {
        document.getElementById('modal-edit-agenda').classList.add('hidden');
    }
</script>
@endpush
@endsection
