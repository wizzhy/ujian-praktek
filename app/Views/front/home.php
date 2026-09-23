<?= $this->extend('layouts/front_layout') ?>

<?= $this->section('content') ?>

<!-- 1. HERO SECTION: Ultra Modern Franchise Style -->
<section class="relative min-h-[90vh] flex items-center overflow-hidden bg-gradient-to-br from-slate-950 via-purple-950/60 to-slate-950 py-16 lg:py-24">
    <!-- Ambient Glow Lights -->
    <div class="absolute top-10 left-10 w-[500px] h-[500px] bg-primary/25 rounded-full blur-[140px] pointer-events-none animate-pulse-slow"></div>
    <div class="absolute bottom-10 right-10 w-[450px] h-[450px] bg-accent/20 rounded-full blur-[130px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Hero Text Content (7 cols) -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <!-- Pill Badge -->
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-slate-900/90 border border-purple-500/30 backdrop-blur-md shadow-md">
                    <span class="w-2 h-2 rounded-full bg-accent"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-accent">Kuliner Tradisional Sulawesi Utara</span>
                </div>

                <!-- Main Catchy Headline -->
                <h1 class="font-display font-black text-4xl sm:text-6xl xl:text-7xl text-white tracking-tight leading-[1.08]">
                    Kehangatan Autentik <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-purple-400 via-amber-300 to-accent bg-clip-text text-transparent">Tinutuan Manado</span> <br>
                    Warisan Minahasa
                </h1>

                <!-- Subtitle -->
                <p class="text-base sm:text-lg text-slate-300 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
                    Bubur Manado kaya sayuran segar, kelembutan labu kuning manis, pipilan jagung, serta gurihnya suwiran <strong>Cakalang Fufu Bitung</strong> berpadu pedas harum <strong>Sambal Roa</strong>.
                </p>

                <!-- Hero Action Buttons -->
                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="<?= base_url('menu') ?>" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-gradient-to-r from-primary to-purple-600 hover:from-primary-light hover:to-primary text-white font-bold text-sm tracking-wide shadow-lg shadow-primary/30 transition-all duration-200 flex items-center justify-center space-x-2.5">
                        <i class="fa-solid fa-utensils text-accent text-sm"></i>
                        <span>Lihat Menu & Pesan</span>
                    </a>

                    <a href="#filosofi" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-700/80 text-slate-200 font-semibold text-sm transition-all duration-200 flex items-center justify-center space-x-2">
                        <span>Tentang Tinutuan</span>
                        <i class="fa-solid fa-arrow-down text-xs text-slate-400"></i>
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="pt-8 border-t border-slate-800/80 grid grid-cols-3 gap-4 max-w-md mx-auto lg:mx-0">
                    <div>
                        <p class="font-display font-black text-2xl sm:text-3xl text-white">100%</p>
                        <p class="text-[11px] text-slate-400 uppercase tracking-wider font-semibold">Sayur Alami</p>
                    </div>
                    <div>
                        <p class="font-display font-black text-2xl sm:text-3xl text-accent">10+</p>
                        <p class="text-[11px] text-slate-400 uppercase tracking-wider font-semibold">Variasi Menu</p>
                    </div>
                    <div>
                        <p class="font-display font-black text-2xl sm:text-3xl text-primary-light">4.9 ★</p>
                        <p class="text-[11px] text-slate-400 uppercase tracking-wider font-semibold">Ulasan Rasa</p>
                    </div>
                </div>
            </div>

            <!-- Hero Food Visual Showcase (5 cols) -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Main Hero Image Frame -->
                    <div class="relative rounded-3xl overflow-hidden bg-slate-900 border-2 border-primary/40 shadow-2xl shadow-purple-950/80 group aspect-[4/3] sm:aspect-square">
                        <img src="<?= base_url('uploads/menu/hero_tinutuan.jpg') ?>" alt="Aprilianto's Tinutuan Feast" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-transparent"></div>

                        <!-- Floating Promo Tag on Bottom Left -->
                        <div class="absolute bottom-4 left-4 right-4 p-4 rounded-2xl bg-slate-950/85 backdrop-blur-md border border-slate-800 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase tracking-widest text-accent font-extrabold block">Signature Menu</span>
                                <span class="text-sm font-bold text-white block">Tinutuan Cakalang Fufu</span>
                            </div>
                            <span class="px-3 py-1.5 rounded-xl bg-primary text-white font-black text-xs shadow-md">
                                Rp 32.000
                            </span>
                        </div>
                    </div>

                    <!-- Floating Card Top Right -->
                    <div class="absolute -top-6 -right-4 sm:-right-6 p-3.5 rounded-2xl bg-slate-900/95 border border-primary/50 backdrop-blur-xl shadow-2xl flex items-center space-x-3 hidden sm:flex">
                        <div class="w-10 h-10 rounded-xl bg-accent/20 flex items-center justify-center text-accent">
                            <i class="fa-solid fa-pepper-hot text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Sambal Roa Panggang</p>
                            <p class="text-[10px] text-slate-400">Pedas Gurih Autentik</p>
                        </div>
                    </div>

                    <!-- Floating Card Bottom Left -->
                    <div class="absolute -bottom-6 -left-4 sm:-left-6 p-3.5 rounded-2xl bg-slate-900/95 border border-amber-500/50 backdrop-blur-xl shadow-2xl flex items-center space-x-3 hidden sm:flex">
                        <div class="w-10 h-10 rounded-xl bg-primary/20 flex items-center justify-center text-purple-300">
                            <i class="fa-solid fa-heart-pulse text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">Bebas Kolesterol</p>
                            <p class="text-[10px] text-slate-400">Kaya Serat & Vitamin</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. SECTION: FILOSOFI & KEUNGGULAN TINUTUAN SEBAGAI SUPERFOOD -->
