# Wireframe & User Flow — SIMPUS-Mini

Sub-CPMK: Merancang UI/UX aplikasi (proyek).

Dokumen ini memuat perancangan antarmuka (*wireframe*) dan alur pengguna (*user flow*) untuk aplikasi **SIMPUS-Mini** (Sistem Informasi Perpustakaan Mini). Dokumen ini mencakup pemetaan halaman yang sudah diimplementasikan pada Jobsheet 1–3 serta rancangan halaman baru untuk tahap pengembangan berikutnya (Jobsheet 5 dan seterusnya) seperti Autentikasi Petugas, Dashboard Interaktif, dan Modul Transaksi Peminjaman/Pengembalian Buku.

---

## 1. Aktor & Hak Akses

| Aktor | Deskripsi & Hak Akses | Halaman yang Dapat Diakses |
|---|---|---|
| **Tamu (Pengunjung)** | Pengunjung perpustakaan umum tanpa autentikasi; hanya memiliki hak akses melihat (*read-only*). | - Beranda (`index.html`)<br>- Daftar Katalog Buku (`buku/list.html`)<br>- Form Login Petugas |
| **Petugas (Admin)** | Pengelola perpustakaan yang memiliki akun; mengelola master data buku, master data anggota, serta sirkulasi peminjaman. | - Seluruh halaman Tamu<br>- Dashboard Petugas<br>- CRUD Buku (`buku/list.html`, `buku/tambah.html`, edit/hapus)<br>- CRUD Anggota (`anggota/list.html`, `anggota/tambah.html`, edit/hapus)<br>- Transaksi Peminjaman & Pengembalian<br>- Riwayat Transaksi |

---

## 2. User Flow

### 2.1 User Flow — Navigasi Tamu (Katalog & Informasi)
```
[Buka Website] -> [Beranda SIMPUS-Mini]
      |
      +--> [Lihat Statistik Ringkasan Buku]
      |
      +--> [Pilih "Daftar Buku"] -> [Eksplorasi Katalog Buku & Ketersediaan Stok]
      |
      +--> [Klik Tombol "Login"] -> [Masuk ke Halaman Login Petugas]
```

### 2.2 User Flow — Autentikasi Petugas
```
[Halaman Login] -> [Input Username & Password] -> [Klik "Masuk"]
      |
      +--> [Kredensial Valid]   -> [Redirect ke Dashboard Petugas]
      +--> [Kredensial Salah]   -> [Pesan Error "Username/Password Salah"]
```

### 2.3 User Flow — Peminjaman Buku Baru
```
[Petugas Login] -> [Dashboard Petugas] -> [Pilih Menu "Peminjaman Baru"]
        -> [Pilih Anggota dari Dropdown/Search]
        -> [Pilih Buku (Hanya buku dengan stok > 0)]
        -> [Sistem mencatat tanggal pinjam secara otomatis]
        -> [Klik "Simpan Peminjaman"]
        -> [Stok Buku Berkurang 1]
        -> [Notifikasi Berhasil & Kembali ke Dashboard / Riwayat]
```

### 2.4 User Flow — Pengembalian Buku
```
[Dashboard Petugas] -> [Pilih Menu "Pengembalian"]
        -> [Cari Transaksi Aktif (berdasarkan No. Anggota / Nama / Judul Buku)]
        -> [Verifikasi Data Transaksi]
        -> [Klik Tombol "Tandai Dikembalikan"]
        -> [Stok Buku Bertambah 1]
        -> [Status Transaksi Berubah Menjadi "Selesai"]
        -> [Kembali ke Dashboard / Tabel Transaksi Terupdate]
```

---

## 3. Wireframe Halaman Eksisting (Jobsheet 1–3)

### 3.1 Wireframe: Beranda (`index.html`)
```
+-----------------------------------------------------------------------+
|  SIMPUS-Mini               [Beranda] [Daftar Buku] [Tambah Buku]      |
|                            [Daftar Anggota] [Tambah Anggota]    [ = ] |
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Selamat Datang di Sistem Perpustakaan Mini                     |  |
|  |  Aplikasi sederhana untuk mengelola data buku dan anggota       |  |
|  |  perpustakaan.                                                  |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Ringkasan                                                      |  |
|  |                                                                 |  |
|  |  +-----------------+  +-----------------+  +-----------------+  |  |
|  |  |   Total Buku    |  |  Total Anggota  |  | Sedang Dipinjam |  |  |
|  |  |       12        |  |        8        |  |        3        |  |  |
|  |  +-----------------+  +-----------------+  +-----------------+  |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Jobsheet1                        |
+-----------------------------------------------------------------------+
```

