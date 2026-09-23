<?= $this->extend('layouts/front_layout') ?>

<?= $this->section('content') ?>

<!-- 1. HERO SECTION: Clean & Fresh Modern Restaurant Style -->
<section class="relative bg-gradient-to-b from-purple-50/70 via-white to-slate-50 py-16 lg:py-24 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">
            
            <!-- Hero Text Content (7 cols) -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <!-- Pill Badge -->
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-purple-100 border border-purple-200 text-primary text-xs font-bold shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-accent-dark"></span>
                    <span class="tracking-wide">Kuliner Tradisional Sulawesi Utara</span>
                </div>

                <!-- Main Headline -->
                <h1 class="font-display font-black text-4xl sm:text-6xl xl:text-7xl text-slate-900 tracking-tight leading-[1.1]">
                    Kehangatan Autentik <br class="hidden sm:inline">
                    <span class="text-primary">Tinutuan Manado</span> <br>
                    Warisan Minahasa
                </h1>

                <!-- Subtitle -->
                <p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
                    Bubur Manado kaya sayuran segar, kelembutan labu kuning manis, pipilan jagung, serta gurihnya suwiran <strong>Cakalang Fufu Bitung</strong> berpadu pedas harum <strong>Sambal Roa</strong>.
                </p>

                <!-- Action Buttons -->
                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="<?= base_url('menu') ?>" class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-primary hover:bg-primary-dark text-white font-bold text-sm tracking-wide shadow-md shadow-primary/20 transition-all flex items-center justify-center space-x-2.5">
                        <i class="fa-solid fa-utensils text-accent text-sm"></i>
                        <span>Lihat Menu & Pesan</span>
                    </a>

                    <a href="#filosofi" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 font-semibold text-sm transition-all flex items-center justify-center space-x-2 shadow-xs">
                        <span>Tentang Tinutuan</span>
                        <i class="fa-solid fa-arrow-down text-xs text-slate-400"></i>
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="pt-8 border-t border-slate-200 grid grid-cols-3 gap-6 max-w-md mx-auto lg:mx-0">
                    <div>
                        <p class="font-display font-black text-2xl sm:text-3xl text-slate-900">100%</p>
                        <p class="text-xs text-slate-500 font-medium">Sayur Alami</p>
                    </div>
                    <div>
                        <p class="font-display font-black text-2xl sm:text-3xl text-primary">10+</p>
                        <p class="text-xs text-slate-500 font-medium">Variasi Menu</p>
                    </div>
                    <div>
                        <p class="font-display font-black text-2xl sm:text-3xl text-amber-600">4.9 ★</p>
                        <p class="text-xs text-slate-500 font-medium">Ulasan Rasa</p>
                    </div>
                </div>
            </div>

            <!-- Hero Food Visual Showcase (5 cols) -->
            <div class="lg:col-span-5">
                <div class="mx-auto max-w-md lg:max-w-none space-y-4">
                    <!-- Main Hero Image Frame -->
                    <div class="relative rounded-3xl overflow-hidden bg-slate-100 border border-slate-200 shadow-lg group aspect-[4/3] sm:aspect-square">
                        <img src="<?= base_url('uploads/menu/hero_tinutuan.jpg') ?>" alt="Aprilianto's Tinutuan Feast" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Top Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-white/95 text-slate-800 border border-slate-200 shadow-sm flex items-center space-x-1.5">
                                <i class="fa-solid fa-star text-amber-500"></i>
                                <span>Menu Andalan Manado</span>
                            </span>
                        </div>
                    </div>

                    <!-- Clean Menu Info Card Below Photo (No Obstruction) -->
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center justify-between gap-3">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-primary block">Pilihan Terfavorit</span>
                            <h3 class="font-display font-bold text-base text-slate-900 leading-snug">Tinutuan Cakalang Fufu</h3>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <span class="text-xs text-slate-500 block">Harga</span>
                            <span class="font-black text-primary text-base">Rp 32.000</span>
                        </div>
                    </div>

                    <!-- Clean Highlights (Bebas Kolesterol & Sambal Roa) -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-xl bg-purple-50 text-primary flex items-center justify-center text-sm font-bold flex-shrink-0">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800">Tanpa Santan</p>
                                <p class="text-[10px] text-slate-500">Bebas Kolesterol</p>
                            </div>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm font-bold flex-shrink-0">
                                <i class="fa-solid fa-pepper-hot"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800">Sambal Roa</p>
                                <p class="text-[10px] text-slate-500">Pedas Asap Autentik</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. SECTION: FILOSOFI & KEUNGGULAN TINUTUAN SEBAGAI SUPERFOOD -->