<section class="py-20 bg-slate-950 border-t border-slate-800/80 relative" id="filosofi">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-purple-500/10 border border-primary/30 text-purple-300 mb-3">
                <i class="fa-solid fa-leaf mr-1.5 text-accent"></i> Mengapa Memilih Tinutuan?
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                Tradisi Sarapan Sehat dari Bumi Nyiur Melambai
            </h2>
            <p class="text-sm text-slate-400 mt-3 leading-relaxed">
                Tinutuan bukan sekadar bubur biasa. Hidangan khas Manado ini dimasak dengan harmoni perpaduan labu kuning manis, aneka dedaunan hijau bernutrisi tinggi, dan jagung segar tanpa santan sehingga sangat ramah untuk kesehatan jantung Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Item 1: Labu Kuning -->
            <div class="rounded-3xl bg-slate-900/80 border border-slate-800 hover:border-primary/50 overflow-hidden transition-all duration-300 hover:-translate-y-1.5 group shadow-xl flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-950 relative">
                    <img src="<?= base_url('uploads/menu/ing_labu_kuning.jpg') ?>" alt="Labu Kuning Manis (Sambiki)" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-950/85 backdrop-blur-md text-amber-300 border border-amber-500/30 shadow">
                        Kaya Vitamin A
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-white group-hover:text-accent transition-colors">Labu Kuning Manis</h3>
                        <p class="text-xs text-slate-400 mt-2 leading-relaxed">
                            Dikenal sebagai <em>sambiki</em> di Minahasa. Menghadirkan warna kuning keemasan alami dengan tekstur lembut, manis alami, dan kaya antioksidan beta-karoten.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 2: Aneka Sayuran Hijau -->
            <div class="rounded-3xl bg-slate-900/80 border border-slate-800 hover:border-primary/50 overflow-hidden transition-all duration-300 hover:-translate-y-1.5 group shadow-xl flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-950 relative">
                    <img src="<?= base_url('uploads/menu/ing_sayur_segar.jpg') ?>" alt="Kangkung dan Bayam Segar" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-950/85 backdrop-blur-md text-emerald-300 border border-emerald-500/30 shadow">
                        Serat Tinggi
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-white group-hover:text-accent transition-colors">Kangkung & Bayam Segar</h3>
                        <p class="text-xs text-slate-400 mt-2 leading-relaxed">
                            Dipetik segar setiap pagi. Perpaduan sayuran hijau bernutrisi tinggi kaya zat besi dan serat pangan alami yang menyehatkan metabolisme tubuh.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 3: Daun Kemangi Aromatik -->
            <div class="rounded-3xl bg-slate-900/80 border border-slate-800 hover:border-primary/50 overflow-hidden transition-all duration-300 hover:-translate-y-1.5 group shadow-xl flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-950 relative">
                    <img src="<?= base_url('uploads/menu/ing_kemangi.jpg') ?>" alt="Kemangi Aromatik" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-950/85 backdrop-blur-md text-purple-300 border border-purple-500/30 shadow">
                        Aroma Khas
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-white group-hover:text-accent transition-colors">Kemangi Aromatik</h3>
                        <p class="text-xs text-slate-400 mt-2 leading-relaxed">
                            Ciri khas wewangian autentik Tinutuan. Daun kemangi segar memberikan keharuman sitrun lembut yang menenangkan dan menggugah selera makan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 4: Cakalang Fufu & Roa -->
            <div class="rounded-3xl bg-slate-900/80 border border-slate-800 hover:border-primary/50 overflow-hidden transition-all duration-300 hover:-translate-y-1.5 group shadow-xl flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-950 relative">
                    <img src="<?= base_url('uploads/menu/ing_cakalang_fufu.jpg') ?>" alt="Cakalang Fufu dan Roa Asap" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-950/85 backdrop-blur-md text-rose-300 border border-rose-500/30 shadow">
                        Tinggi Protein
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-white group-hover:text-accent transition-colors">Cakalang Fufu & Roa</h3>
                        <p class="text-xs text-slate-400 mt-2 leading-relaxed">
                            Ikan cakalang asap khas Bitung dan ikan roa Minahasa berkualitas premium dengan sensasi rasa gurih berkarakter dan kaya asam lemak Omega-3.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. SECTION: SHOWCASE MENU DENGAN LIVE FILTER INTERAKTIF -->