### 3.2 Wireframe: Daftar Buku (`buku/list.html`)
```
+-----------------------------------------------------------------------+
|  SIMPUS-Mini               [Beranda] [Daftar Buku] [Tambah Buku]      |
|                            [Daftar Anggota] [Tambah Anggota]          |
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Daftar Buku                                                    |  |
|  |                                                                 |  |
|  |  +-----------------------------------------------------------+  |  |
|  |  | Judul            | Pengarang      | Tahun | Stok | Aksi   |  |  |
|  |  |------------------+----------------+-------+------+--------|  |  |
|  |  | Laskar Pelangi   | Andrea Hirata  | 2005  |  4   | [E] [H]|  |  |
|  |  | Bumi Manusia     | Pramoedya A. T.| 1980  |  2   | [E] [H]|  |  |
|  |  | Negeri 5 Menara  | Ahmad Fuadi    | 2009  |  0   | [E] [H]|  |  |
|  |  | Filosofi Teras   | Henry M.       | 2018  |  5   | [E] [H]|  |  |
|  |  | Ronggeng D. P.   | Ahmad Tohari   | 1982  |  1   | [E] [H]|  |  |
|  |  +-----------------------------------------------------------+  |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Jobsheet 1                       |
+-----------------------------------------------------------------------+
Keterangan Tombol Aksi: [E] = Edit (Kuning/Warning), [H] = Hapus (Merah/Danger)
```

### 3.3 Wireframe: Form Tambah Buku (`buku/tambah.html`)
```
+-----------------------------------------------------------------------+
|  SIMPUS-Mini               [Beranda] [Daftar Buku] [Tambah Buku]      |
|                            [Daftar Anggota] [Tambah Anggota]          |
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Tambah Buku                                                    |  |
|  |                                                                 |  |
|  |  Judul :                                                        |  |
|  |  [___________________________________________________________]  |  |
|  |                                                                 |  |
|  |  Pengarang :                                                    |  |
|  |  [___________________________________________________________]  |  |
|  |                                                                 |  |
|  |  Tahun Terbit :                                                 |  |
|  |  [__________________] (1900 - 2026)                             |  |
|  |                                                                 |  |
|  |  ISBN :                                                         |  |
|  |  [___________________________________________________________]  |  |
|  |                                                                 |  |
|  |  Stok :                                                         |  |
|  |  [__________________]                                           |  |
|  |                                                                 |  |
|  |  Kategori :                                                     |  |
|  |  [ Fiksi                       v ]                              |  |
|  |                                                                 |  |
|  |  [  Simpan  ]                                                   |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Jobsheet 1                       |
+-----------------------------------------------------------------------+
```

### 3.4 Wireframe: Daftar Anggota (`anggota/list.html`)
```
+-----------------------------------------------------------------------+
|  SIMPUS-Mini               [Beranda] [Daftar Buku] [Tambah Buku]      |
|                            [Daftar Anggota] [Tambah Anggota]          |
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Daftar Anggota                                                 |  |
|  |                                                                 |  |
|  |  +-----------------------------------------------------------+  |  |
|  |  | No. Anggota | Nama         | Alamat   | No. HP   | Aksi   |  |  |
|  |  |-------------+--------------+----------+----------+--------|  |  |
|  |  | A001        | Siti Aminah  | Malang   | 0812xxxx | [E] [H]|  |  |
|  |  | A002        | Budi Santoso | Batu     | 0813xxxx | [E] [H]|  |  |
|  |  +-----------------------------------------------------------+  |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Jobsheet1                        |
+-----------------------------------------------------------------------+
```

### 3.5 Wireframe: Form Tambah Anggota (`anggota/tambah.html`)
```
+-----------------------------------------------------------------------+
|  SIMPUS-Mini               [Beranda] [Daftar Buku] [Tambah Buku]      |
|                            [Daftar Anggota] [Tambah Anggota]          |
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Tambah Anggota                                                 |  |
|  |                                                                 |  |
|  |  Nama :                                                         |  |
|  |  [___________________________________________________________]  |  |
|  |                                                                 |  |
|  |  No. Anggota :                                                  |  |
|  |  [___________________________________________________________]  |  |
|  |                                                                 |  |
|  |  Alamat :                                                       |  |
|  |  [___________________________________________________________]  |  |
|  |                                                                 |  |
|  |  No. HP :                                                       |  |
|  |  [___________________________________________________________]  |  |
|  |                                                                 |  |
|  |  [  Simpan  ]                                                   |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Jobsheet1                        |
+-----------------------------------------------------------------------+
```

