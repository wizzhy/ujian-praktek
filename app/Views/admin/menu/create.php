<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto space-y-6">

    <!-- Breadcrumb & Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <nav class="flex items-center space-x-2 text-xs text-slate-500 mb-1">
                <a href="<?= base_url('admin/menu') ?>" class="hover:text-primary transition-colors">Menu Manajemen</a>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                <span class="text-slate-800 font-semibold">Tambah Menu Baru</span>
            </nav>
            <h1 class="font-display font-extrabold text-2xl text-slate-900 tracking-tight">Formulir Tambah Menu Makanan</h1>
        </div>
        <a href="<?= base_url('admin/menu') ?>" class="inline-flex items-center space-x-2 text-xs font-semibold px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors w-fit">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Menu</span>
        </a>
    </div>

    <!-- Form Card with Strict Form Validation -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <form action="<?= base_url('admin/menu/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>

            <!-- Baris 1: Nama Menu & Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Menu -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Nama Menu Makanan <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="<?= old('name') ?>" required
                           placeholder="Contoh: Tinutuan Cakalang Fufu Spesial"
                           class="w-full px-4 py-3 bg-slate-50 border <?= isset(session('errors')['name']) ? 'border-rose-500 bg-rose-50/30' : 'border-slate-200' ?> rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                    <?php if (isset(session('errors')['name'])): ?>
                        <p class="text-xs text-rose-600 mt-1.5 flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= session('errors')['name'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Kategori Menu -->
                <div>
                    <label for="category_id" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Kategori Menu <span class="text-rose-500">*</span>
                    </label>
                    <select id="category_id" name="category_id" required
                            class="w-full px-4 py-3 bg-slate-50 border <?= isset(session('errors')['category_id']) ? 'border-rose-500 bg-rose-50/30' : 'border-slate-200' ?> rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all text-slate-800">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= old('category_id') == $cat['id'] ? 'selected' : '' ?>>
                                <?= esc($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset(session('errors')['category_id'])): ?>
                        <p class="text-xs text-rose-600 mt-1.5 flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= session('errors')['category_id'] ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Baris 2: Harga, Tingkat Kepedasan, Kalori -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Harga -->
                <div>
                    <label for="price" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Harga (Rp) <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-xs font-bold text-slate-400">Rp</span>
                        <input type="number" id="price" name="price" value="<?= old('price') ?>" required min="0" step="500"
                               placeholder="25000"
                               class="w-full pl-12 pr-4 py-3 bg-slate-50 border <?= isset(session('errors')['price']) ? 'border-rose-500 bg-rose-50/30' : 'border-slate-200' ?> rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                    </div>
                    <?php if (isset(session('errors')['price'])): ?>
                        <p class="text-xs text-rose-600 mt-1.5 flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= session('errors')['price'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Tingkat Kepedasan -->
                <div>
                    <label for="spiciness_level" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Tingkat Kepedasan
                    </label>
                    <select id="spiciness_level" name="spiciness_level"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all text-slate-800">
                        <option value="0" <?= old('spiciness_level', '0') == '0' ? 'selected' : '' ?>>Level 0 (Tidak Pedas)</option>
                        <option value="1" <?= old('spiciness_level') == '1' ? 'selected' : '' ?>>Level 1 (Pedas Sedang)</option>
                        <option value="2" <?= old('spiciness_level') == '2' ? 'selected' : '' ?>>Level 2 (Pedas Mantap)</option>
                        <option value="3" <?= old('spiciness_level') == '3' ? 'selected' : '' ?>>Level 3 (Ekstra Pedas Manado)</option>
                    </select>
                </div>

                <!-- Kalori -->
                <div>
                    <label for="calories" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Estimasi Kalori (kkal)
                    </label>
                    <input type="number" id="calories" name="calories" value="<?= old('calories', '300') ?>" min="0"
                           placeholder="Contoh: 320"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                </div>
            </div>

            <!-- Baris 3: Deskripsi Lengkap -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Deskripsi Lengkap Makanan <span class="text-rose-500">*</span>
                </label>
                <textarea id="description" name="description" rows="3" required
                          placeholder="Jelaskan kelezatan, aroma, dan keunikan cita rasa makanan khas Manado ini..."
                          class="w-full px-4 py-3 bg-slate-50 border <?= isset(session('errors')['description']) ? 'border-rose-500 bg-rose-50/30' : 'border-slate-200' ?> rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all"><?= old('description') ?></textarea>
                <?php if (isset(session('errors')['description'])): ?>
                    <p class="text-xs text-rose-600 mt-1.5 flex items-center">
                        <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= session('errors')['description'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Baris 4: Komposisi Bahan Alami (Ingredients) -->
            <div>
                <label for="ingredients" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Komposisi Bahan Autentik <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="ingredients" name="ingredients" value="<?= old('ingredients') ?>" required
                       placeholder="Contoh: Labu kuning, beras, kangkung, bayam, kemangi, jagung manis, cakalang fufu"
                       class="w-full px-4 py-3 bg-slate-50 border <?= isset(session('errors')['ingredients']) ? 'border-rose-500 bg-rose-50/30' : 'border-slate-200' ?> rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:bg-white transition-all">
                <p class="text-[11px] text-slate-400 mt-1">Pisahkan bahan-bahan dengan tanda koma.</p>
                <?php if (isset(session('errors')['ingredients'])): ?>
                    <p class="text-xs text-rose-600 mt-1.5 flex items-center">
                        <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= session('errors')['ingredients'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Baris 5: Upload Foto / Pilih Foto AI -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 rounded-2xl bg-purple-50/50 border border-purple-100">
                <!-- Upload File Gambar -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Upload Foto Menu (Opsional)
                    </label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-dark cursor-pointer transition-all">
                    <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, WEBP (Maksimal 3MB)</p>
                    <?php if (isset(session('errors')['image'])): ?>
                        <p class="text-xs text-rose-600 mt-1.5 flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= session('errors')['image'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Atau Pilih Aset Gambar Makanan yang Tersedia -->
                <div>
                    <label for="image_select" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Atau Pilih Dari Galeri Gambar AI Manado
                    </label>
                    <select id="image_select" name="image_select" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">-- Gunakan Foto Unggahan / Default --</option>
                        <option value="tinutuan_original.jpg">Tinutuan Original Spesial (Bubur Manado Hijau Kuning)</option>
                        <option value="tinutuan_cakalang.jpg">Tinutuan Cakalang Fufu Suwir</option>
                        <option value="tinutuan_sambal_roa.jpg">Tinutuan Sambal Roa Pedas Mantap</option>
                        <option value="tinutuan_seafood.jpg">Tinutuan Seafood Udang Kuah Kuning</option>
                        <option value="paket_komplit_tinutuan.jpg">Paket Komplit Tinutuan Juara</option>
                        <option value="paket_sarapan_sultan.jpg">Paket Sarapan Sultan Manado</option>
                        <option value="perkedel_jagung.jpg">Perkedel Jagung Manado Crispy</option>
                        <option value="pisang_goroho.jpg">Pisang Goreng Goroho Sambal Roa</option>
                        <option value="es_brenebon.jpg">Es Brenebon Kacang Merah Manado</option>
                        <option value="klappertaart.jpg">Klappertaart Panggang Mini Autentik</option>
                    </select>
                </div>
            </div>

            <!-- Baris 6: Opsi Status & Rekomendasi -->
            <div class="flex flex-wrap items-center gap-6 pt-2">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_available" value="1" <?= old('is_available', '1') ? 'checked' : '' ?> class="w-5 h-5 text-primary rounded-lg border-slate-300 focus:ring-primary">
                    <span class="text-sm font-semibold text-slate-800">Menu Tersedia untuk Dipesan</span>
                </label>

                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_favorite" value="1" <?= old('is_favorite') ? 'checked' : '' ?> class="w-5 h-5 text-accent rounded-lg border-slate-300 focus:ring-accent">
                    <span class="text-sm font-semibold text-slate-800">
                        <i class="fa-solid fa-star text-accent mr-1"></i> Tandai Sebagai Menu Rekomendasi Chef
                    </span>
                </label>
            </div>

            <!-- Tombol Aksi -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end space-x-4">
                <a href="<?= base_url('admin/menu') ?>" class="px-6 py-3 rounded-2xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-primary to-purple-700 hover:from-purple-600 hover:to-primary text-white font-bold rounded-2xl shadow-lg shadow-primary/30 hover:shadow-primary/50 transition-all duration-200 flex items-center space-x-2 text-sm">
                    <i class="fa-solid fa-floppy-disk text-accent"></i>
                    <span>Simpan Menu Baru</span>
                </button>
            </div>

        </form>
    </div>

</div>

<?= $this->endSection() ?>
