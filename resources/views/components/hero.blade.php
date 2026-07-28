<div id="hero-banner" class="relative w-full h-[85vh] min-h-[520px] max-h-[780px] overflow-hidden bg-slate-950 group select-none">
    <!-- Slides Wrapper -->
    <div id="hero-slides" class="relative w-full h-full">

        <!-- Slide 1 -->
        <div class="hero-slide absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out z-10 flex items-center">
            <div class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-10000 ease-linear animate-pulse-glow" style="background-image: url('{{ asset('images/hero/hero-1.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/75 to-slate-950/30"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-20">
                <div class="max-w-2xl text-white space-y-5">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-extrabold uppercase tracking-widest backdrop-blur-md shadow-lg shadow-emerald-950/50">
                        <i class="fa-solid fa-certificate text-emerald-400"></i>
                        <span>Portal Resmi Desa Ketupat</span>
                    </div>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-white drop-shadow-lg">
                        Selamat Datang di <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-green-300 to-emerald-200">Desa Ketupat</span>
                    </h1>
                    <p class="text-base sm:text-xl text-slate-200 font-normal leading-relaxed">
                        Pusat informasi dan pelayanan digital terpadu Pemerintah Desa Ketupat, Kecamatan Raas, Kabupaten Sumenep.
                    </p>
                    <div class="pt-4 flex flex-wrap gap-4">
                        <a href="{{ route('profil') }}" class="px-7 py-4 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-extrabold text-sm shadow-xl shadow-emerald-900/50 hover:shadow-2xl hover:shadow-emerald-600/50 hover:scale-105 transition-all duration-300 flex items-center gap-3 group/btn">
                            <span>Jelajahi Profil Desa</span>
                            <i class="fa-solid fa-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="{{ route('kontak') }}" class="px-7 py-4 rounded-2xl bg-white/10 hover:bg-white/20 text-white font-extrabold text-sm backdrop-blur-md border border-white/20 hover:scale-105 transition-all duration-300">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0 flex items-center">
            <div class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-10000 ease-linear animate-pulse-glow" style="background-image: url('{{ asset('images/hero/hero-2.jpeg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/75 to-slate-950/30"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-20">
                <div class="max-w-2xl text-white space-y-5">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-extrabold uppercase tracking-widest backdrop-blur-md shadow-lg shadow-emerald-950/50">
                        <i class="fa-solid fa-users text-emerald-400"></i>
                        <span>Pemerintahan Transparan & Inklusif</span>
                    </div>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-white drop-shadow-lg">
                        Bersama <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-green-300 to-emerald-200">Membangun Desa</span>
                    </h1>
                    <p class="text-base sm:text-xl text-slate-200 font-normal leading-relaxed">
                        Mewujudkan Desa Ketupat yang maju, mandiri, sejahtera, dan berdaya saing tinggi.
                    </p>
                    <div class="pt-4 flex flex-wrap gap-4">
                        <a href="{{ route('berita.index') }}" class="px-7 py-4 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-extrabold text-sm shadow-xl shadow-emerald-900/50 hover:shadow-2xl hover:shadow-emerald-600/50 hover:scale-105 transition-all duration-300 flex items-center gap-3 group/btn">
                            <span>Kabar Pembangunan</span>
                            <i class="fa-solid fa-newspaper group-hover/btn:scale-110 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0 flex items-center">
            <div class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-10000 ease-linear animate-pulse-glow" style="background-image: url('{{ asset('images/hero/hero-3.webp') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/75 to-slate-950/30"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-20">
                <div class="max-w-2xl text-white space-y-5">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-extrabold uppercase tracking-widest backdrop-blur-md shadow-lg shadow-emerald-950/50">
                        <i class="fa-solid fa-wheat-awn text-emerald-400"></i>
                        <span>Kekayaan Alam & Perikanan</span>
                    </div>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-white drop-shadow-lg">
                        Potensi <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-green-300 to-emerald-200">Desa Ketupat</span>
                    </h1>
                    <p class="text-base sm:text-xl text-slate-200 font-normal leading-relaxed">
                        Mengenal kekayaan sektor maritim, budidaya laut, pertanian, dan produk kerajinan masyarakat Raas.
                    </p>
                    <div class="pt-4 flex flex-wrap gap-4">
                        <a href="{{ route('potensi.index') }}" class="px-7 py-4 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-extrabold text-sm shadow-xl shadow-emerald-900/50 hover:shadow-2xl hover:shadow-emerald-600/50 hover:scale-105 transition-all duration-300 flex items-center gap-3 group/btn">
                            <span>Lihat Potensi Unggulan</span>
                            <i class="fa-solid fa-wheat-awn group-hover/btn:rotate-12 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0 flex items-center">
            <div class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-10000 ease-linear animate-pulse-glow" style="background-image: url('{{ asset('images/hero/hero-4.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/75 to-slate-950/30"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-20">
                <div class="max-w-2xl text-white space-y-5">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-extrabold uppercase tracking-widest backdrop-blur-md shadow-lg shadow-emerald-950/50">
                        <i class="fa-solid fa-camera text-emerald-400"></i>
                        <span>Kebudayaan & Gotong Royong</span>
                    </div>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-white drop-shadow-lg">
                        Kehidupan <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-green-300 to-emerald-200">Masyarakat Desa</span>
                    </h1>
                    <p class="text-base sm:text-xl text-slate-200 font-normal leading-relaxed">
                        Dokumentasi kebersamaan, adat istiadat, dan kegiatan sosial warga Desa Ketupat.
                    </p>
                    <div class="pt-4 flex flex-wrap gap-4">
                        <a href="{{ route('galeri.index') }}" class="px-7 py-4 rounded-2xl bg-[#14532D] hover:bg-[#166534] text-white font-extrabold text-sm shadow-xl shadow-emerald-900/50 hover:shadow-2xl hover:shadow-emerald-600/50 hover:scale-105 transition-all duration-300 flex items-center gap-3 group/btn">
                            <span>Galeri Kegiatan</span>
                            <i class="fa-solid fa-images group-hover/btn:scale-110 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Floating Glass Quick Badge (Desktop) -->
    <div class="hidden lg:flex absolute bottom-8 right-8 z-30 items-center gap-4 bg-white/10 dark:bg-slate-900/40 backdrop-blur-xl border border-white/20 p-4 rounded-3xl shadow-2xl shadow-emerald-950/50 text-white">
        <div class="w-12 h-12 rounded-2xl bg-emerald-500/30 border border-emerald-400/40 flex items-center justify-center text-emerald-400 text-xl font-bold shadow-lg shadow-emerald-600/30">
            <i class="fa-solid fa-location-dot animate-bounce"></i>
        </div>
        <div>
            <p class="text-xs font-bold text-emerald-300 uppercase tracking-wide">Wilayah Kepulauan Raas</p>
            <p class="text-sm font-extrabold text-white">Kab. Sumenep, Jawa Timur</p>
        </div>
    </div>

    <!-- Controls: Next & Previous -->
    <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-2xl bg-black/40 hover:bg-emerald-600 text-white backdrop-blur-md border border-white/20 flex items-center justify-center transition-all duration-300 opacity-80 hover:opacity-100 hover:scale-110 shadow-lg shadow-emerald-950/50" aria-label="Slide Sebelumnya">
        <i class="fa-solid fa-chevron-left text-lg"></i>
    </button>
    <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-2xl bg-black/40 hover:bg-emerald-600 text-white backdrop-blur-md border border-white/20 flex items-center justify-center transition-all duration-300 opacity-80 hover:opacity-100 hover:scale-110 shadow-lg shadow-emerald-950/50" aria-label="Slide Selanjutnya">
        <i class="fa-solid fa-chevron-right text-lg"></i>
    </button>

    <!-- Indicators / Dots -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex items-center gap-2.5 bg-black/30 backdrop-blur-md px-4 py-2 rounded-full border border-white/10 shadow-lg shadow-emerald-950/40">
        <button onclick="goToSlide(0)" class="hero-dot w-9 h-2.5 rounded-full bg-emerald-500 transition-all duration-300 shadow-sm shadow-emerald-400" aria-label="Slide 1"></button>
        <button onclick="goToSlide(1)" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300" aria-label="Slide 2"></button>
        <button onclick="goToSlide(2)" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300" aria-label="Slide 3"></button>
        <button onclick="goToSlide(3)" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300" aria-label="Slide 4"></button>
    </div>
</div>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    let autoSlideInterval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('opacity-0', 'z-0');
                slide.classList.add('opacity-100', 'z-10');
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
            }
        });

        dots.forEach((dot, i) => {
            if (i === index) {
                dot.className = 'hero-dot w-9 h-2.5 rounded-full bg-emerald-500 transition-all duration-300 shadow-sm shadow-emerald-400';
            } else {
                dot.className = 'hero-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300';
            }
        });

        currentSlide = index;
    }

    function nextSlide() {
        let next = (currentSlide + 1) % slides.length;
        showSlide(next);
        resetAutoSlide();
    }

    function prevSlide() {
        let prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
        resetAutoSlide();
    }

    function goToSlide(index) {
        showSlide(index);
        resetAutoSlide();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            let next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }, 5000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    document.addEventListener('DOMContentLoaded', () => {
        startAutoSlide();
    });
</script>