<section class="py-20 bg-white border-b border-slate-200/80" id="filosofi">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-purple-50 border border-purple-200 text-primary mb-3">
                <i class="fa-solid fa-leaf mr-1.5 text-accent-dark"></i> Khasiat Alami Tinutuan
            </span>
            <h2 class="font-display font-black text-3xl sm:text-4xl text-slate-900 tracking-tight">
                Tradisi Sarapan Sehat dari Bumi Nyiur Melambai
            </h2>
            <p class="text-sm text-slate-600 mt-3 leading-relaxed">
                Tinutuan dimasak perlahan dengan harmoni labu kuning manis, aneka dedaunan hijau bernutrisi tinggi, dan jagung segar tanpa santan sehingga sangat ramah untuk kesehatan tubuh Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Item 1: Labu Kuning -->
            <div class="rounded-2xl bg-slate-50 border border-slate-200/90 overflow-hidden hover:border-primary/50 transition-all duration-300 hover:shadow-md group flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-100 relative">
                    <img src="<?= base_url('uploads/menu/ing_labu_kuning.jpg') ?>" alt="Labu Kuning Manis (Sambiki)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/95 text-amber-700 border border-amber-200 shadow-xs">
                        Kaya Vitamin A
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-slate-900 group-hover:text-primary transition-colors">Labu Kuning Manis</h3>
                        <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                            Dikenal sebagai <em>sambiki</em> di Minahasa. Menghadirkan warna kuning keemasan alami dengan tekstur lembut, manis alami, dan kaya antioksidan beta-karoten.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 2: Aneka Sayuran Hijau -->
            <div class="rounded-2xl bg-slate-50 border border-slate-200/90 overflow-hidden hover:border-primary/50 transition-all duration-300 hover:shadow-md group flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-100 relative">
                    <img src="<?= base_url('uploads/menu/ing_sayur_segar.jpg') ?>" alt="Kangkung dan Bayam Segar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/95 text-emerald-700 border border-emerald-200 shadow-xs">
                        Serat Tinggi
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-slate-900 group-hover:text-primary transition-colors">Kangkung & Bayam Segar</h3>
                        <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                            Dipetik segar setiap pagi. Perpaduan sayuran hijau bernutrisi tinggi kaya zat besi dan serat pangan alami yang menyehatkan metabolisme tubuh.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 3: Daun Kemangi Aromatik -->
            <div class="rounded-2xl bg-slate-50 border border-slate-200/90 overflow-hidden hover:border-primary/50 transition-all duration-300 hover:shadow-md group flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-100 relative">
                    <img src="<?= base_url('uploads/menu/ing_kemangi.jpg') ?>" alt="Kemangi Aromatik" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/95 text-purple-700 border border-purple-200 shadow-xs">
                        Aroma Khas
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-slate-900 group-hover:text-primary transition-colors">Kemangi Aromatik</h3>
                        <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                            Ciri khas wewangian autentik Tinutuan. Daun kemangi segar memberikan keharuman sitrun lembut yang menenangkan dan menggugah selera makan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 4: Cakalang Fufu & Roa -->
            <div class="rounded-2xl bg-slate-50 border border-slate-200/90 overflow-hidden hover:border-primary/50 transition-all duration-300 hover:shadow-md group flex flex-col">
                <div class="aspect-[16/10] overflow-hidden bg-slate-100 relative">
                    <img src="<?= base_url('uploads/menu/ing_cakalang_fufu.jpg') ?>" alt="Cakalang Fufu dan Roa Asap" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/95 text-rose-700 border border-rose-200 shadow-xs">
                        Tinggi Protein
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-base text-slate-900 group-hover:text-primary transition-colors">Cakalang Fufu & Roa</h3>
                        <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                            Ikan cakalang asap khas Bitung dan ikan roa Minahasa berkualitas premium dengan sensasi rasa gurih berkarakter dan kaya asam lemak Omega-3.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. SECTION: SHOWCASE MENU DENGAN LIVE FILTER INTERAKTIF -->
