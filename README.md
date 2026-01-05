# Admin Beasiswaku1 👨‍💼

**Admin Beasiswaku** adalah bagian dari sistem informasi **Beasiswaku** yang berfungsi sebagai pusat kendali untuk pengelolaan data beasiswa.  
Proyek ini dikembangkan menggunakan **Laravel Framework** sebagai backend utama, dengan tujuan memudahkan pengelola kampus dalam mengatur program beasiswa secara efisien dan aman.  
Proyek ini merupakan **lanjutan dari repository Beasiswaku**, dengan fokus khusus pada modul **dashboard admin**.

## ✨ Fitur Utama
- **Manajemen Data Beasiswa**: tambah, ubah, hapus informasi program beasiswa.
- **Verifikasi Pendaftar**: memeriksa kelengkapan data mahasiswa yang mendaftar.
- **Monitoring Sistem**: melihat statistik dan laporan terkait beasiswa.
- **Kontrol Akses**: mengatur hak pengguna dan menjaga keamanan data.
- **Dashboard Admin**: tampilan khusus untuk pengelola dengan navigasi yang jelas.

## 📂 Struktur Proyek
```
/app           -> folder utama Laravel (controller, model, middleware)
/resources     -> view dengan Blade template (dashboard admin)
/routes        -> file routing aplikasi (web.php)
/database      -> migration dan seeder
/public        -> file publik (CSS, JS, gambar)
/config        -> konfigurasi aplikasi
```

## 🚀 Cara Instalasi
1. Clone repository:
   ```bash
   git clone https://github.com/username/admin-beasiswaku.git
   ```
2. Masuk ke folder proyek:
   ```bash
   cd admin-beasiswaku
   ```
3. Install dependensi Laravel:
   ```bash
   composer install
   ```
4. Buat file `.env` dan sesuaikan konfigurasi database.
5. Jalankan migrasi:
   ```bash
   php artisan migrate
   ```
6. Jalankan server Laravel:
   ```bash
   php artisan serve
   ```
7. Akses `http://localhost:8000` untuk membuka dashboard admin.

## 🛠️ Teknologi yang Digunakan
- **Laravel Framework** (PHP)
- **MySQL** untuk database
- **Blade Template Engine**
- **Composer** untuk manajemen dependensi
- **Bootstrap/TailwindCSS** untuk styling responsif

## 🎓 Konteks Akademik
Proyek ini merupakan **tugas akhir** dari mata kuliah **Manajemen Proyek TI** dan juga bagian dari materi **Pemrograman Web Lanjut** pada **Semester 5**,  
dengan pembimbing **Bapak Moh. Fajar, M.Kom** dan **Bapak Imam Wahyudi, M.Kom** sebagai dosen pengampu.  
Selain itu, proyek ini adalah **lanjutan dari repository Beasiswaku** yang berisi modul utama sistem beasiswa.

## 📜 Lisensi
Proyek ini menggunakan **MIT License**.  
Silakan lihat file [LICENSE](LICENSE) untuk detail lisensi.
Dengan tambahan ini, README kamu sekarang jelas: **Admin Beasiswaku** adalah kelanjutan dari repo utama **Beasiswaku**, sekaligus tugas akhir untuk dua mata kuliah di semester 5.  

Mau saya buatkan juga README untuk **User Beasiswaku** agar konsisten dengan format Admin?
