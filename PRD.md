# Product Requirements Document (PRD)

## 1. Ikhtisar Produk (Product Overview)

- **Nama Produk:** **InvoiceLite** *(Micro-SaaS Invoice & Billing Generator)*
- **Tipe Aplikasi:** Web-based Micro-SaaS
- **Target Pengguna:** Freelancer, Mahasiswa Pekerja Lepas, dan Pelaku UMKM
- **Deskripsi:** InvoiceLite adalah platform micro-SaaS berbasis web yang memudahkan pekerja lepas dan pelaku bisnis kecil untuk membuat invoice profesional secara instan, mengunduh/mencetak invoice dalam format PDF, mengelola data klien, serta melacak status pembayaran tagihan (*Paid, Unpaid, Overdue*) melalui dashboard analitik ringkas.

---

## 2. Tujuan & Sasaran Project (UTS Pemrograman Web)

1. **Memenuhi Standar Penilaian UTS Web:**
   - Menerapkan arsitektur web yang rapi (MVC / Clean Modular Architecture).
   - Menerapkan sistem Autentikasi aman (Enkripsi password, Session / Token based).
   - Menyediakan operasi CRUD lengkap (*Create, Read, Update, Delete*) pada data Klien dan Invoice.
   - Antarmuka pengguna modern, responsif, dan mudah digunakan (*Clean Dashboard & Form UX*).
2. **Kolaborasi Tim & Rekam Jejak GitHub:**
   - Seluruh anggota tim (3 orang) memiliki porsi kerja terdistribusi dengan *branching* dan *pull request* terstruktur agar tercatat aktif sebagai kontributor di repositori GitHub.

---

## 3. Fitur Utama & Kebutuhan Fungsional

### A. Modul 1: Autentikasi & Profil Bisnis
- Registrasi akun baru dengan nama, email, dan password terenkripsi.
- Login & Logout dengan proteksi session / middleware rute.
- Pengaturan Profil Bisnis: Nama Usaha, Logo, Alamat, Nomor Kontak, dan Mata Uang default (IDR / USD).

### B. Modul 2: Manajemen Klien (Client Management)
- Tambah data klien baru (Nama Klien/Perusahaan, Email, No. Telepon, Alamat).
- Daftar klien dengan fitur pencarian (*Search*) dan pengurutan (*Sort*).
- Edit dan Hapus data klien.

### C. Modul 3: Invoice Engine & Generator (Core SaaS)
- Pembuatan Invoice baru:
  - Nomor invoice otomatis (contoh: `INV-2026-001`).
  - Pemilihan klien dari database relasional.
  - Tanggal terbit (*Issue Date*) dan Jatuh Tempo (*Due Date*).
  - Item baris dinamis (*Line Items*): Deskripsi, Jumlah (*Qty*), Harga Satuan (*Unit Price*), dan Subtotal otomatis.
  - Perhitungan Pajak (*Tax %*) dan Diskon (*Discount %*).
  - Total akhir terhitung secara *real-time* via JavaScript.
- Manajemen status invoice: **Draft**, **Unpaid**, **Paid**, **Overdue**.
- Filter status invoice dan tombol aksi cepat ubah status bayar.

### D. Modul 4: Export & Preview Invoice
- Halaman pratinjau invoice dengan desain faktur profesional.
- Tombol **Export / Print PDF** siap cetak atau simpan digital.

### E. Modul 5: Dashboard Ringkasan & Analitik
- Kartu Ringkasan Metrik:
  - Total Pendapatan (*Total Paid Revenue*).
  - Total Tagihan Belum Dibayar (*Pending Balance*).
  - Jumlah Invoice Jatuh Tempo (*Overdue Invoices*).
  - Total Klien Terdaftar.
- Grafik visual: Perbandingan status invoice atau riwayat pendapatan bulanan.

---

## 4. Perancangan Skema Database (Database Schema)

