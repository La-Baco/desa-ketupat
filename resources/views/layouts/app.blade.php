<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Resmi Desa Ketupat') - Kecamatan Raas, Kabupaten Sumenep</title>
    <meta name="description" content="@yield('meta_description', 'Portal Informasi dan Pelayanan Resmi Desa Ketupat, Kecamatan Raas, Kabupaten Sumenep, Jawa Timur.')">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#14532D',
                            50: '#F0FDF4',
                            100: '#DCFCE7',
                            500: '#22C55E',
                            600: '#166534',
                            700: '#15803D',
                            800: '#166534',
                            900: '#14532D',
                            950: '#052E16',
                        },
                        accent: '#22C55E',
                        bgLight: '#F8FAFC',
                        textLight: '#1F2937',
                        bgDark: '#0F172A',
                        cardDark: '#1E293B',
                        textDark: '#F8FAFC'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Dark/Light Theme Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        /* Smooth Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .dark ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: #15803d;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #22c55e;
        }

        /* Scroll Animations */
        .fade-in-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Keyframes for Subtle Micro Animations */
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float {
            animation: floatSlow 5s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.05); }
        }
        .animate-pulse-glow {
            animation: pulseGlow 4s ease-in-out infinite;
        }

        /* Card Hover Lift Effect */
        .hover-lift {
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .hover-lift:hover {
            transform: translateY(-6px);
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans bg-[#F8FAFC] text-[#1F2937] dark:bg-[#0F172A] dark:text-[#F8FAFC] transition-colors duration-300 min-h-screen flex flex-col antialiased selection:bg-[#22C55E] selection:text-white">

    <!-- Scroll Progress Bar -->
    <div id="scroll-progress" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-emerald-600 via-emerald-400 to-green-300 z-50 transition-all duration-150 w-0"></div>

    <!-- Navbar Component -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Component -->
    @include('components.footer')

    <!-- Global Lightbox Modal -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 hidden bg-black/90 backdrop-blur-md flex items-center justify-center p-4 transition-opacity duration-300">
        <div class="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center">
            <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white hover:text-accent text-3xl font-bold transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <img id="lightbox-img" src="" alt="Lightbox Image" class="max-h-[65vh] w-auto max-w-full rounded-2xl shadow-2xl object-contain">
            
            <div class="mt-4 text-center text-white max-w-2xl px-4 space-y-1.5">
                <h3 id="lightbox-title" class="text-lg sm:text-xl font-bold text-white drop-shadow"></h3>
                <p id="lightbox-date" class="text-xs text-emerald-400 font-semibold"></p>
                <p id="lightbox-desc" class="text-xs sm:text-sm text-slate-300 font-light leading-relaxed pt-1 max-h-28 overflow-y-auto no-scrollbar"></p>
            </div>
        </div>
    </div>

    <!-- Core Scripts -->
    <script>
        // Scroll Progress Indicator
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('scroll-progress').style.width = scrolled + '%';
        });

        // IntersectionObserver for smooth scroll animations
        document.addEventListener("DOMContentLoaded", function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, { threshold: 0.08 });

            document.querySelectorAll('.fade-in-section').forEach((section) => {
                observer.observe(section);
            });
        });

        // Global Lightbox Functionality
        function openLightboxFromElem(elem) {
            const imageSrc = elem.getAttribute('data-image');
            const title = elem.getAttribute('data-title') || '';
            const description = elem.getAttribute('data-description') || '';
            const date = elem.getAttribute('data-date') || '';
            openLightbox(imageSrc, title, description, date);
        }

        function openLightbox(imageSrc, title = '', description = '', date = '') {
            const modal = document.getElementById('lightbox-modal');
            const img = document.getElementById('lightbox-img');
            const titleEl = document.getElementById('lightbox-title');
            const descEl = document.getElementById('lightbox-desc');
            const dateEl = document.getElementById('lightbox-date');

            img.src = imageSrc;
            if (titleEl) titleEl.innerText = title;
            if (descEl) descEl.innerText = description;
            if (dateEl) dateEl.innerText = date ? date : '';

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.getElementById('lightbox-modal').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });
    </script>
    @stack('scripts')
</body>
</html>