---

## 4. Wireframe Rencana Pengembangan (Jobsheet 5+)

### 4.1 Wireframe: Halaman Login Petugas
```
+-----------------------------------------------------------------------+
|                              SIMPUS-Mini                              |
|-----------------------------------------------------------------------|
|                                                                       |
|                     +---------------------------+                     |
|                     |       Login Petugas       |                     |
|                     |---------------------------|                     |
|                     |                           |                     |
|                     |  Username :               |                     |
|                     |  [_____________________]  |                     |
|                     |                           |                     |
|                     |  Password :               |                     |
|                     |  [_____________________]  |                     |
|                     |                           |                     |
|                     |       [   Masuk   ]       |                     |
|                     |                           |                     |
|                     |  Belum punya akun?        |                     |
|                     |  <Daftar di sini>         |                     |
|                     +---------------------------+                     |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Login Portal                     |
+-----------------------------------------------------------------------+
```

### 4.2 Wireframe: Dashboard Petugas
```
+-----------------------------------------------------------------------+
| SIMPUS-Mini   Beranda | Buku | Anggota | Peminjaman | (Petugas) Logout|
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------+  +-----------------+  +-----------------------+  |
|  |   Total Buku    |  |  Total Anggota  |  |    Sedang Dipinjam    |  |
|  |       12        |  |        8        |  |           3           |  |
|  +-----------------+  +-----------------+  +-----------------------+  |
|                                                                       |
|  Aksi Cepat:                                                          |
|  [ + Peminjaman Baru ]         [ + Pengembalian Buku ]                |
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Transaksi Terbaru                                              |  |
|  |  +-----------------------------------------------------------+  |  |
|  |  | Anggota      | Buku            | Tgl Pinjam | Status      |  |  |
|  |  |--------------+-----------------+------------+-------------|  |  |
|  |  | Siti Aminah  | Bumi Manusia    | 15/07/2026 | Dipinjam    |  |  |
|  |  | Budi Santoso | Laskar Pelangi  | 14/07/2026 | Selesai     |  |  |
|  |  | Siti Aminah  | Filosofi Teras  | 12/07/2026 | Dipinjam    |  |  |
|  |  +-----------------------------------------------------------+  |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Dashboard                        |
+-----------------------------------------------------------------------+
```

### 4.3 Wireframe: Form Peminjaman Buku
```
+-----------------------------------------------------------------------+
| SIMPUS-Mini   Beranda | Buku | Anggota | Peminjaman | (Petugas) Logout|
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Form Peminjaman Buku                                           |  |
|  |                                                                 |  |
|  |  Anggota :                                                      |  |
|  |  [ Pilih Anggota (contoh: A001 - Siti Aminah)                 v ]|  |
|  |                                                                 |  |
|  |  Buku Dipinjam :                                                |  |
|  |  [ Pilih Buku (hanya menampilkan stok > 0)                    v ]|  |
|  |                                                                 |  |
|  |  Tanggal Pinjam :                                               |  |
|  |  [ 10/09/2026 ] (auto: terisi tanggal hari ini)                 |  |
|  |                                                                 |  |
|  |  Batas Pengembalian :                                           |  |
|  |  [ 17/09/2026 ] (auto: +7 hari)                                 |  |
|  |                                                                 |  |
|  |  [  Simpan Peminjaman  ]       [ Batal ]                        |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Transaksi                        |
+-----------------------------------------------------------------------+
```

### 4.4 Wireframe: Form / Halaman Pengembalian Buku
```
+-----------------------------------------------------------------------+
| SIMPUS-Mini   Beranda | Buku | Anggota | Peminjaman | (Petugas) Logout|
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Pengembalian Buku                                              |  |
|  |                                                                 |  |
|  |  Cari Transaksi Aktif:                                          |  |
|  |  [ Masukkan nama anggota / judul buku...             ] [ Cari ] |  |
|  |                                                                 |  |
|  |  +-----------------------------------------------------------+  |  |
|  |  | Anggota      | Judul Buku      | Tgl Pinjam | Aksi        |  |  |
|  |  |--------------+-----------------+------------+-------------|  |  |
|  |  | Siti Aminah  | Bumi Manusia    | 15/07/2026 | [Kembalikan]|  |  |
|  |  | Siti Aminah  | Filosofi Teras  | 12/07/2026 | [Kembalikan]|  |  |
|  |  +-----------------------------------------------------------+  |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Sirkulasi                        |
+-----------------------------------------------------------------------+
```

