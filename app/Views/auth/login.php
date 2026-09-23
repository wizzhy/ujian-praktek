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
<body class="bg-gradient-to-br from-slate-950 via-purple-950 to-slate-900 min-h-screen flex items-center justify-center p-4 antialiased font-sans relative overflow-hidden">

    <!-- Decorative background glow -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-gradient-to-tr from-primary to-accent shadow-2xl shadow-primary/40 mb-4 p-1">
                <div class="w-full h-full bg-slate-900/90 rounded-[22px] flex items-center justify-center text-accent">
                    <i class="fa-solid fa-bowl-food text-3xl"></i>
                </div>
            </div>
            <h1 class="font-display font-extrabold text-3xl text-white tracking-tight">Aprilianto's Tinutuan</h1>
            <p class="text-sm font-medium text-slate-400 mt-1">Admin Panel Pengelolaan Menu & Restoran</p>
            <div class="mt-2 inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-primary/20 border border-primary/40 text-purple-300">
                <i class="fa-solid fa-certificate text-accent text-xs"></i>
                <span>Sulawesi Utara • Makanan Khas Manado</span>
            </div>
        </div>

        <!-- Card Container -->
        <div class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl shadow-black/60 relative">
            <!-- Flash Alerts -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-sm flex items-center space-x-3">
                    <i class="fa-solid fa-circle-exclamation text-rose-400 text-lg flex-shrink-0"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-sm flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-emerald-400 text-lg flex-shrink-0"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs">
                    <ul class="list-disc list-inside space-y-1">
                        <?php foreach (session()->getFlashdata('errors') as $err): ?>
                            <li><?= esc($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Login Form with Form Validation -->
            <form action="<?= base_url('login/process') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>

                <div>
                    <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                        Username Admin
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" id="username" name="username" value="<?= old('username', 'admin') ?>" required
                               placeholder="Masukkan username"
                               class="w-full pl-11 pr-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm transition-all duration-200">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" id="password" name="password" required
                               placeholder="Masukkan password"
                               value="admin123"
                               class="w-full pl-11 pr-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm transition-all duration-200">
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5 flex items-center">
                        <i class="fa-solid fa-circle-info text-accent mr-1"></i> Default demo: <span class="text-white font-mono ml-1">admin / admin123</span>
                    </p>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-primary to-purple-700 hover:from-purple-600 hover:to-primary text-white font-bold rounded-xl shadow-lg shadow-primary/40 hover:shadow-primary/60 transition-all duration-200 flex items-center justify-center space-x-2 text-sm group">
                    <span>Masuk ke Dashboard</span>
                    <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-800 text-center">
                <a href="<?= base_url() ?>" class="inline-flex items-center space-x-2 text-xs font-medium text-slate-400 hover:text-accent transition-colors">
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