<section class="py-20 bg-gradient-to-b from-slate-950 via-purple-950/20 to-slate-950 border-t border-slate-800/80" id="menu">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-accent block mb-1">
                    <i class="fa-solid fa-utensils mr-1.5"></i> Varian Makanan Terbaik
                </span>
                <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                    Jelajahi Menu Pilihan Kami
                </h2>
            </div>
            <div>
                <a href="<?= base_url('menu') ?>" class="inline-flex items-center space-x-2 text-xs font-bold px-5 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-700 text-white transition-all shadow-sm">
                    <i class="fa-solid fa-sliders text-accent"></i>
                    <span>Buka Filter & Katalog Penuh (<?= count($allMenus) ?> Menu)</span>
                </a>
            </div>
        </div>

        <!-- Category Tab Buttons (Memenuhi Fitur Khusus: Filter di Homepage) -->
        <div class="flex flex-wrap gap-2.5 mb-10 pb-2 overflow-x-auto">
            <button onclick="filterCategory('all')" class="cat-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all bg-primary text-white shadow-lg shadow-primary/30" data-cat="all">
                Semua Menu
            </button>
            <?php foreach ($categories as $cat): ?>
                <button onclick="filterCategory('<?= $cat['id'] ?>')" class="cat-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all bg-slate-900 border border-slate-800 text-slate-300 hover:bg-slate-800" data-cat="<?= $cat['id'] ?>">
                    <?= esc($cat['name']) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Menu Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="menuCardsContainer">
            <?php foreach ($allMenus as $m): ?>
                <div class="menu-item-card bg-slate-900/90 rounded-3xl border border-slate-800 hover:border-primary/50 overflow-hidden shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col group" data-category="<?= $m['category_id'] ?>">
                    <!-- Card Image -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-950">
                        <?php 
                            $imgSrc = base_url('uploads/menu/' . $m['image']);
                            if (empty($m['image']) || !file_exists(FCPATH . 'uploads/menu/' . $m['image'])) {
                                $imgSrc = 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=400&auto=format&fit=crop&q=80';
                            }
                        ?>
                        <img src="<?= $imgSrc ?>" alt="<?= esc($m['name']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <div class="absolute top-3 left-3 flex flex-col gap-1">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-950/80 backdrop-blur-md border border-purple-500/40 text-purple-300">
                                <?= esc($m['category_name'] ?? 'Tinutuan') ?>
                            </span>
                        </div>

                        <?php if ($m['is_favorite']): ?>
                            <div class="absolute top-3 right-3">
                                <span class="w-7 h-7 rounded-full bg-accent text-slate-950 flex items-center justify-center text-xs shadow-lg" title="Menu Favorit">
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        <?php endif; ?>

                        <!-- Spiciness & Calories -->
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] font-semibold">
                            <span class="px-2 py-0.5 rounded-full bg-slate-950/85 backdrop-blur-md text-slate-300 border border-slate-700">
                                <i class="fa-solid fa-fire text-accent mr-1"></i> <?= esc($m['calories']) ?> kkal
                            </span>
                            <?php if ($m['spiciness_level'] == 0): ?>
                                <span class="px-2 py-0.5 rounded-full bg-slate-950/85 backdrop-blur-md text-emerald-400 border border-emerald-500/40">
                                    Lv 0 (Tidak Pedas)
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-0.5 rounded-full bg-slate-950/85 backdrop-blur-md text-rose-400 border border-rose-500/40">
                                    Lv <?= $m['spiciness_level'] ?> Pedas
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="font-display font-extrabold text-base text-white group-hover:text-amber-300 transition-colors line-clamp-1">
                                <?= esc($m['name']) ?>
                            </h3>
                            <p class="text-xs text-slate-400 line-clamp-2 mt-1.5 leading-relaxed">
                                <?= esc($m['description']) ?>
                            </p>
                        </div>

                        <!-- Card Footer -->
                        <div class="pt-3 border-t border-slate-800 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-slate-400 block">Harga</span>
                                <span class="font-black text-amber-400 text-base">
                                    Rp <?= number_format($m['price'], 0, ',', '.') ?>
                                </span>
                            </div>
                            <a href="<?= base_url('menu/' . $m['slug']) ?>" class="px-3.5 py-2 rounded-xl bg-gradient-to-r from-primary to-purple-600 hover:from-primary-light hover:to-primary text-white text-xs font-bold shadow-md shadow-primary/30 transition-all flex items-center space-x-1">
                                <span>Detail</span>
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 4. SECTION: PROMO COMBO SPECIAL (Franchise-style Deals) -->
<section class="py-20 bg-slate-950 border-t border-slate-800/80 relative overflow-hidden" id="promo">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-br from-primary/30 via-slate-900 to-slate-950 border border-primary/40 p-8 sm:p-12 relative overflow-hidden shadow-2xl">
            <div class="absolute right-0 top-0 w-96 h-96 bg-accent/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-7 space-y-4 text-center lg:text-left">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider bg-accent text-slate-950 shadow">
                        <i class="fa-solid fa-fire mr-1.5"></i> Paket Juara Paling Hemat
                    </span>
                    <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                        Paket Komplit Tinutuan Juara
                    </h2>
                    <p class="text-sm text-slate-300 max-w-xl leading-relaxed">
                        Rasakan kebahagiaan sarapan autentik Manado: 1 Porsi Tinutuan Cakalang Fufu Suwir + 2 Perkedel Jagung Crispy Renyah + 1 Cup Sambal Roa Panggang Asap + Es Teh Manis Dingin Segar.
                    </p>
                    <div class="pt-2 flex items-baseline space-x-3 justify-center lg:justify-start">
                        <span class="text-3xl sm:text-4xl font-black text-amber-400">Rp 42.000</span>
                        <span class="text-sm text-slate-500 line-through">Rp 55.000</span>
                        <span class="text-xs font-bold text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-md">Hemat 24%</span>
                    </div>
                    <div class="pt-4">
                        <a href="<?= base_url('menu/paket-komplit-tinutuan-juara') ?>" class="inline-flex items-center space-x-2 px-8 py-3.5 rounded-xl bg-gradient-to-r from-accent to-amber-500 hover:from-amber-400 hover:to-accent text-slate-950 font-black text-xs uppercase tracking-wider shadow-xl shadow-amber-500/20 transition-all">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>Pesan Paket Ini Sekarang</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-2xl overflow-hidden border border-slate-700/80 shadow-2xl group aspect-[4/3]">
                        <img src="<?= base_url('uploads/menu/paket_komplit_tinutuan.jpg') ?>" alt="Paket Komplit Tinutuan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. SECTION: TESTIMONI PELANGGAN -->
