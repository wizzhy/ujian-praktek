<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel - Aprilianto\'s Tinutuan') ?></title>
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
                        'dark-navy': '#0F172A',
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
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col md:flex-row">

    <!-- Sidebar Desktop -->
    <aside class="w-full md:w-64 bg-slate-900 text-white flex-shrink-0 flex flex-col justify-between shadow-2xl z-20">
        <div>
            <!-- Brand Logo -->
            <div class="p-6 border-b border-slate-800/80">
                <a href="<?= base_url() ?>" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-primary to-accent flex items-center justify-center text-white shadow-lg shadow-primary/30 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-bowl-food text-lg"></i>
                    </div>
                    <div>
                        <span class="font-display font-extrabold text-lg tracking-tight text-white block">Aprilianto's</span>
                        <span class="text-[10px] tracking-widest uppercase font-semibold text-accent block">Tinutuan Manado</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5">
                <div class="px-3 py-2 text-xs font-bold text-slate-400 uppercase tracking-wider">Menu Manajemen</div>
                
                <a href="<?= base_url('admin/menu') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 <?= (uri_string() == 'admin/menu' || uri_string() == 'admin') ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' ?>">
                    <i class="fa-solid fa-utensils w-5 text-center"></i>
                    <span>Daftar Menu</span>
                </a>

                <a href="<?= base_url('admin/menu/create') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-xl font-medium text-sm transition-all duration-200 <?= (uri_string() == 'admin/menu/create') ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' ?>">
                    <i class="fa-solid fa-plus-circle w-5 text-center text-accent"></i>
                    <span>Tambah Menu Baru</span>
                </a>

                <div class="pt-4 px-3 py-2 text-xs font-bold text-slate-400 uppercase tracking-wider">Akses Cepat</div>

                <a href="<?= base_url() ?>" target="_blank" class="flex items-center justify-between px-4 py-3 rounded-xl font-medium text-sm text-slate-300 hover:bg-slate-800 hover:text-white transition-all">
                    <span class="flex items-center space-x-3">
                        <i class="fa-solid fa-globe w-5 text-center text-emerald-400"></i>
                        <span>Lihat Website</span>
                    </span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs text-slate-500"></i>
                </a>
            </nav>
        </div>

        <!-- User Info & Logout -->
        <div class="p-4 border-t border-slate-800 bg-slate-950/50">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-primary/20 border border-primary/50 text-purple-300 flex items-center justify-center font-bold text-sm">
                        <?= strtoupper(substr(session()->get('name') ?? 'W', 0, 1)) ?>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-semibold text-white truncate"><?= esc(session()->get('name') ?? 'Wisnu Aprilianto') ?></p>
                        <p class="text-xs text-accent truncate">Administrator</p>
                    </div>
                </div>
                <a href="<?= base_url('logout') ?>" onclick="return confirm('Apakah Anda yakin ingin logout?')" title="Logout" class="p-2 text-slate-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-colors">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto custom-scrollbar">
        <!-- Top Navigation Bar -->
        <header class="bg-white border-b border-slate-200/80 sticky top-0 z-10 px-6 py-4 flex items-center justify-between shadow-xs">
            <div class="flex items-center space-x-3">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-purple-100 text-primary border border-purple-200">
                    <i class="fa-solid fa-utensils mr-1.5 text-xs"></i> Ujian Praktik On The Spot
                </span>
                <span class="hidden sm:inline-block text-slate-300">|</span>
                <span class="hidden sm:inline-block text-xs font-medium text-slate-500">
                    Sulawesi Utara • <strong class="text-slate-700">Tinutuan (Bubur Manado)</strong>
                </span>
            </div>

            <div class="flex items-center space-x-3">
                <a href="<?= base_url() ?>" class="inline-flex items-center space-x-1.5 text-xs font-semibold px-3 py-1.5 rounded-lg border border-slate-200 text-slate-600 hover:text-primary hover:border-primary/40 bg-white transition-all shadow-xs">
                    <i class="fa-solid fa-external-link text-xs"></i>
                    <span>Preview Website</span>
                </a>
                <a href="<?= base_url('logout') ?>" class="inline-flex items-center space-x-1.5 text-xs font-semibold px-3 py-1.5 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 border border-rose-200 transition-all">
                    <i class="fa-solid fa-power-off text-xs"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="px-6 pt-6">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="flex items-center p-4 mb-4 text-sm text-emerald-800 rounded-xl bg-emerald-50 border border-emerald-200 shadow-sm" role="alert">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-lg mr-3"></i>
                    <div>
                        <span class="font-bold">Berhasil!</span> <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="flex items-center p-4 mb-4 text-sm text-rose-800 rounded-xl bg-rose-50 border border-rose-200 shadow-sm" role="alert">
                    <i class="fa-solid fa-circle-exclamation text-rose-500 text-lg mr-3"></i>
                    <div>
                        <span class="font-bold">Perhatian:</span> <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="p-4 mb-4 text-sm text-rose-800 rounded-xl bg-rose-50 border border-rose-200 shadow-sm" role="alert">
                    <div class="flex items-center mb-2">
                        <i class="fa-solid fa-triangle-exclamation text-rose-500 text-lg mr-3"></i>
                        <span class="font-bold">Harap periksa kesalahan input berikut:</span>
                    </div>
                    <ul class="list-disc list-inside ml-6 space-y-1 text-xs text-rose-700">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <!-- Page Dynamic Content -->
        <div class="p-6">
            <?= $this->renderSection('content') ?>
        </div>

        <!-- Footer -->
        <footer class="mt-auto px-6 py-4 bg-white border-t border-slate-200 text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-2">
            <div>
                © <?= date('Y') ?> <strong>Aprilianto's Tinutuan</strong> — Wisnu Aprilianto (No. 23)
            </div>
            <div class="flex items-center space-x-2 text-slate-400">
                <span>CodeIgniter 4</span>
                <span>•</span>
                <span>Tailwind CSS</span>
                <span>•</span>
                <span>MySQL</span>
            </div>
        </footer>
    </main>

</body>
</html>
