<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InvoiceLite — Micro-SaaS Invoice & Billing Generator Instant</title>
    <meta name="description" content="Platform Micro-SaaS terdepan untuk freelancer dan UMKM. Buat invoice profesional, hitung otomatis, cetak PDF, dan kelola tagihan pembayaran dengan mudah.">
    <meta name="keywords" content="invoice generator, saas invoice, pembuat tagihan, freelancer invoice, cetak pdf invoice, umkm billing">
    
    <!-- Favicon & Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- App CSS -->
    <link rel="stylesheet" href="../../public/css/style.css">
    <script>
        // Fallback CSS path resolve if accessed from root index.php
        if (window.location.pathname.endsWith('index.php') && !window.location.pathname.includes('/views/')) {
            document.write('<link rel="stylesheet" href="public/css/style.css">');
        }
    </script>
</head>
<body>

    <!-- Background Glowing Ambient Mesh -->
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>
    <div class="bg-blob bg-blob-3"></div>

    <!-- Navigation Header -->
    <header class="navbar">
        <div class="container navbar-container">
            <a href="#" class="brand-logo">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                    </svg>
                </div>
                <span>InvoiceLite</span>
                <span class="brand-badge">SaaS</span>
            </a>

            <nav>
                <ul class="nav-links">
                    <li><a href="#features" class="nav-link">Fitur Utama</a></li>
                    <li><a href="#how-it-works" class="nav-link">Cara Kerja</a></li>
                    <li><a href="#demo" class="nav-link">Live Calculator</a></li>
                    <li><a href="#pricing" class="nav-link">Harga</a></li>
                    <li><a href="#faq" class="nav-link">FAQ</a></li>
                </ul>
            </nav>

            <div class="nav-actions">
                <button class="theme-toggle-btn" aria-label="Ubah Tema Warna">
                    <span class="theme-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </span>
                </button>
                <a href="views/auth/login.php" class="btn btn-outline btn-sm">Masuk</a>
                <a href="views/auth/register.php" class="btn btn-primary btn-sm">Coba Gratis</a>
                <button class="mobile-toggle" aria-label="Menu Mobile">
                    ☰
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-grid">
            <div class="hero-content">
                <div class="hero-badge-wrap">
                    <span class="badge badge-primary">
                        ✨ Micro-SaaS Invoice & Billing Generator #1
                    </span>
                </div>
                
                <h1 class="hero-title">
                    Buat Invoice Profesional <br>
                    & Tagih Klien <span class="text-gradient">Lebih Cepat.</span>
                </h1>

                <p class="hero-description">
                    InvoiceLite mempermudah Freelancer, Kreatif, dan Pelaku UMKM mengelola penagihan. Generate invoice instan, kalkulasi pajak & diskon otomatis, dan ekspor PDF siap cetak dalam hitungan detik.
                </p>

                <div class="hero-actions">
                    <a href="views/auth/register.php" class="btn btn-emerald btn-lg">
                        Mulai Gratis Sekarang
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="#demo" class="btn btn-secondary btn-lg">
                        Coba Live Demo
                    </a>
                </div>

                <div class="hero-trust">
                    <div class="trust-avatars">
                        <div class="trust-avatar" style="background-image: url('https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80')"></div>
                        <div class="trust-avatar" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80')"></div>
                        <div class="trust-avatar" style="background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80')"></div>
                    </div>
                    <div class="trust-text">
                        <div class="trust-rating">★ ★ ★ ★ ★ 4.9/5</div>
                        <span>Dipercaya oleh <strong>10,000+</strong> Freelancer & UMKM</span>
                    </div>
                </div>
            </div>

            <!-- Hero Live Preview Graphic -->
            <div class="hero-preview-wrap">
                <div class="hero-preview-card">
                    <div class="preview-header">
                        <div class="preview-invoice-num">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                            </svg>
                            <span>INV-2026-089</span>
                        </div>
                        <span class="badge badge-emerald">PAID</span>
                    </div>

                    <div class="preview-meta">
                        <div class="meta-item">
                            <label>Diterbitkan Untuk</label>
                            <span>PT Nusantara Digital</span>
                        </div>
                        <div class="meta-item">
                            <label>Jatuh Tempo</label>
                            <span>15 Oktober 2026</span>
                        </div>
                    </div>

                    <table class="preview-table">
                        <thead>
                            <tr>
                                <th>Deskripsi Layanan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th style="text-align: right;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>UI/UX Mobile App Design</td>
                                <td>1</td>
                                <td>Rp 4.500.000</td>
                                <td style="text-align: right; font-weight:600;">Rp 4.500.000</td>
                            </tr>
                            <tr>
                                <td>Frontend React Development</td>
                                <td>1</td>
                                <td>Rp 6.000.000</td>
                                <td style="text-align: right; font-weight:600;">Rp 6.000.000</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="preview-totals">
                        <div class="total-row">
                            <span style="color: var(--text-secondary);">Subtotal:</span>
                            <span style="font-weight: 600;">Rp 10.500.000</span>
                        </div>
                        <div class="total-row">
                            <span style="color: var(--text-secondary);">Pajak (PPN 11%):</span>
                            <span style="font-weight: 600;">Rp 1.155.000</span>
                        </div>
                        <div class="total-row grand-total">
                            <span>Total Akhir:</span>
                            <span>Rp 11.655.000</span>
                        </div>
                    </div>

                    <div class="floating-stamp">
                        ✓ Lunas Terverifikasi
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number text-gradient">10.000+</div>
                    <div class="stat-label">Invoice Diterbitkan</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number text-gradient-emerald">Rp 15M+</div>
                    <div class="stat-label">Total Transaksi Terkelola</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number text-gradient">99.9%</div>
                    <div class="stat-label">Sistem Uptime & Keamanan</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number text-gradient-emerald">4.9 / 5</div>
                    <div class="stat-label">Rating Kepuasan Pengguna</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <span class="badge badge-primary section-subtitle">Fitur Unggulan</span>
                <h2 class="section-title">Semua yang Anda Butuhkan untuk Penagihan Bisnis</h2>
                <p class="section-description">Dirancang khusus agar alur pembayaran bisnis Anda lebih profesional, efisien, dan transparan.</p>
            </div>

            <div class="features-grid">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon-box">⚡</div>
                    <h3 class="feature-title">Pembuat Invoice Kilat</h3>
                    <p class="feature-desc">Tambah baris item secara dinamis dengan kalkulasi otomatis subtotal, diskon, dan pajak real-time tanpa rumus rumit.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon-box">👥</div>
                    <h3 class="feature-title">Manajemen Data Klien</h3>
                    <p class="feature-desc">Simpan kontak klien, alamat usaha, email, dan nomor telepon. Pilih klien favorit saat membuat invoice dalam 1 klik.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon-box">📄</div>
                    <h3 class="feature-title">Export PDF Siap Cetak</h3>
                    <p class="feature-desc">Generate faktur PDF dengan layout standar internasional yang bersih, siap diunduh, dicetak, atau dikirim ke email klien.</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card">
                    <div class="feature-icon-box">📌</div>
                    <h3 class="feature-title">Tracking Status Tagihan</h3>
                    <p class="feature-desc">Kategorisasi status invoice secara otomatis: Draft, Unpaid, Paid, dan Overdue agar tidak ada tagihan yang terlewat.</p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card">
                    <div class="feature-icon-box">📊</div>
                    <h3 class="feature-title">Dashboard Analitik Ringkas</h3>
                    <p class="feature-desc">Pantau total pendapatan bersih, saldo menunggak, dan grafik performa keuangan bulanan Anda dengan mudah.</p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card">
                    <div class="feature-icon-box">💱</div>
                    <h3 class="feature-title">Multi Mata Uang & Pajak</h3>
                    <p class="feature-desc">Dukung transaksi Rupiah (IDR) & US Dollar (USD) lengkap dengan konfigurasi persentase pajak PPN/PPh yang fleksibel.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="how-section">
        <div class="container">
            <div class="section-header">
                <span class="badge badge-emerald section-subtitle">Alur Mudah</span>
                <h2 class="section-title">3 Langkah Praktis Menerbitkan Invoice</h2>
                <p class="section-description">Hanya butuh waktu kurang dari 1 menit dari pendaftaran hingga invoice pertama Anda siap dikirim.</p>
            </div>

            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Pilih Data Klien</h3>
                    <p class="step-desc">Masukkan informasi usaha Anda dan pilih data klien dari basis data yang telah Anda simpan sebelumnya.</p>
                </div>

                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Input Line Items & Pajak</h3>
                    <p class="step-desc">Isi deskripsi pekerjaan, jumlah (qty), dan harga. Sistem kami langsung menghitung subtotal dan pajak secara presisi.</p>
                </div>

                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Unduh PDF & Tagih</h3>
                    <p class="step-desc">Pratinjau hasil faktur dan unduh file PDF resolusi tinggi untuk dikirimkan kepada klien Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Live Demo Calculator Section -->
    <section id="demo" class="demo-section">
        <div class="container">
            <div class="section-header">
                <span class="badge badge-primary section-subtitle">Simulasi Interaktif</span>
                <h2 class="section-title">Uji Coba Calculator Invoice Lite</h2>
                <p class="section-description">Coba ubah angka di bawah ini dan lihat bagaimana sistem menghitung rincian tagihan secara instan!</p>
            </div>

            <div class="demo-card">
                <div class="demo-grid">
                    <!-- Demo Inputs -->
                    <div class="demo-inputs">
                        <h3 style="margin-bottom: 1.5rem; font-size: 1.2rem;">📝 Input Tagihan Simulasi</h3>
                        
                        <div class="demo-input-group">
                            <label for="demo-item-qty">Jumlah Item (Qty)</label>
                            <input type="number" id="demo-item-qty" class="demo-input" value="2" min="1">
                        </div>

                        <div class="demo-input-group">
                            <label for="demo-item-price">Harga Satuan Item (IDR)</label>
                            <input type="number" id="demo-item-price" class="demo-input" value="1500000" step="50000">
                        </div>

                        <div class="demo-input-group">
                            <label for="demo-tax-rate">Persentase Pajak PPN (%)</label>
                            <input type="number" id="demo-tax-rate" class="demo-input" value="11" min="0" max="100">
                        </div>

                        <div class="demo-input-group">
                            <label for="demo-discount">Potongan Diskon (IDR)</label>
                            <input type="number" id="demo-discount" class="demo-input" value="200000" min="0">
                        </div>
                    </div>

                    <!-- Demo Result Preview -->
                    <div class="demo-results" style="background: rgba(15, 23, 42, 0.7); padding: 1.8rem; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                        <h3 style="margin-bottom: 1.5rem; font-size: 1.2rem; color: var(--primary);">🧮 Hasil Kalkulasi Real-time</h3>
                        
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between; padding-bottom: 0.5rem; border-bottom: 1px solid var(--border-color);">
                                <span style="color: var(--text-secondary);">Subtotal (Qty x Harga):</span>
                                <span id="demo-calc-subtotal" style="font-weight: 700;">Rp 3.000.000</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding-bottom: 0.5rem; border-bottom: 1px solid var(--border-color);">
                                <span style="color: var(--text-secondary);">Pajak Tambahan:</span>
                                <span id="demo-calc-tax" style="font-weight: 700; color: var(--warning);">Rp 330.000</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding-bottom: 0.5rem; border-bottom: 1px solid var(--border-color);">
                                <span style="color: var(--text-secondary);">Potongan Diskon:</span>
                                <span id="demo-calc-discount" style="font-weight: 700; color: var(--accent);">- Rp 200.000</span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding-top: 1rem; margin-top: 0.5rem; border-top: 2px solid var(--primary);">
                                <span style="font-size: 1.2rem; font-weight: 800;">Total Akhir Tagihan:</span>
                                <span id="demo-calc-total" style="font-size: 1.4rem; font-weight: 800; color: var(--primary);">Rp 3.130.000</span>
                            </div>
                        </div>

                        <div style="margin-top: 2rem; text-align: center;">
                            <a href="views/auth/register.php" class="btn btn-primary btn-sm" style="width: 100%;">
                                Gunakan Fitur Lengkap Ini Sekarang →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing-section">
        <div class="container">
            <div class="section-header">
                <span class="badge badge-emerald section-subtitle">Pilihan Paket</span>
                <h2 class="section-title">Harga Transparan Tanpa Biaya Tersembunyi</h2>
                <p class="section-description">Pilih paket sesuai skala kebutuhan usaha atau proyek freelance Anda.</p>
            </div>

            <div class="pricing-toggle-wrap">
                <span class="toggle-label active">Bayar Bulanan</span>
                <label class="switch">
                    <input type="checkbox" id="pricing-switch">
                    <span class="slider"></span>
                </label>
                <span class="toggle-label">Bayar Tahunan <span class="badge badge-emerald" style="font-size: 0.7rem;">Hemat 20%</span></span>
            </div>

            <div class="pricing-grid">
                <!-- Plan 1: Starter -->
                <div class="pricing-card">
                    <h3 class="pricing-plan-name">Starter Freelancer</h3>
                    <p class="pricing-plan-desc">Cocok untuk mahasiswa pekerja lepas & pemula yang baru memulai jasa.</p>
                    
                    <div class="pricing-price">
                        <span class="price-monthly">Rp 0</span>
                        <span class="price-annual" style="display:none;">Rp 0</span>
                        <span class="pricing-period">/ selamanya</span>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Hingga 10 Invoice per bulan
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Maksimal 5 Data Klien
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Export PDF Standar
                        </li>
                        <li class="disabled">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            Custom Logo Usaha
                        </li>
                        <li class="disabled">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            Dashboard Analitik Keuangan
                        </li>
                    </ul>

                    <a href="views/auth/register.php" class="btn btn-outline" style="width: 100%;">Daftar Gratis</a>
                </div>

                <!-- Plan 2: Pro (Popular) -->
                <div class="pricing-card popular">
                    <div class="popular-badge">Paling Populer</div>
                    <h3 class="pricing-plan-name">Pro Freelancer</h3>
                    <p class="pricing-plan-desc">Solusi lengkap untuk profesional aktif dengan volume transaksi rutin.</p>
                    
                    <div class="pricing-price">
                        <span class="price-monthly">Rp 49.000</span>
                        <span class="price-annual" style="display:none;">Rp 39.000</span>
                        <span class="pricing-period">/ bulan</span>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <strong>Unlimited</strong> Invoice Generator
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <strong>Unlimited</strong> Data Klien
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Export PDF High Quality
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Custom Logo & Profil Usaha
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Dashboard Analitik & Chart Pendapatan
                        </li>
                    </ul>

                    <a href="views/auth/register.php" class="btn btn-primary" style="width: 100%;">Mulai Trial Pro</a>
                </div>

                <!-- Plan 3: Business -->
                <div class="pricing-card">
                    <h3 class="pricing-plan-name">Business Team</h3>
                    <p class="pricing-plan-desc">Untuk agensi kreatif, startup kecil, dan studio independen.</p>
                    
                    <div class="pricing-price">
                        <span class="price-monthly">Rp 99.000</span>
                        <span class="price-annual" style="display:none;">Rp 79.000</span>
                        <span class="pricing-period">/ bulan</span>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Semua Fitur Paket Pro
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Multi Currency (IDR & USD)
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Prioritas Dukungan Pelanggan 24/7
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Laporan Ekspor Excel / CSV
                        </li>
                    </ul>

                    <a href="views/auth/register.php" class="btn btn-outline" style="width: 100%;">Pilih Business</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <span class="badge badge-primary section-subtitle">Kata Mereka</span>
                <h2 class="section-title">Dipercaya Pengguna Profesional</h2>
                <p class="section-description">Pengalaman nyata dari mereka yang telah beralih ke InvoiceLite.</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-stars">★ ★ ★ ★ ★</div>
                    <p class="testimonial-quote">"Sejak pakai InvoiceLite, klien saya jauh lebih tepat waktu membayar tagihan. Tampilannya sangat rapi dan pembuatan PDF-nya instan banget!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">BN</div>
                        <div>
                            <div class="author-name">Budi Nugraha</div>
                            <div class="author-role">Senior UI/UX Designer</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-stars">★ ★ ★ ★ ★</div>
                    <p class="testimonial-quote">"Sangat membantu bisnis coffee shop dan katering saya dalam merekap data tagihan bulanan. Fitur tracking statusnya sangat krusial."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SA</div>
                        <div>
                            <div class="author-name">Siti Anggraini</div>
                            <div class="author-role">Owner Artisanal Cafe</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-stars">★ ★ ★ ★ ★</div>
                    <p class="testimonial-quote">"Dulu buat invoice di Word/Excel sering berantakan pas di-convert ke PDF. Dengan InvoiceLite, semua terhitung otomatis & presisi."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">RF</div>
                        <div>
                            <div class="author-name">Rizky Febrian</div>
                            <div class="author-role">Fullstack Web Developer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section id="faq" class="faq-section">
        <div class="container">
            <div class="section-header">
                <span class="badge badge-emerald section-subtitle">Pertanyaan Umum</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-description">Jawaban atas pertanyaan yang sering diajukan calon pengguna InvoiceLite.</p>
            </div>

            <div class="faq-accordion">
                <div class="faq-item active">
                    <button class="faq-question">
                        <span>Apakah saya bisa menggunakan InvoiceLite secara gratis?</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, tentu saja! Kami menyediakan paket Starter yang 100% gratis selamanya tanpa perlu memasukkan kartu kredit. Anda dapat membuat hingga 10 invoice setiap bulannya.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah Invoice dapat diunduh dalam bentuk file PDF?</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-answer">
                        <p>Tentu. Setiap invoice yang dibuat dapat langsung dipratinjau dan diekspor ke format PDF siap cetak dengan sekali klik tombol Export PDF.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Bagaimana perhitungan Pajak (PPN) dan Diskon bekerja?</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-answer">
                        <p>Sistem kami dilengkapi mesin kalkulator otomatis JavaScript. Saat Anda mengisikan persentase pajak atau potongan diskon, nilai subtotal dan grand total akan ter-update secara real-time.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah data klien dan transaksi saya aman?</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-answer">
                        <p>Keamanan data adalah prioritas utama kami. Password akun dienkripsi menggunakan standar hashing industri (Bcrypt/Argon2) dan seluruh transaksi diisolasi per pengguna.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box">
                <h2 class="cta-title">Siap Tingkatkan Profesionalisme Penagihan Anda?</h2>
                <p class="cta-subtitle">Daftar sekarang dan nikmati kemudahan membuat invoice instan tanpa ribet.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="views/auth/register.php" class="btn btn-emerald btn-lg">Daftar Akun Gratis</a>
                    <a href="views/auth/login.php" class="btn btn-secondary btn-lg">Masuk ke Dashboard</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#" class="brand-logo">
                        <div class="brand-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                            </svg>
                        </div>
                        <span>InvoiceLite</span>
                    </a>
                    <p>Platform Micro-SaaS Invoice & Billing Generator instan untuk Freelancer, Pekerja Kreatif, dan Pelaku UMKM Indonesia.</p>
                </div>

                <div>
                    <h4 class="footer-col-title">Produk</h4>
                    <ul class="footer-links">
                        <li><a href="#features">Fitur Utama</a></li>
                        <li><a href="#demo">Live Demo</a></li>
                        <li><a href="#pricing">Harga & Paket</a></li>
                        <li><a href="#how-it-works">Cara Kerja</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-col-title">Akun & Auth</h4>
                    <ul class="footer-links">
                        <li><a href="views/auth/login.php">Masuk Akun</a></li>
                        <li><a href="views/auth/register.php">Daftar Baru</a></li>
                        <li><a href="#">Lupa Password</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-col-title">Pengembang</h4>
                    <ul class="footer-links">
                        <li><a href="#">Team UTS Web</a></li>
                        <li><a href="#">Dokumentasi PRD</a></li>
                        <li><a href="#">GitHub Repository</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 InvoiceLite SaaS. Dikembangkan oleh Tim UTS Pemrograman Web (Anggota 1: Suraya Akbar - Frontend Lead).</p>
                <div>
                    <span style="color: var(--text-muted);">Built with HTML5, CSS3 Glassmorphic Design & JavaScript</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- App JavaScript -->
    <script src="../../public/js/app-ui.js"></script>
    <script>
        // Fallback JS path resolve if accessed from root index.php
        if (window.location.pathname.endsWith('index.php') && !window.location.pathname.includes('/views/')) {
            const s = document.createElement('script');
            s.src = 'public/js/app-ui.js';
            document.body.appendChild(s);
        }
    </script>
</body>
</html>
