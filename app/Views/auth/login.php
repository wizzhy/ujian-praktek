<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login Admin - Aprilianto\'s Tinutuan') ?></title>
    <!-- Fonts -->
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
                        accent: '#FBBF24',
                        'accent-dark': '#F59E0B',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-b from-purple-50 via-slate-50 to-slate-100 min-h-screen flex items-center justify-center p-4 antialiased font-sans">

    <div class="w-full max-w-md">
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-purple-800 text-amber-300 shadow-md shadow-primary/20 mb-3">
                <i class="fa-solid fa-bowl-food text-2xl"></i>
            </div>
            <h1 class="font-display font-extrabold text-2xl text-slate-900 tracking-tight">Aprilianto's Tinutuan</h1>
            <p class="text-xs font-medium text-slate-500 mt-1">Panel Admin Pengelolaan Menu & Restoran</p>
            <div class="mt-2.5 inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-primary border border-purple-200">
                <i class="fa-solid fa-certificate text-accent-dark text-xs"></i>
                <span>Sulawesi Utara • Kuliner Tradisional Manado</span>
            </div>
        </div>

        <!-- Card Container -->
        <div class="bg-white border border-slate-200 rounded-3xl p-7 sm:p-8 shadow-xl">
            <!-- Flash Alerts -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-5 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs flex items-center space-x-2.5">
                    <i class="fa-solid fa-circle-exclamation text-rose-500 text-base flex-shrink-0"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-5 p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center space-x-2.5">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-base flex-shrink-0"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="mb-5 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                    <ul class="list-disc list-inside space-y-1">
                        <?php foreach (session()->getFlashdata('errors') as $err): ?>
                            <li><?= esc($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Login Form with Form Validation -->
            <form action="<?= base_url('login/process') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">
                        Username Admin
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-user text-xs"></i>
                        </div>
                        <input type="text" id="username" name="username" value="<?= old('username', 'admin') ?>" required
                               placeholder="Masukkan username"
                               class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white text-xs sm:text-sm transition-all">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-700 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-lock text-xs"></i>
                        </div>
                        <input type="password" id="password" name="password" required
                               placeholder="Masukkan password"
                               value="admin123"
                               class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white text-xs sm:text-sm transition-all">
                    </div>
                    <div class="mt-2 p-2 rounded-lg bg-purple-50 border border-purple-100 text-[11px] text-purple-900 flex items-center justify-between">
                        <span><i class="fa-solid fa-key text-primary mr-1"></i> Demo Login:</span>
                        <span class="font-mono font-bold">admin / admin123</span>
                    </div>
                </div>

                <button type="submit" class="w-full py-3 px-4 bg-primary hover:bg-primary-dark text-white font-bold rounded-xl shadow-md shadow-primary/20 transition-all flex items-center justify-center space-x-2 text-xs sm:text-sm">
                    <span>Masuk ke Dashboard</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-slate-100 text-center">
                <a href="<?= base_url() ?>" class="inline-flex items-center space-x-2 text-xs font-medium text-slate-600 hover:text-primary transition-colors">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali ke Halaman Depan Website</span>
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-slate-500 mt-6">
            Ujian Praktik Pemrograman Web • Wisnu Aprilianto (No. 23)
        </p>
    </div>

</body>
</html>
