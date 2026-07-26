@extends('layouts.admin')

@section('title', 'Kelola Admin - Admin Desa Ketupat')
@section('page_title', 'Kelola Pengguna Admin')

@section('content')
<div class="space-y-6">

    <!-- Top Action Bar & Overview -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100">Daftar Admin Sistem</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">Kelola hak akses dan akun pengelola Website Desa Ketupat</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white text-xs font-bold shadow-md transition-all">
            <i class="fa-solid fa-user-plus"></i>
            <span>Tambah Admin Baru</span>
        </a>
    </div>

    <!-- Admin List Table -->
    <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-200/80 dark:border-slate-700/60 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-100 dark:bg-slate-700/60 text-slate-600 dark:text-slate-300 font-semibold">
                        <th class="p-3.5 rounded-l-xl">Admin</th>
                        <th class="p-3.5">Email</th>
                        <th class="p-3.5">Tanggal Terdaftar</th>
                        <th class="p-3.5">Status Account</th>
                        <th class="p-3.5 rounded-r-xl text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition">
                            <td class="p-3.5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-2xl bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-300 font-bold flex items-center justify-center text-sm border border-emerald-200 dark:border-emerald-800/60">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900 dark:text-white text-sm">{{ $user->name }}</p>
                                        @if(Auth::id() === $user->id)
                                            <span class="inline-block mt-0.5 px-2 py-0.5 rounded-md bg-emerald-50 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 font-semibold text-[10px]">
                                                <i class="fa-solid fa-circle-user mr-1"></i>Akun Anda
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="p-3.5 font-medium text-slate-600 dark:text-slate-300">
                                <i class="fa-regular fa-envelope mr-1.5 text-emerald-600 dark:text-emerald-400"></i>
                                {{ $user->email }}
                            </td>
                            <td class="p-3.5 text-slate-500 dark:text-slate-400 font-medium">
                                {{ $user->created_at ? $user->created_at->translatedFormat('d M Y, H:i') : '-' }}
                            </td>
                            <td class="p-3.5">
                                <span class="px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-emerald-700 dark:text-emerald-400 font-bold text-[10px] inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Aktif
                                </span>
                            </td>
                            <td class="p-3.5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                                       class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/80 flex items-center justify-center transition" 
                                       title="Edit Admin">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    </a>

                                    @if(Auth::id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun admin {{ $user->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 hover:bg-rose-100 dark:hover:bg-rose-900/80 flex items-center justify-center transition" 
                                                    title="Hapus Admin">
                                                <i class="fa-solid fa-trash-can text-sm"></i>
                                            </button>
                                        </form>
                                    @else
                                        <button type="button" disabled 
                                                class="w-9 h-9 rounded-xl bg-slate-100 dark:bg-slate-700/50 text-slate-400 cursor-not-allowed flex items-center justify-center" 
                                                title="Anda tidak dapat menghapus akun Anda sendiri">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-400 dark:text-slate-500 font-medium">
                                Belum ada akun admin terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-700/50">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
