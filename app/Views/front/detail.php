<?= $this->extend('layouts/front_layout') ?>

<?= $this->section('content') ?>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-xs text-slate-400 mb-8">
        <a href="<?= base_url() ?>" class="hover:text-accent transition-colors">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[10px] text-slate-600"></i>
        <a href="<?= base_url('menu') ?>" class="hover:text-accent transition-colors">Katalog Menu</a>
        <i class="fa-solid fa-chevron-right text-[10px] text-slate-600"></i>
        <span class="text-white font-semibold truncate"><?= esc($menu['name']) ?></span>
    </nav>

    <!-- Success & Error Alert Messages for Order -->
    <?php if (session()->getFlashdata('order_success')): ?>
        <div class="mb-8 p-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-sm flex items-start space-x-3 shadow-lg">
            <i class="fa-solid fa-circle-check text-emerald-400 text-xl mt-0.5 flex-shrink-0"></i>
            <div>
                <p class="font-bold text-base text-emerald-200">Pesanan Berhasil Dikirim!</p>
                <p class="mt-1"><?= session()->getFlashdata('order_success') ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('order_errors')): ?>
        <div class="mb-8 p-5 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-sm shadow-lg">
            <div class="flex items-center space-x-2 font-bold text-base text-rose-200 mb-2">
                <i class="fa-solid fa-triangle-exclamation text-rose-400 text-xl"></i>
                <span>Gagal Mengirim Pesanan. Periksa form berikut:</span>
            </div>
            <ul class="list-disc list-inside ml-6 space-y-1 text-xs">
                <?php foreach (session()->getFlashdata('order_errors') as $err): ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Main Detail Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        
        <!-- Left: Image Gallery & Badges (5 cols) -->
        <div class="lg:col-span-5 space-y-4">
            <div class="relative rounded-3xl overflow-hidden bg-slate-900 border border-slate-800 shadow-2xl shadow-purple-950/40 group aspect-[4/3]">
                <?php 
                    $imgSrc = base_url('uploads/menu/' . $menu['image']);
                    if (empty($menu['image']) || !file_exists(FCPATH . 'uploads/menu/' . $menu['image'])) {
                        $imgSrc = 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=600&auto=format&fit=crop&q=80';
                    }
                ?>
                <img src="<?= $imgSrc ?>" alt="<?= esc($menu['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                <!-- Overlay Badges -->
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-slate-950/80 backdrop-blur-md border border-purple-500/40 text-purple-300 shadow">
                        <?= esc($menu['category_name'] ?? 'Tinutuan') ?>
                    </span>
                    <?php if ($menu['is_favorite']): ?>
                        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-accent text-slate-950 shadow flex items-center space-x-1">
                            <i class="fa-solid fa-award"></i>
                            <span>Menu Favorit</span>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="absolute bottom-4 right-4">
                    <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-950/80 backdrop-blur-md border border-slate-700 text-slate-300">
                        <i class="fa-solid fa-fire-flame-curved text-accent mr-1"></i> <?= esc($menu['calories']) ?> kkal
                    </span>
                </div>
            </div>

            <!-- Authentic Trust Badges -->
            <div class="grid grid-cols-3 gap-3">
                <div class="p-3.5 rounded-2xl bg-slate-900/80 border border-slate-800 text-center">
                    <i class="fa-solid fa-seedling text-emerald-400 text-lg mb-1"></i>
                    <p class="text-[11px] font-bold text-white">100% Sayur Alami</p>
                    <p class="text-[9px] text-slate-400">Petik segar harian</p>
                </div>
                <div class="p-3.5 rounded-2xl bg-slate-900/80 border border-slate-800 text-center">
                    <i class="fa-solid fa-shield-halal text-accent text-lg mb-1"></i>
                    <p class="text-[11px] font-bold text-white">100% Halal</p>
                    <p class="text-[9px] text-slate-400">Higienis & Sehat</p>
                </div>
                <div class="p-3.5 rounded-2xl bg-slate-900/80 border border-slate-800 text-center">
                    <i class="fa-solid fa-pepper-hot text-rose-400 text-lg mb-1"></i>
                    <p class="text-[11px] font-bold text-white">Sambal Autentik</p>
                    <p class="text-[9px] text-slate-400">Roa & Dabu-Dabu</p>
                </div>
            </div>
        </div>

        <!-- Right: Food Info & Action (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            <div>
                <div class="flex items-center space-x-3 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-accent flex items-center">
                        <i class="fa-solid fa-location-dot mr-1.5"></i> Sulawesi Utara, Indonesia
                    </span>
                    <span class="text-slate-600">•</span>
                    <!-- Spiciness Label -->
                    <div class="flex items-center space-x-1 text-xs font-semibold">
                        <span class="text-slate-400">Tingkat Pedas:</span>
                        <?php if ($menu['spiciness_level'] == 0): ?>
                            <span class="text-emerald-400 flex items-center ml-1"><i class="fa-solid fa-leaf mr-1"></i> Level 0 (Tidak Pedas)</span>
                        <?php else: ?>
                            <span class="text-rose-400 flex items-center ml-1">
                                <?php for ($i = 0; $i < $menu['spiciness_level']; $i++): ?>
                                    <i class="fa-solid fa-pepper-hot mr-0.5"></i>
                                <?php endfor; ?>
                                Level <?= $menu['spiciness_level'] ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <h1 class="font-display font-black text-3xl sm:text-4xl text-white tracking-tight leading-tight">
                    <?= esc($menu['name']) ?>
                </h1>

                <!-- Price Tag -->
                <div class="mt-4 flex items-baseline space-x-3">
                    <span class="text-3xl sm:text-4xl font-black bg-gradient-to-r from-amber-400 via-yellow-300 to-accent bg-clip-text text-transparent">
                        Rp <?= number_format($menu['price'], 0, ',', '.') ?>
                    </span>
                    <span class="text-xs text-slate-400">/ porsi komplit</span>
                </div>
            </div>

            <!-- Description -->
            <div class="p-6 rounded-2xl bg-slate-900/60 border border-slate-800/80">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Tentang Menu Ini</h3>
                <p class="text-slate-300 text-sm leading-relaxed">
                    <?= nl2br(esc($menu['description'])) ?>
                </p>
            </div>

            <!-- Ingredients Chips -->
            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 flex items-center">
                    <i class="fa-solid fa-mortar-pestle text-accent mr-2"></i> Komposisi Bahan Tradisional Manado
                </h3>
                <div class="flex flex-wrap gap-2">
                    <?php 
                        $ingredientsList = explode(',', $menu['ingredients']);
                        foreach ($ingredientsList as $ing):
                            $ingTrimmed = trim($ing);
                            if (empty($ingTrimmed)) continue;
                    ?>
                        <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-medium bg-slate-900 border border-slate-800 text-slate-300">
                            <i class="fa-solid fa-check text-accent mr-1.5 text-[10px]"></i>
                            <?= esc($ingTrimmed) ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick Order Box (Form Validasi Pesan Langsung) -->
            <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-primary/30 shadow-xl relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="font-display font-extrabold text-lg text-white">Formulir Pemesanan Cepat</h3>
                        <p class="text-xs text-slate-400">Pesan langsung ke dapur kami dengan proses instan.</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-accent text-slate-950">
                        Siap Diantar
                    </span>
                </div>

                <form action="<?= base_url('order/process') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>
                    <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">Nama Pemesan <span class="text-rose-400">*</span></label>
                            <input type="text" name="customer_name" required value="<?= old('customer_name') ?>" placeholder="Nama lengkap Anda"
                                   class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">No. WhatsApp <span class="text-rose-400">*</span></label>
                            <input type="tel" name="whatsapp" required value="<?= old('whatsapp') ?>" placeholder="0812xxxxxxxx"
                                   class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">Jumlah Porsi <span class="text-rose-400">*</span></label>
                            <input type="number" name="quantity" required min="1" value="<?= old('quantity', '1') ?>"
                                   class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">Catatan Khusus (Opsional)</label>
                            <input type="text" name="notes" placeholder="Contoh: Dabu-dabu dipisah, kuah panas"
                                   class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-primary to-purple-600 hover:from-primary-light hover:to-primary text-white font-bold rounded-xl shadow-lg shadow-primary/40 hover:shadow-primary/60 transition-all flex items-center justify-center space-x-2 text-sm">
                        <i class="fa-solid fa-bowl-food text-accent"></i>
                        <span>Konfirmasi & Kirim Pesanan Sekarang</span>
                    </button>
                </form>
            </div>

        </div>

    </div>

    <!-- Related Menu Recommendations -->
    <?php if (!empty($relatedMenus)): ?>
        <div class="mt-20 pt-12 border-t border-slate-800">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-accent">Pelengkap Santap Tinutuan</span>
                    <h2 class="font-display font-black text-2xl text-white tracking-tight">Rekomendasi Menu Lainnya</h2>
                </div>
                <a href="<?= base_url('menu') ?>" class="text-xs font-semibold text-purple-300 hover:text-white flex items-center space-x-1">
                    <span>Semua Menu</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($relatedMenus as $rel): ?>
                    <div class="bg-slate-900/80 rounded-3xl border border-slate-800 overflow-hidden hover:border-primary/50 transition-all group flex flex-col">
                        <div class="relative aspect-[4/3] overflow-hidden bg-slate-950">
                            <?php 
                                $relImg = base_url('uploads/menu/' . $rel['image']);
                                if (empty($rel['image']) || !file_exists(FCPATH . 'uploads/menu/' . $rel['image'])) {
                                    $relImg = 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=400&auto=format&fit=crop&q=80';
                                }
                            ?>
                            <img src="<?= $relImg ?>" alt="<?= esc($rel['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div>
                                <h3 class="font-display font-bold text-base text-white group-hover:text-amber-300 transition-colors">
                                    <?= esc($rel['name']) ?>
                                </h3>
                                <p class="text-xs text-slate-400 line-clamp-2 mt-1">
                                    <?= esc($rel['description']) ?>
                                </p>
                            </div>
                            <div class="flex items-center justify-between pt-3 border-t border-slate-800">
                                <span class="font-black text-amber-400 text-sm">
                                    Rp <?= number_format($rel['price'], 0, ',', '.') ?>
                                </span>
                                <a href="<?= base_url('menu/' . $rel['slug']) ?>" class="px-3 py-1.5 rounded-xl bg-primary/20 hover:bg-primary text-purple-300 hover:text-white text-xs font-semibold transition-all">
                                    Lihat Detail &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
