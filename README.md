# 🚀 InvoiceLite — Micro-SaaS Invoice & Billing Generator
> **Project Ujian Tengah Semester (UTS) Pemrograman Web**

InvoiceLite adalah aplikasi web SaaS sederhana untuk membantu freelancer dan UMKM membuat invoice profesional secara instan, mencetak/mengekspor PDF, mengelola basis data klien, dan memantau status pembayaran tagihan melalui dashboard analitik ringkas.

---

## 👥 Tim Pengembang & Pembagian Tugas (GitHub Contributors)

| No | Nama Anggota | GitHub Username | Peran | Tanggung Jawab Utama |
|---|---|---|---|---|
| 1 | `[Nama Anggota 1]` | `@username1` | **Frontend UI/UX Lead** | Landing page, Auth forms, Dashboard Layout & Theme, Client CRUD UI. |
| 2 | `[Nama Anggota 2]` | `@username2` | **Backend & Database Lead** | Database Architecture, Auth session/logic, REST Controllers CRUD Klien & Invoice. |
| 3 | `[Nama Anggota 3]` | `@username3` | **Feature & Analytics Lead** | Dynamic Invoice Builder (JS), Export/Print PDF, Dashboard Chart & Laporan. |

---

## 🛠️ Tech Stack
- **Frontend:** HTML5, CSS3 (Modern Responsive Dashboard / Glassmorphism), JavaScript (Vanilla/Chart.js)
- **Backend:** PHP / Node.js / Laravel (sesuai arahan dosen)
- **Database:** MySQL / MariaDB (`database.sql`)
- **Version Control:** Git & GitHub

---

## 📂 Struktur Repositori
```text
invoicelite-saas/
├── config/                  # Koneksi database & konfigurasi
├── controllers/             # Logic controller (Auth, Client, Invoice)
├── models/                  # Database queries / Models
├── public/
│   ├── css/                 # Styling landing & dashboard
│   ├── js/                  # Invoice calculator & charts
│   └── images/
├── views/                   # Template antarmuka
├── database.sql             # Skrip DDL Database
├── PRD.md                   # Dokumen Product Requirements Document
└── README.md                # Dokumentasi Project
```

---

## 🚀 Cara Menjalankan Project (Lokal)
1. Clone repositori ini:
   ```bash
   git clone https://github.com/[username]/invoicelite-saas.git
   ```
2. Import file database:
   - Buka phpMyAdmin / MySQL CLI
   - Buat database baru `invoicelite_db`
   - Import file [`database.sql`](file:///C:/Users/Captain%20Rama/.gemini/antigravity-ide/scratch/invoicelite-saas/database.sql)
3. Sesuaikan konfigurasi database pada folder `config/`.
4. Jalankan local web server (XAMPP / Laragon / Built-in server).
