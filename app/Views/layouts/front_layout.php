<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Aprilianto\'s Tinutuan - Bubur Manado Modern') ?></title>
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🥣</text></svg>">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#9333EA',
                        'primary-dark': '#7E22CE',
                        'primary-light': '#A855F7',
                        'primary-50': '#FAF5FF',
                        accent: '#FBBF24',
                        'accent-dark': '#F59E0B',
                        'accent-light': '#FDE68A',
                        'dark-bg': '#0B0F19',
                        'card-dark': '#131A2B',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #0f172a;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #9333ea;
            border-radius: 9999px;
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.35; transform: scale(1.05); }
        }
        .animate-pulse-slow {
            animation: pulse-slow 8s infinite ease-in-out;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex flex-col selection:bg-primary selection:text-white custom-scrollbar">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-primary via-purple-700 to-amber-500 text-white text-xs py-2 px-4 text-center font-bold tracking-wide flex items-center justify-center space-x-3 shadow-sm">
        <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-black/30 text-[10px] uppercase tracking-wider">
            <i class="fa-solid fa-sparkles mr-1 text-accent"></i> Kuliner Khas Manado
        </span>
        <span>Sensasi Autentik Bubur Manado Tinutuan Tradisi Minahasa dengan Sentuhan Modern Waralaba!</span>
        <a href="<?= base_url('menu') ?>" class="underline hover:text-accent font-extrabold hidden md:inline ml-2">Lihat 10 Menu Pilihan &rarr;</a>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/85 border-b border-slate-800/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="<?= base_url() ?>" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-primary to-accent flex items-center justify-center text-white shadow-xl shadow-primary/40 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-bowl-food text-2xl text-amber-100"></i>
                    </div>
                    <div>
                        <div class="flex items-center space-x-1">
                            <span class="font-display font-black text-2xl tracking-tight text-white group-hover:text-amber-300 transition-colors">Aprilianto's</span>
                            <span class="font-display font-black text-2xl tracking-tight text-accent">Tinutuan</span>
                        </div>
                        <p class="text-[10px] tracking-widest uppercase font-bold text-purple-300">Authentic Manado Cuisine</p>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-8 text-sm font-semibold">
                    <a href="<?= base_url() ?>" class="text-white hover:text-accent transition-colors py-2 flex items-center space-x-1.5">
                        <i class="fa-solid fa-house text-xs text-primary"></i>
                        <span>Beranda</span>
                    </a>
                    <a href="<?= base_url('menu') ?>" class="text-slate-300 hover:text-accent transition-colors py-2 flex items-center space-x-1.5">
                        <i class="fa-solid fa-utensils text-xs text-accent"></i>
                        <span>Katalog Menu</span>
                    </a>
                    <a href="<?= base_url() ?>#filosofi" class="text-slate-300 hover:text-accent transition-colors py-2 flex items-center space-x-1.5">
                        <i class="fa-solid fa-seedling text-xs text-emerald-400"></i>
                        <span>Filosofi Sehat</span>
                    </a>
                    <a href="<?= base_url() ?>#promo" class="text-slate-300 hover:text-accent transition-colors py-2 flex items-center space-x-1.5">
                        <i class="fa-solid fa-tag text-xs text-rose-400"></i>
                        <span>Paket Promo</span>
                    </a>
                    <a href="<?= base_url() ?>#kontak" class="text-slate-300 hover:text-accent transition-colors py-2 flex items-center space-x-1.5">
                        <i class="fa-solid fa-location-dot text-xs text-sky-400"></i>
                        <span>Outlet Kami</span>
                    </a>
                </nav>

                <!-- Action CTA & Admin Access -->
                <div class="hidden sm:flex items-center space-x-4">
                    <a href="<?= base_url('login') ?>" class="text-xs font-semibold px-4 py-2.5 rounded-xl border border-slate-700 hover:border-primary text-slate-300 hover:text-white bg-slate-900/80 transition-all flex items-center space-x-2">
                        <i class="fa-solid fa-lock text-accent text-xs"></i>
                        <span>Admin CRUD</span>
                    </a>

                    <a href="<?= base_url('menu') ?>" class="relative group overflow-hidden px-6 py-3 rounded-2xl bg-gradient-to-r from-primary to-purple-600 text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-primary/40 hover:shadow-primary/70 transition-all duration-300 flex items-center space-x-2">
                        <span class="relative z-10 flex items-center space-x-2">
                            <i class="fa-solid fa-bag-shopping text-accent text-sm"></i>
                            <span>Pesan Sekarang</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-accent to-amber-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex lg:hidden items-center space-x-2">
                    <a href="<?= base_url('login') ?>" class="p-2.5 rounded-xl bg-slate-900 border border-slate-800 text-accent text-sm">
                        <i class="fa-solid fa-lock"></i>
                    </a>
                    <button id="mobileMenuBtn" type="button" class="p-2.5 rounded-xl bg-slate-900 border border-slate-800 text-white hover:text-accent transition-colors">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div id="mobileMenu" class="hidden lg:hidden border-b border-slate-800 bg-slate-950/95 backdrop-blur-2xl px-6 py-6 space-y-4">
            <a href="<?= base_url() ?>" class="block py-2 text-sm font-bold text-white hover:text-accent">Beranda</a>
            <a href="<?= base_url('menu') ?>" class="block py-2 text-sm font-bold text-slate-300 hover:text-accent">Katalog Menu & Filter</a>
            <a href="<?= base_url() ?>#filosofi" class="block py-2 text-sm font-bold text-slate-300 hover:text-accent">Filosofi Sehat Tinutuan</a>
            <a href="<?= base_url() ?>#promo" class="block py-2 text-sm font-bold text-slate-300 hover:text-accent">Paket Promo Komplit</a>
            <a href="<?= base_url() ?>#kontak" class="block py-2 text-sm font-bold text-slate-300 hover:text-accent">Outlet & Kontak</a>
            <div class="pt-4 border-t border-slate-800 flex flex-col gap-3">
                <a href="<?= base_url('menu') ?>" class="w-full text-center py-3 bg-gradient-to-r from-primary to-purple-600 text-white font-bold rounded-xl text-sm shadow-md">
                    <i class="fa-solid fa-bag-shopping mr-2 text-accent"></i> Pesan Menu Sekarang
                </a>
                <a href="<?= base_url('login') ?>" class="w-full text-center py-2.5 bg-slate-900 border border-slate-700 text-slate-300 font-semibold rounded-xl text-xs">
                    <i class="fa-solid fa-lock mr-2 text-accent"></i> Panel Login Admin (CRUD)
                </a>
            </div>
        </div>
    </header>

    <!-- Dynamic Content -->
    <main class="flex-1">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Modern Franchise Footer -->
    <footer class="bg-slate-950 border-t border-slate-800/80 text-slate-400 pt-16 pb-8 relative overflow-hidden" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <!-- Col 1: Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-primary to-accent flex items-center justify-center text-white shadow-lg">
                            <i class="fa-solid fa-bowl-food text-lg"></i>
                        </div>
                        <span class="font-display font-extrabold text-xl text-white">Aprilianto's Tinutuan</span>
                    </div>
                    <p class="text-xs leading-relaxed text-slate-400">
                        Mengangkat kuliner warisan leluhur Minahasa ke standar franchise modern berkelas dunia. Nikmati kesegaran labu kuning, kangkung, kemangi, dan sambal roa asli Sulawesi Utara.
                    </p>
                    <div class="flex items-center space-x-3 pt-2">
                        <a href="#" class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-primary hover:text-primary flex items-center justify-center text-xs transition-colors">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-primary hover:text-primary flex items-center justify-center text-xs transition-colors">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-primary hover:text-primary flex items-center justify-center text-xs transition-colors">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Kategori Populer -->
                <div>
                    <h3 class="font-display font-bold text-sm text-white uppercase tracking-wider mb-4 border-l-2 border-primary pl-3">Kategori Menu</h3>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="<?= base_url('menu?cat=1') ?>" class="hover:text-accent transition-colors flex items-center space-x-2"><i class="fa-solid fa-angle-right text-[10px] text-primary"></i> <span>Tinutuan Spesial Manado</span></a></li>
                        <li><a href="<?= base_url('menu?cat=2') ?>" class="hover:text-accent transition-colors flex items-center space-x-2"><i class="fa-solid fa-angle-right text-[10px] text-primary"></i> <span>Paket Komplit Juara</span></a></li>
                        <li><a href="<?= base_url('menu?cat=3') ?>" class="hover:text-accent transition-colors flex items-center space-x-2"><i class="fa-solid fa-angle-right text-[10px] text-primary"></i> <span>Perkedel & Pisang Goroho</span></a></li>
                        <li><a href="<?= base_url('menu?cat=4') ?>" class="hover:text-accent transition-colors flex items-center space-x-2"><i class="fa-solid fa-angle-right text-[10px] text-primary"></i> <span>Es Brenebon & Klappertaart</span></a></li>
                    </ul>
                </div>

                <!-- Col 3: Outlet & Jam Operasional -->
                <div>
                    <h3 class="font-display font-bold text-sm text-white uppercase tracking-wider mb-4 border-l-2 border-accent pl-3">Jam & Lokasi</h3>
                    <div class="space-y-3 text-xs">
                        <div class="flex items-start space-x-2">
                            <i class="fa-solid fa-clock text-accent mt-0.5"></i>
                            <div>
                                <p class="font-semibold text-white">Buka Setiap Hari</p>
                                <p class="text-slate-400">06.30 - 22.00 WITA / WIB</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fa-solid fa-location-dot text-primary mt-0.5"></i>
                            <div>
                                <p class="font-semibold text-white">Outlet Utama Manado</p>
                                <p class="text-slate-400">Jl. Sam Ratulangi No. 128, Manado, Sulawesi Utara</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Col 4: Informasi Ujian -->
                <div class="p-5 rounded-2xl bg-slate-900/90 border border-slate-800">
                    <div class="flex items-center space-x-2 text-xs font-bold text-accent mb-2">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Identitas Siswa Peserta</span>
                    </div>
                    <ul class="text-xs space-y-1.5 text-slate-300">
                        <li><strong class="text-white">No Peserta:</strong> 23</li>
                        <li><strong class="text-white">Nama:</strong> Wisnu Aprilianto</li>
                        <li><strong class="text-white">Daerah Asal:</strong> Sulawesi Utara</li>
                        <li><strong class="text-white">Tema:</strong> Tinutuan (Bubur Manado)</li>
                        <li><strong class="text-white">Warna:</strong> #9333EA & #FBBF24</li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="border-t border-slate-800/80 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
                <p>© <?= date('Y') ?> <strong>Aprilianto's Tinutuan</strong>. Dikembangkan dengan CodeIgniter 4 + Tailwind CSS + MySQL.</p>
                <div class="flex items-center space-x-4">
                    <a href="<?= base_url('login') ?>" class="text-accent hover:underline font-semibold flex items-center space-x-1">
                        <i class="fa-solid fa-lock text-[10px]"></i>
                        <span>Panel Admin</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script for mobile menu toggle -->
    <script>
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
