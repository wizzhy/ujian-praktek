# Aprilianto's Tinutuan — Website Modern Promosi Makanan Khas Manado

![Tinutuan Banner](public/uploads/menu/hero_tinutuan.jpg)

Website resmi promosi kuliner autentik **Tinutuan (Bubur Manado)** berbasis **CodeIgniter 4 + Tailwind CSS + MySQL**, dirancang dengan standar franchise makanan modern berkelas (seperti KFC, Burger Bangor, Pizza Hut, Five Guys) untuk mengangkat makanan khas daerah Sulawesi Utara ke level yang lebih tinggi.

---

## 📋 Data Ujian Praktik On The Spot Coding

| Informasi | Keterangan |
| :--- | :--- |
| **No. Peserta** | **23** |
| **Nama Siswa** | **Wisnu Aprilianto** |
| **Nama Restoran** | **Aprilianto's Tinutuan** (*Autentik Manado Rasa Nusantara*) |
| **Daerah Asal** | **Sulawesi Utara** |
| **Makanan Khas** | **Tinutuan (Bubur Manado)** |
| **Warna Utama / Primer** | `#9333EA` (Purple / Ungu Modern) |
| **Warna Sekunder / Aksen** | `#FBBF24` (Amber / Kuning Emas) |
| **Fitur Khusus** | **Filter** (Kategori Menu, Pencarian Realtime, Level Kepedasan, Sorting Harga) |
| **Validasi** | **Validasi Form** (Validasi Form Tambah/Edit Menu Admin & Form Pemesanan Cepat) |

---

## ✨ Fitur-Fitur Utama Website

1. **Halaman Depan (*Homepage*) Modern**:
   - Hero Section atraktif dengan tipografi modern (*Outfit* & *Plus Jakarta Sans*), micro-interaction, dan visual hidangan Tinutuan AI definisi tinggi.
   - Section Filosofi & Khasiat Sehat Tinutuan (*Superfood* tradisional bebas kolesterol, kaya serat labu kuning manis *sambiki*, kangkung, bayam, kemangi, dan cakalang fufu).
   - Section Menu Pilihan dengan **Filter Kategori Interaktif langsung di beranda**.
   - Paket Promo Komplit Juara & Testimoni Pelanggan.
   - Footer lengkap identitas restoran dan outlet Manado.

2. **Katalog Menu & Fitur Filter Lengkap (`/menu`)**:
   - Filter Kategori (*Tinutuan Spesial*, *Paket Komplit*, *Gorengan & Pelengkap*, *Minuman & Dessert*).
   - Filter Tingkat Kepedasan (*Level 0 - Tidak Pedas* hingga *Level 3 - Ekstra Pedas Manado*).
   - Pencarian Instan berdasarkan nama atau komposisi bahan.
   - Pengurutan harga (Termurah &rarr; Termahal).

3. **Halaman Detail Makanan (`/menu/{slug}`)**:
   - Foto hidangan AI definisi tinggi dengan badge status dan rekomendasi.
   - Uraian lengkap cita rasa, kandungan kalori (kkal), tingkat kepedasan cabai rawit, dan *chips* komposisi bahan alami.
   - **Formulir Pemesanan Cepat** dengan **Validasi Form** (Nama, No WhatsApp, Jumlah Porsi, Catatan).
   - Rekomendasi 3 menu pelengkap lainnya.

4. **Autentikasi & Panel Admin CRUD (`/login` & `/admin/menu`)**:
   - Halaman Login Admin elegan terlindungi sistem session & hashing password Bcrypt.
   - Manajemen Menu: **Tambah Menu**, **Lihat Daftar Menu**, **Edit Menu**, dan **Hapus Menu**.
   - **Validasi Form** komprehensif pada input form:
     - Nama menu wajib diisi (minimal 3 karakter).
     - Kategori wajib dipilih.
     - Harga wajib berupa angka dan lebih dari Rp 0.
     - Deskripsi makanan minimal 10 karakter.
     - Komposisi bahan minimal 5 karakter.
     - Validasi berkas unggahan gambar (JPG, PNG, WEBP, maks 3MB) atau pemilihan dari galeri aset AI.

---

## 🍲 10 Variasi Menu yang Tersedia

1. **Tinutuan Original Manado Spesial** (Rp 22.000)
2. **Tinutuan Cakalang Fufu Suwir** (Rp 32.000)
3. **Tinutuan Sambal Roa Komplit** (Rp 35.000)
4. **Tinutuan Seafood Kuah Kuning** (Rp 38.000)
5. **Paket Komplit Tinutuan Juara** (Rp 42.000)
6. **Paket Sarapan Sultan Manado** (Rp 48.000)
7. **Perkedel Jagung Manado Crispy** (Rp 18.000)
8. **Pisang Goreng Goroho Sambal Roa** (Rp 24.000)
9. **Es Brenebon Kacang Merah Manado** (Rp 20.000)
10. **Klappertaart Panggang Mini Autentik** (Rp 25.000)

---

## 🔐 Akun Demo Admin

- **URL Login**: `http://localhost/ujian_praktek_pakrinto/public/login`
- **Username**: `admin`
- **Password**: `admin123`

---

## 🚀 Panduan Menjalankan Projek

1. **Pastikan Web Server Apache & MySQL aktif** (via XAMPP).
2. Database akan otomatis tersambung ke `ujian_praktek` di port `3306`.
3. Jalankan migration dan seeder jika belum:
   ```bash
   php spark migrate
   php spark db:seed DatabaseSeeder
   ```
4. Buka browser pada alamat:
   - **Frontend**: [http://localhost/ujian_praktek_pakrinto/public/](http://localhost/ujian_praktek_pakrinto/public/)
   - **Login Admin**: [http://localhost/ujian_praktek_pakrinto/public/login](http://localhost/ujian_praktek_pakrinto/public/login)
