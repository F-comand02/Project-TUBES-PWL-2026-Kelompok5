<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# 🚀 Tugas Besar Pemrograman Web Lanjut 2026

[![Framework](https://img.shields.io/badge/Framework-Laravel_12-red)](https://laravel.com)
[![Database](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://MySQL.org)
[![Year](https://img.shields.io/badge/Year-2026-gold)](https://github.com)

Repositori ini berisi implementasi sistem informasi berbasis web yang dikembangkan untuk memenuhi Tugas Besar mata kuliah **Pemrograman Web Lanjut (PWL)** tahun 2026.

---

## 📝 Deskripsi Proyek
**Waterrelief** adalah platform yang dirancang untuk melayani pengaduan komplain terhadap posko terdampak banjir. Proyek ini menekankan pada arsitektur kode yang bersih, keamanan data, dan pengalaman pengguna yang responsif.

## ✨ Fitur Utama
**Login, Shelter, Donation, Komplain**

## 🛠️ Stack Teknologi
| Komponen | Teknologi |
| :--- | :--- |
| **Backend** | Laravel 12 / Node.js (Express) |
| **Frontend** | Vue.js 3 / React 19 / Tailwind CSS 4.0 |
| **Database** | PostgreSQL / MySQL |
| **Tools** | Docker, Postman, Git |

---

## ⚙️ Cara Instalasi (Lokal)

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/username/repo-tubes-pwl.git](https://github.com/username/repo-tubes-pwl.git)
    cd repo-tubes-pwl
    ```

2.  **Instalasi Dependensi**
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Sesuaikan pengaturan database di file `.env`.*

4.  **Migrasi Database**
    ```bash
    php artisan migrate --seed
    ```

5.  **Jalankan Aplikasi**
    ```bash
    php artisan serve
    # Buka terminal baru
    npm run dev
    ```

---

## 📂 Struktur Folder Utama
* `app/Http/Controllers` - Logika alur aplikasi.
* `app/Models` - Definisi struktur data dan relasi.
* `resources/views` - File template antarmuka (jika menggunakan Blade).
* `routes/api.php` - Definisi endpoint untuk integrasi frontend.

## 👥 Tim Pengembang
| NIM | Nama | Role | GitHub |
| :--- | :--- | :--- | :--- |
| **251402069** | Farel Yamotaro Hia| Ketua | [@F-comand02](https://github.com/F-comand02) |
| **251402134**| Nabil Akbar Soufyan| Fullstack | [@NAS](https://github.com/DemonAITYX) |
| **251402090** | Cinta Pardame Sihaloho| Fullstack | [@CintaPardame](https://github.com/CintaPardame) |
| **251402107** | M. Rajadinata| Fullstack | [@rajadinata512-ops](https://github.com/rajadinata512-ops)) |
| **251402098** | Jihan Fadhilah| Fullstack | [@Jihan](https://github.com/jfadhilah) |

## 📄 Lisensi
Distribusi di bawah Lisensi MIT. Lihat `LICENSE` untuk informasi lebih lanjut.
