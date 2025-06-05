# Manajemen Proyek

Manajemen Proyek adalah aplikasi berbasis web yang dirancang untuk membantu mengelola proyek, karyawan, dan barang terkait. Aplikasi ini dibangun menggunakan framework CodeIgniter 4 dan dilengkapi dengan berbagai fitur untuk mempermudah pengelolaan data proyek.

## Fitur Utama

- **Manajemen Proyek**: Tambah, edit, hapus, dan lihat detail proyek.
- **Manajemen Karyawan**: Kelola data karyawan yang terlibat dalam proyek.
- **Manajemen Barang**: Kelola barang yang digunakan dalam proyek.
- **Laporan PDF**: Cetak laporan proyek dalam format PDF menggunakan library Dompdf.
- **Dashboard**: Tampilkan statistik proyek berdasarkan status (menunggu, dalam proses, selesai).

## Struktur Direktori

- `app/Controllers`: Berisi controller untuk menangani logika aplikasi.
- `app/Models`: Berisi model untuk berinteraksi dengan database.
- `app/Views`: Berisi file tampilan untuk antarmuka pengguna.
- `public/`: Berisi file yang dapat diakses publik seperti `index.php`, aset CSS, JS, dan lainnya.
- `vendor/`: Berisi dependensi yang diinstal melalui Composer.

## Teknologi yang Digunakan

- **Framework**: CodeIgniter 4
- **Database**: MySQL
- **Library PDF**: Dompdf
- **Frontend**: Select2, FontAwesome, dan lainnya.

## Instalasi

1. Clone repository ini:
   ```bash
   git clone https://github.com/ItsTaufikHdyt/manajemen-proyek.git
2. Masuk ke direktori proyek:
   ```bash
   cd manajemen-proyek
3. Instal dependensi menggunakan Composer:
   ```bash
   composer install
4. Salin file .env.example menjadi .env dan sesuaikan konfigurasi database sesuai dengan pengaturan lokal Anda.
5. Jalankan migrasi database untuk membuat tabel yang diperlukan:
   ```bash
   php spark migrate
6. Akses aplikasi melalui browser di alamat :
   ```bash
   http://localhost:8080

Cara Penggunaan
1. Dashboard: Lihat statistik proyek, barang, dan karyawan secara keseluruhan.
2. Manajemen Barang: Tambahkan, edit, atau hapus data barang yang masuk atau keluar.
3. Manajemen Proyek: Kelola data proyek termasuk status dan laporan.
4. Manajemen Karyawan: Tambahkan atau kelola data karyawan yang terlibat dalam proyek.
5. Laporan PDF: Cetak laporan proyek atau barang dalam format PDF untuk dokumentasi.