<section class="py-20 bg-slate-950 border-t border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-xs font-bold uppercase tracking-wider text-accent">Suara Pelanggan Setia</span>
            <h2 class="font-display font-black text-3xl text-white tracking-tight mt-1">
                Kisah dari Meja Makan Aprilianto
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-3xl bg-slate-900/70 border border-slate-800 space-y-4">
                <div class="flex text-amber-400 text-xs space-x-1">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed italic">
                    "Akhirnya nemu Tinutuan dengan rasa yang bener-bener autentik seperti di Manado! Labu kuningnya manis legit, sayurnya melimpah, dan cakalang fufunya wangi asap banget. Recommended!"
                </p>
                <div class="pt-2 border-t border-slate-800 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-primary/20 text-purple-300 font-bold flex items-center justify-center text-xs">RN</div>
                    <div>
                        <p class="text-xs font-bold text-white">Rivaldo N.</p>
                        <p class="text-[10px] text-slate-500">Food Blogger Manado</p>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-3xl bg-slate-900/70 border border-slate-800 space-y-4">
                <div class="flex text-amber-400 text-xs space-x-1">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed italic">
                    "Perkedel jagungnya renyah kebangetan di luar tapi manis jagungnya berasa banget di dalem. Apalagi dicocol sama sambal roa asli Minahasa, pedasnya nagih pol!"
                </p>
                <div class="pt-2 border-t border-slate-800 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-accent/20 text-amber-300 font-bold flex items-center justify-center text-xs">SP</div>
                    <div>
                        <p class="text-xs font-bold text-white">Siti Permata</p>
                        <p class="text-[10px] text-slate-500">Pecinta Kuliner Nusantara</p>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-3xl bg-slate-900/70 border border-slate-800 space-y-4">
                <div class="flex text-amber-400 text-xs space-x-1">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed italic">
                    "Suka banget sama konsep modern waralabanya, bersih, higienis, kemasan pesan antarnya rapi banget. Es brenebon kacang merahnya juga penutup manis yang juara."
                </p>
                <div class="pt-2 border-t border-slate-800 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-emerald-500/20 text-emerald-300 font-bold flex items-center justify-center text-xs">BK</div>
                    <div>
                        <p class="text-xs font-bold text-white">Budi Kusuma</p>
                        <p class="text-[10px] text-slate-500">Pelanggan Setia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script for Interactive Category Filter on Homepage -->
<script>
    function filterCategory(catId) {
        // Toggle active button style
        const buttons = document.querySelectorAll('.cat-btn');
        buttons.forEach(btn => {
            if (btn.getAttribute('data-cat') === catId) {
                btn.className = 'cat-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all bg-primary text-white shadow-lg shadow-primary/30';
            } else {
                btn.className = 'cat-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all bg-slate-900 border border-slate-800 text-slate-300 hover:bg-slate-800';
            }
        });

        // Filter cards
        const cards = document.querySelectorAll('.menu-item-card');
        cards.forEach(card => {
            if (catId === 'all' || card.getAttribute('data-category') === catId) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<?= $this->endSection() ?>
