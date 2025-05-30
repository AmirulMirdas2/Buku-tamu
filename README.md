## Deskripsi Website

**Buku Tamu Digital** adalah aplikasi web berbasis Laravel yang dirancang untuk memudahkan pencatatan data tamu secara digital di lingkungan instansi, kantor, sekolah, atau organisasi. Website ini memungkinkan tamu untuk mengisi data diri, keperluan kunjungan, serta mengambil foto secara langsung melalui webcam. Seluruh data yang masuk akan tersimpan secara otomatis ke dalam database dan dapat dikelola oleh admin melalui dashboard yang aman dan mudah digunakan.

Aplikasi ini mendukung proses digitalisasi administrasi tamu, mengurangi penggunaan kertas, serta meningkatkan efisiensi dan keamanan data. Admin dapat melakukan pencarian, filter berdasarkan tanggal, mencetak data tamu, dan menghapus data yang tidak diperlukan. Sistem autentikasi juga diterapkan agar hanya admin yang berhak dapat mengakses fitur manajemen data tamu.

---

## Penjelasan Kode

### Struktur Utama

-   **Frontend (Tamu):**

    -   Halaman form tamu (`resources/views/guest/create.blade.php`) menggunakan Bootstrap untuk tampilan responsif dan WebcamJS untuk fitur ambil foto.
    -   Field yang diisi: Nama, Email, No. Telepon, Keperluan, dan Foto. Validasi dilakukan di sisi server dan client.
    -   Data dikirim ke route `guest.store` untuk diproses oleh `GuestController` dan disimpan ke database.

-   **Backend (Admin):**

    -   Admin login menggunakan autentikasi Laravel bawaan (`Auth`).
    -   Dashboard admin (`resources/views/admin/guests/index.blade.php`) menampilkan tabel data tamu lengkap dengan foto, nama, email, telepon, pesan, tanggal, dan aksi hapus.
    -   Fitur pencarian, filter tanggal, dan cetak data tamu tersedia di dashboard.
    -   Semua route diatur pada `routes/web.php` dengan middleware `auth` untuk membedakan akses tamu dan admin.

-   **Model & Database:**
    -   Model `Guest` menyimpan data tamu, dengan migrasi database pada `database/migrations/2025_05_01_135616_create_guests_table.php`.
    -   Data foto tamu disimpan di folder `public/photos` dan path-nya dicatat di database.

### Alur Kerja

1. Tamu mengisi form dan mengambil foto.
2. Data dikirim ke server dan divalidasi.
3. Jika valid, data disimpan ke database dan foto disimpan di server.
4. Admin login untuk melihat, mencari, mencetak, atau menghapus data tamu melalui dashboard.

---

## User Interface

### Halaman Tamu

-   Form input sederhana, modern, dan responsif.
-   Input: Nama, Email, No. Telepon, Keperluan, dan ambil foto via webcam.
-   Notifikasi sukses/gagal setelah submit.
-   Tombol login admin tersedia di bawah form.

### Halaman Admin

-   Dashboard dengan tampilan tabel data tamu.
-   Kolom: No, Foto, Nama, Email, Telepon, Pesan, Tanggal, dan Aksi.
-   Fitur pencarian data tamu secara real-time.
-   Filter data berdasarkan rentang tanggal kunjungan.
-   Tombol cetak data tamu (PDF/print friendly).
-   Aksi hapus data tamu dengan konfirmasi.
-   Navigasi sidebar dan header yang modern (menggunakan AdminLTE).

### Keamanan & Akses

-   Hanya admin yang dapat login dan mengakses dashboard.
-   Data tamu tidak dapat diubah oleh tamu setelah submit.
-   Validasi data dan proteksi CSRF pada setiap form.

---

## Fitur Utama

-   Input data tamu digital dengan foto webcam.
-   Dashboard admin untuk manajemen data tamu.
-   Pencarian dan filter data tamu.
-   Cetak data tamu.
-   Autentikasi admin.
-   Tampilan modern dan responsif.

---
