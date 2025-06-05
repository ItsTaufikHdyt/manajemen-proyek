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
   git clone https://github.com/username/manajemen-proyek.git