@extends('layouts.admin')

@section('title', 'Kelola Statistik Desa - Admin Desa Ketupat')
@section('page_title', 'Kelola Data Statistik Desa')

@section('content')
<div class="space-y-8">
    
    <!-- Add New Stat Form Box -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60">
        <h3 class="font-extrabold text-base text-slate-900 dark:text-white mb-4 flex items-center gap-2">
            <i class="fa-solid fa-plus-circle text-emerald-600"></i> Tambah Data Statistik Baru
        </h3>
        
        <form method="POST" action="{{ route('admin.statistik.store') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
            @csrf
            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nama Indikator</label>
                <input type="text" name="name" required placeholder="Contoh: Jumlah Penduduk" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nilai / Jumlah</label>
                <input type="number" name="value" required placeholder="2540" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Satuan</label>
                <input type="text" name="unit" required placeholder="Jiwa / KK / Dusun" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Tahun</label>
                <input type="number" name="year" value="{{ date('Y') }}" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Kategori</label>
                <select name="category" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                    <option value="penduduk">Penduduk</option>
                    <option value="wilayah">Wilayah</option>
                    <option value="gender">Gender</option>
                    <option value="ekonomi">Ekonomi</option>
                </select>
            </div>
            <div class="sm:col-span-2 lg:col-span-5 flex justify-end">
                <button type="submit" class="px-5 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-bold shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Data</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Data Table -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 space-y-4">
        <h3 class="font-extrabold text-base text-slate-900 dark:text-white">Daftar Indikator Statistik Desa</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                        <th class="p-3 rounded-l-xl">Nama Indikator</th>
                        <th class="p-3">Nilai</th>
                        <th class="p-3">Satuan</th>
                        <th class="p-3">Tahun</th>
                        <th class="p-3">Kategori</th>
                        <th class="p-3 rounded-r-xl text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                    @foreach($statistics as $stat)
                        <tr>
                            <td class="p-3 font-bold text-slate-900 dark:text-white">{{ $stat->name }}</td>
                            <td class="p-3 font-extrabold text-emerald-600 dark:text-emerald-400 text-sm">{{ number_format($stat->value) }}</td>
                            <td class="p-3">{{ $stat->unit }}</td>
                            <td class="p-3">{{ $stat->year }}</td>
                            <td class="p-3 uppercase font-semibold text-slate-500">{{ $stat->category }}</td>
                            <td class="p-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Edit Button Icon -->
                                    <button type="button" 
                                        data-stat="{{ json_encode($stat) }}"
                                        onclick="openEditStatModalFromBtn(this)" 
                                        class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/80 flex items-center justify-center transition" 
                                        title="Edit Data Statistik">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    </button>

                                    <!-- Delete Button Icon -->
                                    <form action="{{ route('admin.statistik.destroy', $stat->id) }}" method="POST" onsubmit="return confirm('Hapus indikator statistik ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 hover:bg-rose-100 dark:hover:bg-rose-900/80 flex items-center justify-center transition" 
                                            title="Hapus Data">
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

</div>

<!-- Modal Edit Statistik -->
<div id="modal-edit-stat" onclick="if(event.target === this) closeEditStatModal()" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 sm:p-8 max-w-lg w-full max-h-[90vh] overflow-y-auto no-scrollbar shadow-2xl border border-slate-200 dark:border-slate-700 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-4">
            <h3 class="font-extrabold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-amber-500"></i> Edit Data Statistik
            </h3>
            <button onclick="closeEditStatModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="form-edit-stat" method="POST" action="" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label class="block text-xs font-bold uppercase text-slate-500">Nama Indikator</label>
                <input type="text" id="edit-name" name="name" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold uppercase text-slate-500">Nilai / Jumlah</label>
                    <input type="number" id="edit-value" name="value" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold uppercase text-slate-500">Satuan</label>
                    <input type="text" id="edit-unit" name="unit" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold uppercase text-slate-500">Tahun</label>
                    <input type="number" id="edit-year" name="year" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold uppercase text-slate-500">Kategori</label>
                    <select id="edit-category" name="category" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="penduduk">Penduduk</option>
                        <option value="wilayah">Wilayah</option>
                        <option value="gender">Gender</option>
                        <option value="ekonomi">Ekonomi</option>
                    </select>
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeEditStatModal()" class="px-5 py-2.5 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold text-xs">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2.5 rounded-2xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openEditStatModalFromBtn(btn) {
        const stat = JSON.parse(btn.getAttribute('data-stat'));
        const modal = document.getElementById('modal-edit-stat');
        const form = document.getElementById('form-edit-stat');
        
        form.action = `/admin/statistik/${stat.id}`;
        document.getElementById('edit-name').value = stat.name || '';
        document.getElementById('edit-value').value = stat.value || 0;
        document.getElementById('edit-unit').value = stat.unit || '';
        document.getElementById('edit-year').value = stat.year || new Date().getFullYear();
        document.getElementById('edit-category').value = stat.category || 'penduduk';

        modal.classList.remove('hidden');
    }

    function closeEditStatModal() {
        document.getElementById('modal-edit-stat').classList.add('hidden');
    }
</script>
@endpush
@endsection
