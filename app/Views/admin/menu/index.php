<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="space-y-6">

    <!-- Top Action Banner -->
    <div class="bg-gradient-to-r from-purple-800 to-purple-950 rounded-3xl p-6 sm:p-8 text-white shadow-md flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-amber-300 mb-2">
                <i class="fa-solid fa-utensils mr-1.5"></i> CRUD Menu Makanan Khas Manado
            </span>
            <h1 class="font-display font-extrabold text-2xl sm:text-3xl tracking-tight">Manajemen Menu Tinutuan</h1>
            <p class="text-sm text-purple-200 mt-1 max-w-xl">
                Kelola menu bubur Manado, lauk pelengkap, gorengan khas, dan dessert. Terdapat total <strong class="text-white font-bold"><?= esc($totalMenus) ?> variasi makanan</strong>.
            </p>
        </div>
        <div>
            <a href="<?= base_url('admin/menu/create') ?>" class="inline-flex items-center space-x-2 px-5 py-3 rounded-2xl bg-accent hover:bg-amber-300 text-slate-950 font-bold text-sm shadow-sm transition-all">
                <i class="fa-solid fa-plus-circle text-base"></i>
                <span>Tambah Menu Baru</span>
            </a>
        </div>
    </div>

    <!-- Filter & Search Toolbar (Memenuhi Fitur Khusus: Filter) -->
    <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
        <form action="<?= base_url('admin/menu') ?>" method="GET" class="w-full flex flex-col sm:flex-row items-center gap-3">
            <div class="relative w-full sm:w-72">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari nama atau bahan menu..." class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
            </div>

            <div class="w-full sm:w-56">
                <select name="category_id" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all text-slate-700">
                    <option value="">Semua Kategori</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (isset($categoryId) && $categoryId == $cat['id']) ? 'selected' : '' ?>>
                            <?= esc($cat['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-xs sm:text-sm font-semibold transition-all flex items-center justify-center space-x-1.5 w-full sm:w-auto">
                    <i class="fa-solid fa-filter text-accent text-xs"></i>
                    <span>Terapkan Filter</span>
                </button>
                <?php if (!empty($search) || !empty($categoryId)): ?>
                    <a href="<?= base_url('admin/menu') ?>" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-semibold transition-all">
                        Reset
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Data Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-4 px-6">Foto</th>
                        <th class="py-4 px-6">Nama & Kategori</th>
                        <th class="py-4 px-6">Harga</th>
                        <th class="py-4 px-6">Pedas</th>
                        <th class="py-4 px-6">Kalori</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    <?php if (empty($menus)): ?>
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400">
                                <i class="fa-solid fa-bowl-food text-4xl mb-3 text-slate-300 block"></i>
                                <span class="font-medium">Tidak ada data menu yang cocok dengan pencarian / filter.</span>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($menus as $m): ?>
                            <tr class="hover:bg-purple-50/30 transition-colors group">
                                <!-- Foto Menu -->
                                <td class="py-4 px-6">
                                    <div class="w-14 h-14 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shadow-xs flex-shrink-0 relative group-hover:shadow-md transition-all">
                                        <?php 
                                            $imgSrc = base_url('uploads/menu/' . $m['image']);
                                            if (empty($m['image']) || !file_exists(FCPATH . 'uploads/menu/' . $m['image'])) {
                                                // Fallback image placeholder
                                                $imgSrc = 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=300&auto=format&fit=crop&q=80';
                                            }
                                        ?>
                                        <img src="<?= $imgSrc ?>" alt="<?= esc($m['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        <?php if ($m['is_favorite']): ?>
                                            <span class="absolute top-1 right-1 w-4 h-4 bg-accent rounded-full flex items-center justify-center text-[9px] text-slate-900 shadow" title="Menu Favorit">
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <!-- Nama & Kategori -->
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-900 group-hover:text-primary transition-colors">
                                        <?= esc($m['name']) ?>
                                    </div>
                                    <div class="text-xs text-slate-500 flex items-center space-x-2 mt-0.5">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-semibold bg-purple-100 text-primary">
                                            <?= esc($m['category_name'] ?? 'Tinutuan') ?>
                                        </span>
                                    </div>
                                </td>

                                <!-- Harga -->
                                <td class="py-4 px-6 font-bold text-slate-900 whitespace-nowrap">
                                    <span class="text-primary font-extrabold">Rp <?= number_format($m['price'], 0, ',', '.') ?></span>
                                </td>

                                <!-- Tingkat Kepedasan -->
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <?php if ($m['spiciness_level'] == 0): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                            <i class="fa-solid fa-leaf mr-1 text-[10px]"></i> Tidak Pedas
                                        </span>
                                    <?php elseif ($m['spiciness_level'] == 1): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                            <i class="fa-solid fa-pepper-hot mr-1 text-[10px]"></i> Sedang
                                        </span>
                                    <?php elseif ($m['spiciness_level'] == 2): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-700">
                                            <i class="fa-solid fa-pepper-hot mr-1 text-[10px]"></i> Pedas Mantap
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                            <i class="fa-solid fa-fire mr-1 text-[10px]"></i> Ekstra Pedas
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <!-- Kalori -->
                                <td class="py-4 px-6 text-slate-600 text-xs">
                                    <span class="font-semibold text-slate-800"><?= esc($m['calories']) ?></span> kkal
                                </td>

                                <!-- Status -->
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <?php if ($m['is_available']): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span> Tersedia
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-500 border border-slate-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mr-1.5"></span> Habis
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <!-- Aksi Edit & Hapus -->
                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="<?= base_url('menu/' . $m['slug']) ?>" target="_blank" title="Lihat Halaman Detail" class="p-2 rounded-xl text-slate-400 hover:text-primary hover:bg-purple-50 transition-colors">
                                            <i class="fa-solid fa-eye text-sm"></i>
                                        </a>
                                        <a href="<?= base_url('admin/menu/edit/' . $m['id']) ?>" title="Edit Menu" class="p-2 rounded-xl text-slate-600 hover:text-primary hover:bg-purple-50 transition-colors">
                                            <i class="fa-solid fa-pen-to-square text-sm"></i>
                                        </a>
                                        <a href="<?= base_url('admin/menu/delete/' . $m['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus menu <?= esc(addslashes($m['name'])) ?>?')" title="Hapus Menu" class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