### 4.5 Wireframe: Riwayat Peminjaman per Anggota
```
+-----------------------------------------------------------------------+
| SIMPUS-Mini   Beranda | Buku | Anggota | Peminjaman | (Petugas) Logout|
|-----------------------------------------------------------------------|
|                                                                       |
|  +-----------------------------------------------------------------+  |
|  |  Riwayat Peminjaman — Siti Aminah (A001)                        |  |
|  |  Alamat: Malang | No. HP: 0812xxxx                              |  |
|  |                                                                 |  |
|  |  +-----------------------------------------------------------+  |  |
|  |  | Buku            | Tgl Pinjam | Tgl Kembali | Status       |  |  |
|  |  |-----------------+------------+-------------+--------------|  |  |
|  |  | Laskar Pelangi  | 01/07/2026 | 10/07/2026  | Selesai      |  |  |
|  |  | Bumi Manusia    | 15/07/2026 | -           | Dipinjam     |  |  |
|  |  | Filosofi Teras  | 12/07/2026 | -           | Dipinjam     |  |  |
|  |  +-----------------------------------------------------------+  |  |
|  |                                                                 |  |
|  |  [ Kembali ke Daftar Anggota ]                                  |  |
|  +-----------------------------------------------------------------+  |
|                                                                       |
|-----------------------------------------------------------------------|
|                 © 2026 SIMPUS-Mini — Riwayat                          |
+-----------------------------------------------------------------------+
```

---

## 5. Konsistensi dengan Desain yang Sudah Berjalan (`style/style.css`)

Rancangan seluruh halaman baru harus mempertahankan konsistensi visual dan arsitektur CSS yang telah dibangun pada Jobsheet 2 dan Jobsheet 3:

1. **Design Tokens & Palet Warna**:
   - **Primary / Brand Accent**: `#1d5b8a` (digunakan pada `<header>`, judul section `h2`, button submit `Simpan`, header tabel `thead`, dan angka metrik stat card).
   - **Primary Hover**: `#2486d1` (efek transisi tombol form).
   - **Background Halaman**: `#f5f6f8` (netral terang).
   - **Card / Section Surface**: `#ffffff` dengan border radius `10px` dan shadow `0 5px 2px rgba(0, 0, 0, 0.08)`.
   - **Stat Card Background**: `#eef4fa` dengan teks label `#55677a` dan nilai `#1d5b8a`.
   - **Action Buttons (Tabel)**:
     - Tombol Edit: `#f0ad4e` (amber/kuning).
     - Tombol Hapus: `#d9534f` (merah/danger).
     - Tombol Kembalikan: `#1d5b8a` atau aksen hijau seragam.
   - **Input Fields**: background `#fafbfc`, border `#cdd4da`, radius `10px`, padding `0.7rem 1rem`.

2. **Tipografi**:
   - Family: `"Segoe UI", Arial, sans-serif`.
   - Warna teks body: `#2b2b2b`.
   - Heading: `h1` berukuran `1.4rem`, `h2` untuk judul modul utama.

3. **Komponen Navigasi & Responsivitas**:
   - Header sticky/flexbox dengan navigasi horizontal pada layar desktop (`min-width: 769px`).
   - Penambahan menu baru pada navbar: menu **Peminjaman** dan indikator status akun petugas (contoh: `(Nama Petugas) | [Logout]`).
   - **Mobile Menu**: Menggunakan checkbox hack `#nav-toggle` dan `.nav-toggle-label` (`&#9776;`) dengan breakpoint responsive:
     - `@media (max-width: 768px)`: Navbar flex column, elemen terpusat.
     - `@media (max-width: 480px)`: Navigasi disembunyikan secara default (`display: none`) dan muncul saat toggle burger disentuh.

4. **Komponen Tabel & Form**:
   - Pembungkus `.table-responsive` (`overflow-x: auto`) wajib digunakan pada setiap tabel data baru untuk menjaga tampilan pada layar ponsel.
   - Form mengadopsi struktur vertikal berjarak seragam (`gap: 1.5rem`), label tebal, dan tombol aksi di bagian bawah.

5. **Validasi & Penanganan Kasus Khusus (Edge Cases)**:
   - **Stok Kosong**: Buku dengan stok `0` (seperti contoh buku *Negeri 5 Menara*) tidak boleh ditampilkan atau harus dalam status disabled pada dropdown peminjaman.
   - **Peminjaman Ganda**: Anggota yang sedang meminjam buku dengan judul yang sama dicegah melakukan peminjaman ganda sampai transaksi sebelumnya diselesaikan.
   - **Pengembalian Stok**: Transaksi pengembalian otomatis mengembalikan kalkulasi stok buku (`+1`) secara konsisten.
