# Laporan Praktikum Pemrograman Framework - Minggu 3

**Topik:** Pola MVC, Routing, Controller, View, dan Partial Views pada CodeIgniter 4

**Studi Kasus:** Portal Kegiatan Kampus

## 1. Lingkungan Pengembangan (Environment)

* **PHP Version:** 8.4.12

* **Framework:** CodeIgniter 4

* **Database:** Temporary Array (Tanpa Database)

* **Web Server:** Local Development Server (`php spark serve`)

## 2. Fitur & Tugas Mandiri yang Diselesaikan

* \[x\] Implementasi Pola MVC (Model-View-Controller) tanpa database.

* \[x\] Routing Statis (`/sapa`, `/kegiatan`) dan Routing Dinamis dengan parameter (`/sapa/(:segment)`, `/kegiatan/(:num)`).

* \[x\] Penanganan data tidak ditemukan dengan exception `404 Not Found` (HTTP status code 404).

* \[x\] Reusable partial views (`partials/header.php` dan `partials/footer.php`).

* \[x\] Penambahan total **10 item data kegiatan** pada `KegiatanModel.php`.

* \[x\] Penambahan kolom **Kuota** pada tabel daftar kegiatan (`Views/kegiatan/index.php`).

* \[x\] Penambahan informasi **Lokasi** pada halaman detail kegiatan (`Views/kegiatan/detail.php`).

* \[x\] Pengamanan output dinamis menggunakan fungsi `esc()`.

## 3. Langkah-Langkah Menjalankan Aplikasi

1. **Buka Terminal / Command Prompt** dan masuk ke direktori utama project:

   ```
   cd framework-pertemuan1
   ```

2. **Jalankan Development Server CodeIgniter 4:**

   ```
   php spark serve
   ```

3. **Akses Aplikasi via Browser:**
   Buka alamat yang tertera di terminal: `http://localhost:8080/kegiatan`

## 4. Daftar Endpoint (Routes)

| Method | Endpoint           | Handler               | Deskripsi                                                                          | 
| ------ | ------------------ | --------------------- | ---------------------------------------------------------------------------------- | 
| `GET`  | `/sapa`            | `Sapa::index`         | Menampilkan pesan sapaan statis.                                                   | 
| `GET`  | `/sapa/(:segment)` | `Sapa::nama/$1`       | Menampilkan sapaan dinamis berdasarkan parameter nama.                             | 
| `GET`  | `/kegiatan`        | `Kegiatan::index`     | Menampilkan daftar seluruh kegiatan (10 item) beserta kolom Kuota.                 | 
| `GET`  | `/kegiatan/(:num)` | `Kegiatan::detail/$1` | Menampilkan detail kegiatan berdasarkan ID (termasuk Kategori, Kuota, dan Lokasi). | 

## 5. Hasil Pengujian (Testing Results)

| No      | Endpoint / SKenario | Expected Result                                                              | Status   | 
| ------- | ------------------- | ---------------------------------------------------------------------------- | -------- | 
| **U01** | `GET /sapa`         | Halaman sapaan statis berhasil tampil.                                       | **PASS** | 
| **U02** | `GET /sapa/Andi`    | Menampilkan pesan "Salam, Andi".                                             | **PASS** | 
| **U03** | `GET /kegiatan`     | Menampilkan tabel 10 kegiatan dengan kolom Judul, Kategori, Kuota, dan Aksi. | **PASS** | 
| **U04** | `GET /kegiatan/1`   | Menampilkan detail kegiatan ID 1 lengkap dengan lokasi pelaksanaan.          | **PASS** | 
| **U05** | `GET /kegiatan/10`  | Menampilkan detail kegiatan ID 10 (data ke-10 pada array model).             | **PASS** | 
| **U06** | `GET /kegiatan/999` | Menampilkan halaman kustom `404 Page Not Found`.                             | **PASS** | 
| **U07** | Klik Link "Kembali" | Navigasi kembali dari halaman detail ke `/kegiatan`.                         | **PASS** | 

## 6. Refleksi Singkat

1. **Penerapan MVC:** Model bertindak sebagai penyedia data array, Controller mengatur logika alur request dan memanggil View, sedangkan View bertugas menampilkan data ke HTML.

2. **Pemanfaatan Partial Views:** `header.php` dan `footer.php` dipisah ke folder `partials/` sehingga konsistensi layout tetap terjaga dan menghindari duplikasi kode HTML.

3. **Keamanan:** Penggunaan fungsi `esc()` pada seluruh output dinamis di view berfungsi mencegah serangan *Cross-Site Scripting* (XSS).