<section class="py-20 bg-slate-50 border-b border-slate-200/80" id="menu">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-primary block mb-1">
                    <i class="fa-solid fa-utensils mr-1.5"></i> Varian Makanan Terbaik
                </span>
                <h2 class="font-display font-black text-3xl sm:text-4xl text-slate-900 tracking-tight">
                    Jelajahi Menu Pilihan Kami
                </h2>
            </div>
            <div>
                <a href="<?= base_url('menu') ?>" class="inline-flex items-center space-x-2 text-xs font-bold px-5 py-2.5 rounded-xl bg-white hover:bg-slate-100 border border-slate-300 text-slate-700 transition-all shadow-xs">
                    <i class="fa-solid fa-sliders text-primary"></i>
                    <span>Buka Filter & Katalog Penuh (<?= count($allMenus) ?> Menu)</span>
                </a>
            </div>
        </div>

        <!-- Category Tab Buttons (Memenuhi Fitur Khusus: Filter di Homepage) -->
        <div class="flex flex-wrap gap-2.5 mb-10 pb-2 overflow-x-auto">
            <button onclick="filterCategory('all')" class="cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-primary text-white shadow-xs" data-cat="all">
                Semua Menu
            </button>
            <?php foreach ($categories as $cat): ?>
                <button onclick="filterCategory('<?= $cat['id'] ?>')" class="cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white border border-slate-200 text-slate-700 hover:bg-slate-100" data-cat="<?= $cat['id'] ?>">
                    <?= esc($cat['name']) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Menu Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="menuCardsContainer">
            <?php foreach ($allMenus as $m): ?>
                <div class="menu-item-card bg-white rounded-2xl border border-slate-200/90 hover:border-primary/50 overflow-hidden shadow-xs hover:shadow-md transition-all duration-300 flex flex-col group" data-category="<?= $m['category_id'] ?>">
                    <!-- Card Image -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                        <?php 
                            $imgSrc = base_url('uploads/menu/' . $m['image']);
                            if (empty($m['image']) || !file_exists(FCPATH . 'uploads/menu/' . $m['image'])) {
                                $imgSrc = 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=400&auto=format&fit=crop&q=80';
                            }
                        ?>
                        <img src="<?= $imgSrc ?>" alt="<?= esc($m['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        
                        <div class="absolute top-3 left-3 flex flex-col gap-1">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/95 text-slate-800 border border-slate-200 shadow-xs">
                                <?= esc($m['category_name'] ?? 'Tinutuan') ?>
                            </span>
                        </div>

                        <?php if ($m['is_favorite']): ?>
                            <div class="absolute top-3 right-3">
                                <span class="w-7 h-7 rounded-full bg-accent text-slate-900 flex items-center justify-center text-xs shadow-sm font-bold" title="Menu Favorit">
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- Card Body -->
                    <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                        <div>
                            <div class="flex items-center justify-between text-[11px] text-slate-500 mb-1.5 font-medium">
                                <span><i class="fa-solid fa-fire text-amber-500 mr-1"></i><?= esc($m['calories']) ?> kkal</span>
                                <?php if ($m['spiciness_level'] == 0): ?>
                                    <span class="text-emerald-700 font-semibold"><i class="fa-solid fa-leaf text-emerald-600 mr-1"></i>Tidak Pedas</span>
                                <?php else: ?>
                                    <span class="text-rose-600 font-semibold"><i class="fa-solid fa-pepper-hot text-rose-500 mr-1"></i>Level <?= $m['spiciness_level'] ?></span>
                                <?php endif; ?>
                            </div>
                            <h3 class="font-display font-bold text-base text-slate-900 group-hover:text-primary transition-colors line-clamp-1">
                                <?= esc($m['name']) ?>
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-2 mt-1 leading-relaxed">
                                <?= esc($m['description']) ?>
                            </p>
                        </div>

                        <!-- Card Footer -->
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-slate-400 block font-medium">Harga Porsi</span>
                                <span class="font-black text-primary text-base">
                                    Rp <?= number_format($m['price'], 0, ',', '.') ?>
                                </span>
                            </div>
                            <a href="<?= base_url('menu/' . $m['slug']) ?>" class="px-3.5 py-1.5 rounded-xl bg-purple-50 hover:bg-primary text-primary hover:text-white text-xs font-bold transition-all flex items-center space-x-1">
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

