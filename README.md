# Dokumentasi Singkat Proyek E-Learning Kampus

Halo Reviewer, berikut beberapa informasi penting terkait proyek **E-Learning Kampus** yang saya buat menggunakan **Laravel 12**.

---

## 1. Deskripsi Proyek

Aplikasi ini dibuat untuk memenuhi **tes online: Membangun Aplikasi E-Learning Kampus dengan Laravel**.  
Fitur utama yang tersedia:

-   **Sistem autentikasi Mahasiswa & Dosen** menggunakan **Sanctum API token**.
-   **Manajemen Mata Kuliah & Kelas Online**.
-   **Upload & Unduh Materi Perkuliahan** menggunakan **Laravel Storage**.
-   **Tugas & Penilaian**, dengan **notifikasi email** untuk tugas baru dan penilaian.
-   **Forum Diskusi**.
-   **Laporan & Statistik** menggunakan **Eloquent Aggregates** (`count`, `avg`, dll).
-   **Soft Delete** pada data penting.

---

## 2. Catatan Teknis untuk Reviewer

### Blade & Sanctum API

-   Awalnya menggunakan **Blade** untuk tampilan web.
-   Karena autentikasi menggunakan **Sanctum API token**, user tidak otomatis dikenali di session Blade.
-   Akibatnya:
    -   `@csrf` tidak tersedia di Blade, sehingga form yang dikirim dari Blade akan error.
    -   `Auth::user()` akan null pada request dari Blade.
-   **Solusi:** Semua request sebaiknya diuji menggunakan **Postman** atau **frontend SPA** yang menyertakan token Bearer.

### Laravel WebSockets

-   Saya mencoba menambahkan fitur **real-time forum** menggunakan Laravel WebSockets.
-   Namun, paket `beyondcode/laravel-websockets` **belum kompatibel dengan Laravel 12**.
-   Sehingga fitur **live chat** belum dapat diterapkan di proyek ini.

### Email & Queue

-   Email notifikasi dikirim ke setiap mahasiswa ketika tugas baru dibuat.
-   Untuk testing, driver email menggunakan **log**.
-   Queue email sudah diimplementasikan untuk **performa pengiriman email**.

### Soft Delete

-   Semua data penting (misal: courses, materials, assignments) menggunakan `softDeletes()`.
-   Data yang dihapus **tidak benar-benar hilang dari database** dan bisa dikembalikan jika perlu.

---

## 3. Persyaratan Teknis

-   **Laravel 10+** (dalam proyek ini menggunakan Laravel 12)
-   **Database:** MySQL
-   **Validasi input** tersedia di semua endpoint
-   **Git** digunakan untuk versioning, commit setiap perubahan penting
-   Endpoint tambahan diperbolehkan, namun **tidak mengurangi endpoint yang sudah disediakan**
