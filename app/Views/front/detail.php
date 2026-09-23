<?= $this->extend('layouts/front_layout') ?>

<?= $this->section('content') ?>

<div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-xs text-slate-500 mb-8">
        <a href="<?= base_url() ?>" class="hover:text-primary transition-colors">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
        <a href="<?= base_url('menu') ?>" class="hover:text-primary transition-colors">Katalog Menu</a>
        <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
        <span class="text-slate-900 font-semibold truncate"><?= esc($menu['name']) ?></span>
    </nav>

    <!-- Success & Error Alert Messages for Order -->
    <?php if (session()->getFlashdata('order_success')): ?>
        <div class="mb-8 p-5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start space-x-3 shadow-xs">
            <i class="fa-solid fa-circle-check text-emerald-600 text-xl mt-0.5 flex-shrink-0"></i>
            <div>
                <p class="font-bold text-base text-emerald-900">Pesanan Berhasil Dikirim!</p>
                <p class="mt-1 text-emerald-700"><?= session()->getFlashdata('order_success') ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('order_errors')): ?>
        <div class="mb-8 p-5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm shadow-xs">
            <div class="flex items-center space-x-2 font-bold text-base text-rose-900 mb-2">
                <i class="fa-solid fa-triangle-exclamation text-rose-600 text-xl"></i>
                <span>Gagal Mengirim Pesanan. Periksa form berikut:</span>
            </div>
            <ul class="list-disc list-inside ml-6 space-y-1 text-xs text-rose-700">
                <?php foreach (session()->getFlashdata('order_errors') as $err): ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Main Detail Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
        
        <!-- Left: Image Showcase & Badges (5 cols) -->
        <div class="lg:col-span-5 space-y-4">
            <div class="relative rounded-3xl overflow-hidden bg-slate-100 border border-slate-200 shadow-md group aspect-[4/3]">
                <?php 
                    $imgSrc = base_url('uploads/menu/' . $menu['image']);
                    if (empty($menu['image']) || !file_exists(FCPATH . 'uploads/menu/' . $menu['image'])) {
                        $imgSrc = 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=600&auto=format&fit=crop&q=80';
                    }
                ?>
                <img src="<?= $imgSrc ?>" alt="<?= esc($menu['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                <!-- Badges -->
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/95 text-primary border border-purple-200 shadow-xs">
                        <?= esc($menu['category_name'] ?? 'Tinutuan') ?>
                    </span>
                    <?php if ($menu['is_favorite']): ?>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-accent text-slate-900 shadow-xs flex items-center space-x-1">
                            <i class="fa-solid fa-star text-xs"></i>
                            <span>Menu Favorit</span>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="absolute bottom-4 right-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/95 text-slate-800 border border-slate-200 shadow-xs">
                        <i class="fa-solid fa-fire text-amber-500 mr-1"></i> <?= esc($menu['calories']) ?> kkal
                    </span>
                </div>
            </div>

            <!-- Authentic Trust Badges -->
            <div class="grid grid-cols-3 gap-3">
                <div class="p-3.5 rounded-2xl bg-white border border-slate-200 text-center shadow-xs">
                    <i class="fa-solid fa-seedling text-emerald-600 text-lg mb-1"></i>
                    <p class="text-[11px] font-bold text-slate-800">100% Sayur Alami</p>
                    <p class="text-[9px] text-slate-500">Petik segar harian</p>
                </div>
                <div class="p-3.5 rounded-2xl bg-white border border-slate-200 text-center shadow-xs">
                    <i class="fa-solid fa-certificate text-accent-dark text-lg mb-1"></i>
                    <p class="text-[11px] font-bold text-slate-800">100% Halal</p>
                    <p class="text-[9px] text-slate-500">Higienis & Sehat</p>
                </div>
                <div class="p-3.5 rounded-2xl bg-white border border-slate-200 text-center shadow-xs">
                    <i class="fa-solid fa-pepper-hot text-rose-600 text-lg mb-1"></i>
                    <p class="text-[11px] font-bold text-slate-800">Sambal Autentik</p>
                    <p class="text-[9px] text-slate-500">Roa & Dabu-Dabu</p>
                </div>
            </div>
        </div>

        <!-- Right: Food Info & Order Form (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            <div>
                <div class="flex items-center space-x-3 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-primary flex items-center">
                        <i class="fa-solid fa-location-dot mr-1.5 text-accent-dark"></i> Sulawesi Utara, Indonesia
                    </span>
                    <span class="text-slate-300">•</span>
                    <!-- Spiciness Label -->
                    <div class="flex items-center space-x-1 text-xs font-semibold">
                        <span class="text-slate-500">Tingkat Pedas:</span>
                        <?php if ($menu['spiciness_level'] == 0): ?>
                            <span class="text-emerald-700 flex items-center ml-1"><i class="fa-solid fa-leaf mr-1"></i> Level 0 (Tidak Pedas)</span>
                        <?php else: ?>
                            <span class="text-rose-600 flex items-center ml-1">
                                <?php for ($i = 0; $i < $menu['spiciness_level']; $i++): ?>
                                    <i class="fa-solid fa-pepper-hot mr-0.5 text-rose-500"></i>
                                <?php endfor; ?>
                                Level <?= $menu['spiciness_level'] ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <h1 class="font-display font-black text-3xl sm:text-4xl text-slate-900 tracking-tight leading-tight">
                    <?= esc($menu['name']) ?>
                </h1>

                <!-- Price Tag -->
                <div class="mt-4 flex items-baseline space-x-3">
                    <span class="text-3xl sm:text-4xl font-black text-primary">
                        Rp <?= number_format($menu['price'], 0, ',', '.') ?>
                    </span>
                    <span class="text-xs text-slate-500">/ porsi komplit</span>
                </div>
            </div>

            <!-- Description -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Tentang Menu Ini</h3>
                <p class="text-slate-700 text-sm leading-relaxed">
                    <?= nl2br(esc($menu['description'])) ?>
                </p>
            </div>

            <!-- Ingredients Chips -->
            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-600 mb-3 flex items-center">
                    <i class="fa-solid fa-mortar-pestle text-primary mr-2"></i> Komposisi Bahan Tradisional Manado
                </h3>
                <div class="flex flex-wrap gap-2">
                    <?php 
                        $ingredientsList = explode(',', $menu['ingredients']);
                        foreach ($ingredientsList as $ing):
                            $ingTrimmed = trim($ing);
                            if (empty($ingTrimmed)) continue;
                    ?>
                        <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-medium bg-purple-50 border border-purple-200 text-purple-900">
                            <i class="fa-solid fa-check text-primary mr-1.5 text-[10px]"></i>
                            <?= esc($ingTrimmed) ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick Order Box (Form Validasi Pesan Langsung) -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white border border-slate-200 shadow-md">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-900">Formulir Pemesanan Cepat</h3>
                        <p class="text-xs text-slate-500">Pesan langsung ke dapur kami dengan proses cepat.</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-purple-100 text-primary">
                        Siap Diantar
                    </span>
                </div>

                <form action="<?= base_url('order/process') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>
                    <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Pemesan <span class="text-rose-500">*</span></label>
                            <input type="text" name="customer_name" required value="<?= old('customer_name') ?>" placeholder="Nama lengkap Anda"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">No. WhatsApp <span class="text-rose-500">*</span></label>
                            <input type="tel" name="whatsapp" required value="<?= old('whatsapp') ?>" placeholder="0812xxxxxxxx"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Jumlah Porsi <span class="text-rose-500">*</span></label>
                            <input type="number" name="quantity" required min="1" value="<?= old('quantity', '1') ?>"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Catatan Khusus (Opsional)</label>
                            <input type="text" name="notes" placeholder="Contoh: Dabu-dabu dipisah, kuah panas"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-primary hover:bg-primary-dark text-white font-bold rounded-xl shadow-md shadow-primary/20 transition-all flex items-center justify-center space-x-2 text-sm">
                        <i class="fa-solid fa-bowl-food text-accent"></i>
                        <span>Konfirmasi & Kirim Pesanan Sekarang</span>
                    </button>
                </form>
            </div>

        </div>

    </div>

    <!-- Related Menu Recommendations -->
    <?php if (!empty($relatedMenus)): ?>
        <div class="mt-16 pt-12 border-t border-slate-200">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-primary">Pelengkap Santap Tinutuan</span>
                    <h2 class="font-display font-black text-2xl text-slate-900 tracking-tight">Rekomendasi Menu Lainnya</h2>
                </div>
                <a href="<?= base_url('menu') ?>" class="text-xs font-bold text-primary hover:underline flex items-center space-x-1">
                    <span>Semua Menu</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($relatedMenus as $rel): ?>
                    <div class="bg-white rounded-2xl border border-slate-200 hover:border-primary/40 shadow-xs hover:shadow-md transition-all group flex flex-col overflow-hidden">
                        <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
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
                                <h3 class="font-display font-bold text-base text-slate-900 group-hover:text-primary transition-colors">
                                    <?= esc($rel['name']) ?>
                                </h3>
                                <p class="text-xs text-slate-500 line-clamp-2 mt-1">
                                    <?= esc($rel['description']) ?>
                                </p>
                            </div>
                            <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                                <span class="font-black text-primary text-base">
                                    Rp <?= number_format($rel['price'], 0, ',', '.') ?>
                                </span>
                                <a href="<?= base_url('menu/' . $rel['slug']) ?>" class="px-3 py-1.5 rounded-xl bg-purple-50 hover:bg-primary text-primary hover:text-white text-xs font-bold transition-all">
                                    Detail &rarr;
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