<!-- 4. SECTION: PROMO COMBO SPECIAL -->
<section class="py-20 bg-white border-b border-slate-200/80" id="promo">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-br from-purple-900 via-purple-800 to-slate-950 p-8 sm:p-12 text-white shadow-xl overflow-hidden relative">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-7 space-y-4 text-center lg:text-left">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider bg-accent text-slate-950 shadow-xs">
                        <i class="fa-solid fa-fire mr-1.5"></i> Paket Spesial Hemat
                    </span>
                    <h2 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight">
                        Paket Komplit Tinutuan Juara
                    </h2>
                    <p class="text-sm text-purple-100 max-w-xl leading-relaxed font-normal">
                        Nikmati sarapan lengkap autentik Manado: 1 Porsi Tinutuan Cakalang Fufu Suwir + 2 Perkedel Jagung Crispy Renyah + 1 Cup Sambal Roa Panggang + Es Teh Manis Segar.
                    </p>
                    <div class="pt-2 flex items-baseline space-x-3 justify-center lg:justify-start">
                        <span class="text-3xl sm:text-4xl font-black text-amber-300">Rp 42.000</span>
                        <span class="text-sm text-purple-300 line-through">Rp 55.000</span>
                        <span class="text-xs font-bold text-emerald-300 bg-emerald-500/20 px-2 py-0.5 rounded-md">Hemat 24%</span>
                    </div>
                    <div class="pt-4">
                        <a href="<?= base_url('menu/paket-komplit-tinutuan-juara') ?>" class="inline-flex items-center space-x-2 px-7 py-3 rounded-xl bg-accent hover:bg-amber-300 text-slate-950 font-bold text-xs uppercase tracking-wider shadow-md transition-all">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>Pesan Paket Ini</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-2xl overflow-hidden border border-white/20 shadow-lg aspect-[4/3]">
                        <img src="<?= base_url('uploads/menu/paket_komplit_tinutuan.jpg') ?>" alt="Paket Komplit Tinutuan" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. SECTION: TESTIMONI PELANGGAN -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-xs font-bold uppercase tracking-wider text-primary">Ulasan Pengunjung</span>
            <h2 class="font-display font-black text-3xl text-slate-900 tracking-tight mt-1">
                Kata Mereka Tentang Tinutuan Kami
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs space-y-4">
                <div class="flex text-amber-500 text-xs space-x-1">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Akhirnya nemu Tinutuan dengan rasa yang bener-bener autentik seperti di Manado! Labu kuningnya manis legit, sayurnya melimpah, dan cakalang fufunya wangi asap banget. Recommended!"
                </p>
                <div class="pt-2 border-t border-slate-100 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-purple-100 text-primary font-bold flex items-center justify-center text-xs">RN</div>
                    <div>
                        <p class="text-xs font-bold text-slate-900">Rivaldo N.</p>
                        <p class="text-[10px] text-slate-400">Food Blogger Manado</p>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs space-y-4">
                <div class="flex text-amber-500 text-xs space-x-1">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Perkedel jagungnya renyah kebangetan di luar tapi manis jagungnya berasa banget di dalem. Apalagi dicocol sama sambal roa asli Minahasa, pedasnya nagih pol!"
                </p>
                <div class="pt-2 border-t border-slate-100 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-amber-100 text-amber-800 font-bold flex items-center justify-center text-xs">SP</div>
                    <div>
                        <p class="text-xs font-bold text-slate-900">Siti Permata</p>
                        <p class="text-[10px] text-slate-400">Pecinta Kuliner Nusantara</p>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-xs space-y-4">
                <div class="flex text-amber-500 text-xs space-x-1">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Suka banget sama konsep modern waralabanya, bersih, higienis, kemasan pesan antarnya rapi banget. Es brenebon kacang merahnya juga penutup manis yang juara."
                </p>
                <div class="pt-2 border-t border-slate-100 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-800 font-bold flex items-center justify-center text-xs">BK</div>
                    <div>
                        <p class="text-xs font-bold text-slate-900">Budi Kusuma</p>
                        <p class="text-[10px] text-slate-400">Pelanggan Setia</p>
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
                btn.className = 'cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-primary text-white shadow-xs';
            } else {
                btn.className = 'cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white border border-slate-200 text-slate-700 hover:bg-slate-100';
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
