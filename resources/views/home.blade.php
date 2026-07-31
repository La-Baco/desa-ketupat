@extends('layouts.app')

@section('title', 'Website Resmi & Portal Informasi Desa Ketupat')

@section('content')

    <!-- 1. NAVBAR included via layouts.app -->

    <!-- 2. HERO BANNER -->
    @include('components.hero')

    <!-- 3. SAMBUTAN SINGKAT -->
    <section class="relative py-20 md:py-28 bg-white dark:bg-[#0F172A] border-b border-slate-200/60 dark:border-slate-800/80 transition-colors overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-emerald-500/5 dark:bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 text-center space-y-5 fade-in-section">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-100 dark:bg-emerald-950/80 text-[#14532D] dark:text-emerald-400 text-xs font-extrabold uppercase tracking-widest border border-emerald-300/60 dark:border-emerald-800/60 shadow-sm">
                <i class="fa-solid fa-seedling text-emerald-600 dark:text-emerald-400"></i>
                Pemerintah Desa Ketupat
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                SELAMAT DATANG DI <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#14532D] via-emerald-700 to-green-600 dark:from-emerald-400 dark:to-green-300">DESA KETUPAT</span>
            </h2>
            <p class="text-base sm:text-xl text-slate-600 dark:text-slate-300 font-normal leading-relaxed max-w-3xl mx-auto">
                Website ini menjadi media informasi dan komunikasi resmi bagi masyarakat Desa Ketupat, Kecamatan Raas, Kabupaten Sumenep, Provinsi Jawa Timur.
            </p>
            <div class="pt-4 flex justify-center items-center gap-2">
                <div class="w-12 h-1 rounded-full bg-emerald-500"></div>
                <div class="w-3 h-3 rounded-full bg-emerald-600 animate-ping"></div>
                <div class="w-12 h-1 rounded-full bg-emerald-500"></div>
            </div>
        </div>
    </section>

    <!-- 4. VISI DAN MISI -->
    <section class="py-20 md:py-28 bg-slate-50/80 dark:bg-[#0F172A] transition-colors relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 fade-in-section space-y-3">
                <span class="text-xs font-extrabold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Pedoman Pembangunan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white">Visi dan Misi Desa</h2>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400">Arah kebijakan dan cita-cita luhur Pemerintah Desa Ketupat dalam menyejahterakan masyarakat.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card Visi -->
                <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 sm:p-10 shadow-sm hover:shadow-2xl hover:shadow-emerald-900/10 border border-slate-200/80 dark:border-slate-800 transition-all duration-300 transform hover:-translate-y-2 fade-in-section group relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-600 to-green-400"></div>
                    <div class="w-16 h-16 rounded-2xl bg-[#14532D] text-white flex items-center justify-center text-3xl mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white mb-4 group-hover:text-[#14532D] dark:group-hover:text-emerald-400 transition-colors">Visi Desa</h3>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base italic bg-emerald-50/60 dark:bg-emerald-950/40 p-6 rounded-2xl border-l-4 border-[#22C55E] shadow-inner">
                        "{{ $profile->visi ?? 'Terwujudnya Desa Ketupat yang Maju, Mandiri, Sejahtera, Transparan, dan Berdaya Saing Berlandaskan Gotong Royong dan Nilai-Nilai Religius.' }}"
                    </p>
                </div>

                <!-- Card Misi -->
                <div class="bg-white dark:bg-[#1E293B] rounded-3xl p-8 sm:p-10 shadow-sm hover:shadow-2xl hover:shadow-emerald-900/10 border border-slate-200/80 dark:border-slate-800 transition-all duration-300 transform hover:-translate-y-2 fade-in-section group relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-600 to-green-400"></div>
                    <div class="w-16 h-16 rounded-2xl bg-[#14532D] text-white flex items-center justify-center text-3xl mb-6 shadow-lg group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white mb-4 group-hover:text-[#14532D] dark:group-hover:text-emerald-400 transition-colors">Misi Desa</h3>
                    <div class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base space-y-3 whitespace-pre-line font-medium">
                        {{ $profile->misi ?? "1. Meningkatkan kualitas pelayanan publik desa.\n2. Mengembangkan perekonomian warga.\n3. Pembangunan infrastruktur merata." }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. SAMBUTAN KEPALA DESA -->
    <section class="py-20 md:py-28 bg-white dark:bg-[#0F172A] transition-colors border-y border-slate-200/60 dark:border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-emerald-950 via-[#14532D] to-emerald-900 dark:from-[#1E293B] dark:to-slate-950 rounded-3xl p-8 sm:p-14 text-white shadow-2xl overflow-hidden relative fade-in-section border border-emerald-800/40">
                <!-- Background decoration -->
                <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <!-- Photo Column -->
                    <div class="lg:col-span-4 flex flex-col items-center text-center">
                        <div class="relative group">
                            <div class="w-48 h-64 sm:w-56 sm:h-72 lg:w-64 lg:h-80 rounded-3xl overflow-hidden border-4 border-white/20 shadow-2xl bg-slate-800 ring-8 ring-emerald-500/20">
                                @php
                                    $kadesPhoto = ($kades && $kades->photo) ? (Str::startsWith($kades->photo, 'images/') ? asset($kades->photo) : asset('storage/' . $kades->photo)) : asset('images/kades.jpg');
                                @endphp
                                <img src="{{ $kadesPhoto }}" alt="{{ $kades->name ?? 'Kepala Desa' }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 px-4 py-1.5 rounded-full bg-emerald-500 text-white font-extrabold text-xs shadow-xl uppercase tracking-wider whitespace-nowrap border border-emerald-300/40">
                                {{ $kades->position ?? 'Kepala Desa Ketupat' }}
                            </div>
                        </div>

                        <h4 class="font-extrabold text-xl text-white mt-6 drop-shadow-sm">{{ $kades->name ?? 'H. Ahmad Syarif, S.Sos.' }}</h4>
                        <p class="text-xs text-emerald-300 font-medium">Periode Masa Jabatan Aktif</p>
                    </div>

                    <!-- Speech Column -->
                    <div class="lg:col-span-8 space-y-5">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-emerald-300 border border-white/20 text-xs font-extrabold uppercase tracking-widest backdrop-blur-md">
                            <i class="fa-solid fa-quote-left text-emerald-400"></i> Sambutan Resmi Kepala Desa
                        </div>
                        <h3 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight leading-snug">
                            Komitmen Melayani & Membangun Desa Ketupat
                        </h3>
                        <div class="text-slate-200 text-sm sm:text-base leading-relaxed space-y-3 whitespace-pre-line font-light">
                            {{ $profile->sambutan ?? 'Assalamu\'alaikum Warahmatullahi Wabarakatuh, Selamat datang di Website Resmi Desa Ketupat. Kami berkomitmen untuk terus berinovasi dalam memberikan pelayanan terbaik, transparan, dan dapat diakses oleh seluruh lapisan masyarakat.' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. STATISTIK DESA -->
    <section class="py-20 md:py-28 bg-slate-50/80 dark:bg-[#0F172A] transition-colors" id="section-statistik">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 fade-in-section space-y-3">
                <span class="text-xs font-extrabold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Data Terintegrasi</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white">Statistik Kependudukan Desa</h2>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400">Gambaran demografi dan potensi sumber daya manusia Desa Ketupat secara berkelanjutan.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($statistics as $stat)
                    <x-stat-card :stat="$stat" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. BERITA TERBARU -->
    <section class="py-20 md:py-28 bg-white dark:bg-[#0F172A] transition-colors border-t border-slate-200/60 dark:border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-12 fade-in-section gap-4">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Kabar Pembangunan</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Berita Terbaru</h2>
                </div>
                <a href="{{ route('berita.index') }}" class="px-6 py-3 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-[#14532D] dark:text-emerald-400 hover:bg-[#14532D] hover:text-white font-extrabold text-xs transition-all duration-300 flex items-center gap-2 border border-emerald-200 dark:border-emerald-800/40 shadow-sm hover:scale-105">
                    <span>Lihat Semua Berita</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($beritaTerbaru as $news)
                    <x-news-card :news="$news" />
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500">Belum ada berita diterbitkan.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 8. AGENDA DESA -->
    <section class="py-20 md:py-28 bg-slate-50/80 dark:bg-[#0F172A] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-12 fade-in-section gap-4">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Jadwal Kegiatan</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">AGENDA DESA KETUPAT</h2>
                </div>
                <a href="{{ route('agenda.index') }}" class="px-6 py-3 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-[#14532D] dark:text-emerald-400 hover:bg-[#14532D] hover:text-white font-extrabold text-xs transition-all duration-300 flex items-center gap-2 border border-emerald-200 dark:border-emerald-800/40 shadow-sm hover:scale-105">
                    <span>Lihat Semua Agenda</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($agendas as $agenda)
                    <x-agenda-card :agenda="$agenda" />
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500">Belum ada agenda mendatang.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 9. POTENSI DESA -->
    <section class="py-20 md:py-28 bg-white dark:bg-[#0F172A] transition-colors border-t border-slate-200/60 dark:border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-12 fade-in-section gap-4">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Kekayaan Lokal</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Potensi Desa Unggulan</h2>
                </div>
                <a href="{{ route('potensi.index') }}" class="px-6 py-3 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-[#14532D] dark:text-emerald-400 hover:bg-[#14532D] hover:text-white font-extrabold text-xs transition-all duration-300 flex items-center gap-2 border border-emerald-200 dark:border-emerald-800/40 shadow-sm hover:scale-105">
                    <span>Jelajahi Seluruh Potensi</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($potensis as $potensi)
                    <x-potensi-card :potensi="$potensi" />
                @empty
                    <div class="col-span-4 text-center py-12 text-slate-500">Belum ada data potensi unggulan.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 10. GALERI TERBARU -->
    <section class="py-20 md:py-28 bg-slate-50/80 dark:bg-[#0F172A] transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-12 fade-in-section gap-4">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-widest text-[#14532D] dark:text-emerald-400">Dokumentasi Visual</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mt-1">Galeri Kegiatan Desa</h2>
                </div>
                <a href="{{ route('galeri.index') }}" class="px-6 py-3 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-[#14532D] dark:text-emerald-400 hover:bg-[#14532D] hover:text-white font-extrabold text-xs transition-all duration-300 flex items-center gap-2 border border-emerald-200 dark:border-emerald-800/40 shadow-sm hover:scale-105">
                    <span>Lihat Seluruh Foto</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($galleries as $gallery)
                    <x-gallery-card :gallery="$gallery" />
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500">Belum ada dokumentasi galeri.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 11. FOOTER included via layouts.app -->

@endsection

@push('scripts')
<script>
    // Counter Animation Script for Statistic Section
    document.addEventListener("DOMContentLoaded", function() {
        const counters = document.querySelectorAll('.counter-val');
        let animated = false;

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const speed = 400; // lower is faster
                const increment = target / (speed / 16);

                let count = 0;
                const updateCount = () => {
                    count += increment;
                    if (count < target) {
                        counter.innerText = Math.ceil(count).toLocaleString('id-ID');
                        setTimeout(updateCount, 16);
                    } else {
                        counter.innerText = target.toLocaleString('id-ID');
                    }
                };
                updateCount();
            });
        };

        const sectionStat = document.getElementById('section-statistik');
        if (sectionStat) {
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !animated) {
                    animateCounters();
                    animated = true;
                }
            }, { threshold: 0.3 });
            observer.observe(sectionStat);
        }
    });
</script>
@endpush