```sql
-- Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    business_name VARCHAR(150),
    phone VARCHAR(30),
    address TEXT,
    currency VARCHAR(10) DEFAULT 'IDR',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Clients
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    client_name VARCHAR(150) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(30),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tabel Invoices
CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    client_id INT NOT NULL,
    invoice_number VARCHAR(50) NOT NULL,
    issue_date DATE NOT NULL,
    due_date DATE NOT NULL,
    status ENUM('draft', 'unpaid', 'paid', 'overdue') DEFAULT 'unpaid',
    tax_rate DECIMAL(5,2) DEFAULT 0.00,
    discount DECIMAL(10,2) DEFAULT 0.00,
    total_amount DECIMAL(15,2) DEFAULT 0.00,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
);

-- Tabel Invoice Items
CREATE TABLE invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NOT NULL,
    item_description VARCHAR(255) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    unit_price DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    subtotal DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE
);
```

---

## 5. Matriks Pembagian Tugas Tim 3 Orang (GitHub Contribution Breakdown)

| Peran & Anggota | Tanggung Jawab Utama | File / Ruang Lingkup Pengerjaan (Git Scope) | Target Branch Git |
|---|---|---|---|
| **Anggota 1: Frontend & Landing UI Lead** | - Desain sistem UI (CSS, tema warna, navbar, sidebar, footer responsif).<br>- Halaman Landing Page publik (Hero, Fitur, Pricing, Testimoni).<br>- Antarmuka Form Login, Register, dan Profil Akun.<br>- UI Modul Manajemen Klien (Form tambah & tabel daftar klien). | `views/landing/*`<br>`views/auth/*`<br>`views/clients/*`<br>`public/css/style.css`<br>`public/js/app-ui.js` | `feat/frontend-ui-landing` |
| **Anggota 2: Backend Core & Database Lead** | - Setup struktur database connection & migration/DDL.<br>- Logika Autentikasi (Register, Login, Session/Middleware, Logout).<br>- Backend Controller & Model CRUD untuk data Klien.<br>- Backend Controller & API logic untuk Create, Update, Delete Invoice & Item. | `config/database.*`<br>`models/*`<br>`controllers/AuthController.*`<br>`controllers/ClientController.*`<br>`controllers/InvoiceController.*`<br>`routes/*` | `feat/backend-core-crud` |
| **Anggota 3: Feature Integration, PDF & Analytics Lead** | - Form dinamis Invoice Builder (JavaScript tambah/hapus baris item & hitung subtotal/pajak *real-time*).<br>- Template Pratinjau & Fitur Export/Print PDF Invoice.<br>- Logika Dashboard Analitik (Kalkulasi kartu total & integrasi Chart.js).<br>- QA sistem, penulisan `README.md`, dan koordinasi Pull Request. | `views/invoices/builder.*`<br>`views/invoices/print-template.*`<br>`views/dashboard/analytics.*`<br>`public/js/invoice-calculator.js`<br>`public/js/charts.js`<br>`README.md` | `feat/invoice-pdf-analytics` |

---

## 6. Standar Git Workflow & Kolaborasi

1. **Inisialisasi Repositori:**
   - Salah satu anggota membuat repositori di GitHub (misal: `invoicelite-saas`).
   - Tambahkan 2 anggota lainnya sebagai *Collaborators* di tab **Settings > Collaborators**.
2. **Branching Strategy:**
   - **`main`**: Branch stabil (hanya untuk kode yang sudah siap diuji/demo).
   - **Branch Fitur per Anggota**:
     - `feat/frontend-ui-landing` *(Anggota 1)*
     - `feat/backend-core-crud` *(Anggota 2)*
     - `feat/invoice-pdf-analytics` *(Anggota 3)*
3. **Aturan Commit (Conventional Commits):**
   - Format: `type: deskripsi perubahan singkat`
   - Contoh:
     - `feat: create responsive landing page and auth forms`
     - `feat: implement user registration and password hashing`
     - `feat: add dynamic row calculation for invoice builder`
     - `fix: correct subtotal tax calculation bug`
     - `docs: update setup guide in README.md`
4. **Pull Request (PR):**
   - Setiap fitur yang selesai diajukan melalui Pull Request dan di-review bersama sebelum di-merge ke `main`.
