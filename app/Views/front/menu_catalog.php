<?= $this->extend('layouts/front_layout') ?>

<?= $this->section('content') ?>

<!-- Page Hero Banner -->
<div class="relative py-16 bg-gradient-to-b from-purple-950/40 via-slate-950 to-slate-950 border-b border-slate-800/80 overflow-hidden">
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-accent/20 border border-accent/40 text-accent mb-3">
            <i class="fa-solid fa-filter mr-1.5"></i> Eksplorasi Menu & Filter Interaktif
        </span>
        <h1 class="font-display font-black text-3xl sm:text-5xl text-white tracking-tight">
            Katalog Menu <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">Aprilianto's Tinutuan</span>
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto mt-3">
            Pilihan hidangan bubur Manado autentik, paket komplit Minahasa, gorengan renyah, hingga dessert penutup manis.
        </p>
    </div>
</div>

<!-- Main Catalog with Filter Controls (Memenuhi Fitur Khusus: Filter) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    <!-- Interactive Filter Box -->
    <div class="p-6 rounded-3xl bg-slate-900/80 border border-slate-800 shadow-xl backdrop-blur-md">
        <form action="<?= base_url('menu') ?>" method="GET" class="space-y-6">
            
            <!-- Category Pills Filter -->
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Pilih Kategori:</span>
                    <?php if (!empty($categoryId) || !empty($search) || !empty($spiciness) || !empty($sort)): ?>
                        <a href="<?= base_url('menu') ?>" class="text-xs font-semibold text-rose-400 hover:underline flex items-center space-x-1">
                            <i class="fa-solid fa-rotate-left text-[10px]"></i>
                            <span>Reset Semua Filter</span>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="flex flex-wrap gap-2">
                    <a href="<?= base_url('menu' . (!empty($search) ? '?q=' . esc($search) : '')) ?>" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition-all <?= empty($categoryId) ? 'bg-primary text-white shadow-lg shadow-primary/30 ring-2 ring-primary/40' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' ?>">
                        <i class="fa-solid fa-layer-group mr-1.5"></i> Semua Kategori (<?= $total ?>)
                    </a>
                    <?php foreach ($categories as $cat): ?>
                        <?php 
                            $isActive = (isset($categoryId) && $categoryId == $cat['id']);
                            $urlParams = ['cat' => $cat['id']];
                            if (!empty($search)) $urlParams['q'] = $search;
                            if (!empty($spiciness)) $urlParams['spicy'] = $spiciness;
                        ?>
                        <a href="<?= base_url('menu?' . http_build_query($urlParams)) ?>" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all <?= $isActive ? 'bg-primary text-white shadow-lg shadow-primary/30 ring-2 ring-primary/40' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' ?>">
                            <?= esc($cat['name']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Search, Spiciness Filter, and Price Sort -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-4 border-t border-slate-800">
                <!-- Search Keyword -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1.5">Cari Menu / Bahan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </div>
                        <input type="text" name="q" value="<?= esc($search ?? '') ?>" placeholder="Cakalang, roa, jagung..."
                               class="w-full pl-9 pr-3 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>

                <!-- Spiciness Level Filter -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1.5">Tingkat Kepedasan</label>
                    <select name="spicy" class="w-full px-3 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-xs text-slate-200 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Semua Level Pedas</option>
                        <option value="0" <?= (isset($spiciness) && $spiciness === '0') ? 'selected' : '' ?>>Level 0 (Tidak Pedas)</option>
                        <option value="1" <?= (isset($spiciness) && $spiciness === '1') ? 'selected' : '' ?>>Level 1 (Pedas Sedang)</option>
                        <option value="2" <?= (isset($spiciness) && $spiciness === '2') ? 'selected' : '' ?>>Level 2 (Pedas Mantap)</option>
                        <option value="3" <?= (isset($spiciness) && $spiciness === '3') ? 'selected' : '' ?>>Level 3 (Ekstra Pedas Manado)</option>
                    </select>
                </div>

                <!-- Price Sorting -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1.5">Urutan Harga</label>
                    <select name="sort" class="w-full px-3 py-2.5 bg-slate-950 border border-slate-700 rounded-xl text-xs text-slate-200 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Rekomendasi Chef</option>
                        <option value="price_asc" <?= (isset($sort) && $sort === 'price_asc') ? 'selected' : '' ?>>Harga: Terendah &rarr; Tertinggi</option>
                        <option value="price_desc" <?= (isset($sort) && $sort === 'price_desc') ? 'selected' : '' ?>>Harga: Tertinggi &rarr; Terendah</option>
                    </select>
                </div>

                <!-- Submit Filter Button -->
                <div class="flex items-end">
                    <button type="submit" class="w-full py-2.5 px-4 bg-gradient-to-r from-primary to-purple-600 hover:from-primary-light hover:to-primary text-white font-bold rounded-xl text-xs flex items-center justify-center space-x-2 shadow-md transition-all">
                        <i class="fa-solid fa-filter text-accent"></i>
                        <span>Terapkan Filter</span>
                    </button>
                </div>
            </div>

            <?php if (!empty($categoryId)): ?>
                <input type="hidden" name="cat" value="<?= esc($categoryId) ?>">
            <?php endif; ?>
        </form>
    </div>

    <!-- Menus Grid -->
    <div>
        <div class="flex items-center justify-between mb-6">
            <p class="text-xs text-slate-400">
                Menampilkan <strong class="text-white font-bold"><?= count($menus) ?> menu</strong> makanan
            </p>
        </div>

        <?php if (empty($menus)): ?>
            <div class="p-16 text-center rounded-3xl bg-slate-900/40 border border-slate-800">
                <i class="fa-solid fa-bowl-food text-5xl text-slate-700 mb-3 block"></i>
                <h3 class="font-display font-bold text-lg text-white">Tidak ada menu yang sesuai kriteria filter</h3>
                <p class="text-xs text-slate-400 mt-1">Coba gunakan kata kunci pencarian yang lain atau reset filter Anda.</p>
                <a href="<?= base_url('menu') ?>" class="inline-block mt-4 px-5 py-2.5 rounded-xl bg-primary text-white text-xs font-bold shadow-lg">
                    Reset Filter
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($menus as $m): ?>
                    <div class="bg-slate-900/90 rounded-3xl border border-slate-800 hover:border-primary/50 overflow-hidden shadow-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col group">
                        <!-- Image & Badge Container -->
                        <div class="relative aspect-[4/3] overflow-hidden bg-slate-950">
                            <?php 
                                $imgSrc = base_url('uploads/menu/' . $m['image']);
                                if (empty($m['image']) || !file_exists(FCPATH . 'uploads/menu/' . $m['image'])) {
                                    $imgSrc = 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=400&auto=format&fit=crop&q=80';
                                }
                            ?>
                            <img src="<?= $imgSrc ?>" alt="<?= esc($m['name']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-950/80 backdrop-blur-md border border-purple-500/40 text-purple-300">
                                    <?= esc($m['category_name'] ?? 'Tinutuan') ?>
                                </span>
                            </div>

                            <?php if ($m['is_favorite']): ?>
                                <div class="absolute top-3 right-3">
                                    <span class="w-7 h-7 rounded-full bg-accent text-slate-950 flex items-center justify-center text-xs shadow-lg" title="Rekomendasi Chef">
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <!-- Spiciness & Calories overlay bottom -->
                            <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] font-semibold">
                                <span class="px-2.5 py-0.5 rounded-full bg-slate-950/85 backdrop-blur-md text-slate-300 border border-slate-700">
                                    <i class="fa-solid fa-fire-flame-curved text-accent mr-1"></i> <?= esc($m['calories']) ?> kkal
                                </span>
                                <?php if ($m['spiciness_level'] == 0): ?>
                                    <span class="px-2.5 py-0.5 rounded-full bg-slate-950/85 backdrop-blur-md text-emerald-400 border border-emerald-500/40">
                                        <i class="fa-solid fa-leaf text-[9px] mr-0.5"></i> Lv 0
                                    </span>
                                <?php else: ?>
                                    <span class="px-2.5 py-0.5 rounded-full bg-slate-950/85 backdrop-blur-md text-rose-400 border border-rose-500/40">
                                        <i class="fa-solid fa-pepper-hot text-[9px] mr-0.5"></i> Lv <?= $m['spiciness_level'] ?>
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

                            <!-- Footer Card: Price & CTA Button -->
                            <div class="pt-3 border-t border-slate-800 flex items-center justify-between">
                                <div>
                                    <span class="text-[10px] text-slate-400 block">Harga Porsi</span>
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
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>
