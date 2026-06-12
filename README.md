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

# 🌊 WaterRelief

**Flood Disaster Complaint, Donation, and Logistics Management System**
**Sistem Manajemen Pengaduan, Donasi, dan Logistik Bencana Banjir**

Built with Laravel 12, Filament, and MariaDB

---

# 🌐 Live Demo

**Production URL:**
https://www.waterrelief.my.id

---

# About the Project | Tentang Proyek

## [EN]

WaterRelief is a web-based disaster management platform designed to facilitate communication and coordination between citizens, volunteers, and administrators during flood emergencies.

The platform enables citizens to report disaster incidents, submit donations, access shelter information, and monitor logistics availability. Volunteers can manage complaints, distribute aid, monitor inventory, and coordinate emergency responses. Administrators oversee the entire system through a centralized dashboard.

The primary objective of WaterRelief is to improve disaster response efficiency, increase transparency in aid distribution, and provide a digital platform that supports community-driven disaster management.

## [ID]

WaterRelief adalah platform manajemen bencana berbasis web yang dirancang untuk memfasilitasi komunikasi dan koordinasi antara masyarakat, relawan, dan administrator selama kondisi darurat banjir.

Platform ini memungkinkan masyarakat untuk melaporkan kejadian bencana, mengirim donasi, mengakses informasi posko, serta memantau ketersediaan logistik. Relawan dapat mengelola laporan, mendistribusikan bantuan, memantau inventaris, dan mengoordinasikan respons darurat. Administrator mengawasi keseluruhan sistem melalui dashboard terpusat.

Tujuan utama WaterRelief adalah meningkatkan efektivitas penanganan bencana, memperkuat transparansi distribusi bantuan, serta menyediakan platform digital yang mendukung pengelolaan bencana berbasis masyarakat.

---

# Architecture | Arsitektur

## [EN]

WaterRelief follows a role-based web application architecture built with Laravel. The system separates functionalities into three user roles:

* Citizen
* Volunteer
* Administrator

Authentication is handled through Laravel Breeze with Email Verification and Two-Factor Authentication (2FA). The administrative dashboard is powered by Filament, while user-facing features are rendered using Blade and Tailwind CSS.

## [ID]

WaterRelief menggunakan arsitektur aplikasi web berbasis peran yang dibangun dengan Laravel. Sistem membagi fungsionalitas ke dalam tiga jenis pengguna:

* Citizen (Masyarakat)
* Volunteer (Relawan)
* Administrator

Autentikasi ditangani menggunakan Laravel Breeze dengan Email Verification dan Two-Factor Authentication (2FA). Dashboard administrator dibangun menggunakan Filament, sedangkan antarmuka pengguna menggunakan Blade dan Tailwind CSS.

---

# Key Features | Fitur Utama

## [EN]

* Multi-Role Authentication (Citizen, Volunteer, Administrator)
* Email Verification
* Two-Factor Authentication (2FA)
* Complaint Reporting with Image Upload
* Complaint Assignment and Tracking
* Shelter Management
* Logistics Inventory Monitoring
* Low Stock Notifications
* Expiring Logistics Notifications
* Donation Submission and Tracking
* Volunteer Delivery Missions
* User Profile Management
* Notification System
* Administrative Dashboard

## [ID]

* Autentikasi Multi-Role (Citizen, Volunteer, Administrator)
* Verifikasi Email
* Two-Factor Authentication (2FA)
* Pelaporan Bencana dengan Upload Gambar
* Penugasan dan Pelacakan Laporan
* Manajemen Posko Pengungsian
* Monitoring Inventaris Logistik
* Notifikasi Stok Menipis
* Notifikasi Barang Mendekati Kedaluwarsa
* Pengajuan dan Pelacakan Donasi
* Misi Distribusi Bantuan Relawan
* Manajemen Profil Pengguna
* Sistem Notifikasi
* Dashboard Administrasi

---

# Tech Stack | Teknologi yang Digunakan

| Layer                | Technology            |
| -------------------- | --------------------- |
| Backend Framework    | Laravel 12            |
| Programming Language | PHP 8.3+              |
| Frontend             | Blade                 |
| Styling              | Tailwind CSS          |
| Build Tool           | Vite                  |
| Database             | MariaDB               |
| Authentication       | Laravel Breeze        |
| Admin Panel          | Filament              |
| Notification System  | Laravel Notifications |
| Storage              | Laravel Storage       |
| Version Control      | Git & GitHub          |

---

# Database Schema | Skema Basis Data

### Main Tables

* users
* roles
* shelters
* complaints
* complaint_images
* logistics
* logistics_categories
* donations
* notifications

### Supporting Tables

* migrations
* sessions
* cache
* cache_locks
* password_reset_tokens

---

# Security Features | Fitur Keamanan

* Password Hashing (Bcrypt)
* Email Verification
* Two-Factor Authentication (2FA)
* CSRF Protection
* Role-Based Access Control (RBAC)
* Secure Session Management
* Request Validation

---

# Installation & Configuration | Instalasi dan Konfigurasi

## Clone Repository

```bash
git clone https://github.com/your-organization/WaterRelief.git

cd WaterRelief
```

## Install Dependencies

```bash
composer install

npm install
```

## Environment Setup

```bash
cp .env.example .env

php artisan key:generate
```

## Database Migration

```bash
php artisan migrate

php artisan db:seed
```

## Storage Link

```bash
php artisan storage:link
```

## Build Assets

```bash
npm run build
```

---

# Running the Application | Menjalankan Aplikasi

### Terminal 1

```bash
php artisan serve
```

### Terminal 2

```bash
npm run dev
```

### Terminal 3 (Optional Queue Worker)

```bash
php artisan queue:work
```

---

# User Roles | Peran Pengguna

| Role          | Description                               |
| ------------- | ----------------------------------------- |
| Administrator | System Management & Monitoring            |
| Volunteer     | Complaint Handling & Aid Distribution     |
| Citizen       | Complaint Reporting & Donation Submission |

---


# License | Lisensi

This project was developed for academic purposes as part of a Software Engineering course project.

Proyek ini dikembangkan untuk keperluan akademik sebagai bagian dari tugas mata kuliah Rekayasa Perangkat Lunak.
