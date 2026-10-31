<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Invoice Baru — InvoiceLite SaaS</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/invoice.css">
</head>
<body>

    <div class="app-shell">
        <!-- Sidebar Navigation -->
        <aside class="app-sidebar">
            <div class="sidebar-brand">
                <a href="index.php" class="brand-logo">
                    <div class="brand-icon" style="width:34px; height:34px; background:linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%); border-radius:10px; display:flex; align-items:center; justify-content:center; color:#fff;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                        </svg>
                    </div>
                    <span>InvoiceLite</span>
                    <span class="badge badge-primary" style="font-size:0.65rem; padding:0.2rem 0.5rem;">SaaS</span>
                </a>
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-category">Menu Utama</li>
                <li class="sidebar-item">
                    <a href="index.php?page=dashboard">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        Dashboard & Analitik
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="index.php?page=invoices">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        Daftar Invoice
                    </a>
                </li>
                <li class="sidebar-item active">
                    <a href="index.php?page=invoice-create">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                        Buat Invoice Baru
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="index.php?page=clients">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        Manajemen Klien
                    </a>
                </li>

                <li class="sidebar-menu-category">Navigasi Proyek</li>
                <li class="sidebar-item">
                    <a href="index.php">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-mini-card">
                    <div class="user-avatar">FN</div>
                    <div class="user-info">
                        <div class="user-name">Fikri Nabillah</div>
                        <div class="user-role">Feature & Analytics Lead</div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="app-main">
            <!-- Header Bar -->
            <header class="app-header">
                <div class="header-title-block">
                    <h1>Dynamic Invoice Builder</h1>
                    <p>Buat faktur profesional dengan perhitungan otomatis, pajak, diskon, dan cetak PDF.</p>
                </div>

                <div class="header-actions">
                    <a href="index.php?page=dashboard" class="btn btn-outline btn-sm">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                        Ke Dashboard
                    </a>
                </div>
            </header>

            <!-- Builder Content -->
            <div class="app-content">
                <form id="invoice-builder-form">
                    <div class="builder-grid">
                        <!-- Left Panel: Form Details & Items -->
                        <div class="form-panel">
                            <div class="panel-header">
                                <h2 style="font-size:1.15rem; font-weight:700;">Informasi Faktur & Klien</h2>
                                <span class="badge badge-primary">Auto-Calculating</span>
                            </div>

                            <!-- Invoice Meta Row -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="invoice-number">Nomor Invoice</label>
                                    <input type="text" id="invoice-number" class="form-control" placeholder="INV/2026/10/001" required>
                                </div>
                                <div class="form-group">
                                    <label for="invoice-currency">Mata Uang</label>
                                    <select id="invoice-currency" class="form-control">
                                        <option value="IDR" selected>IDR — Rupiah (Rp)</option>
                                        <option value="USD">USD — Dollar ($)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="invoice-status">Status Tagihan</label>
                                    <select id="invoice-status" class="form-control">
                                        <option value="unpaid" selected>Menunggu (Unpaid)</option>
                                        <option value="paid">Lunas (Paid)</option>
                                        <option value="overdue">Jatuh Tempo (Overdue)</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="issue-date">Tanggal Terbit</label>
                                    <input type="date" id="issue-date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="due-date">Tanggal Jatuh Tempo</label>
                                    <input type="date" id="due-date" class="form-control" required>
                                </div>
                            </div>

                            <hr style="border:none; border-top:1px solid var(--border-color); margin:1.5rem 0;">

                            <!-- Client Info -->
                            <h3 style="font-size:1rem; font-weight:700; margin-bottom:1rem; color:var(--text-primary);">
                                Ditujukan Kepada (Klien / Perusahaan)
                            </h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="client-name">Nama Klien / Perusahaan</label>
                                    <input type="text" id="client-name" class="form-control" placeholder="Contoh: PT Solusi Teknologi Nusantara" required>
                                </div>
                                <div class="form-group">
                                    <label for="client-email">Email Klien</label>
                                    <input type="email" id="client-email" class="form-control" placeholder="finance@klien.com">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:1.5rem;">
                                <label for="client-address">Alamat Klien</label>
                                <textarea id="client-address" class="form-control" rows="2" placeholder="Alamat kantor atau lokasi penagihan..."></textarea>
                            </div>

                            <!-- Line Items Section -->
                            <div class="line-items-section">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                                    <h3 style="font-size:1rem; font-weight:700; color:var(--text-primary);">
                                        Rincian Layanan / Produk
                                    </h3>
                                    <button type="button" id="btn-add-line-item" class="btn btn-secondary btn-sm">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        + Tambah Baris Layanan
                                    </button>
                                </div>

                                <table class="line-items-table">
                                    <thead>
                                        <tr>
                                            <th>Deskripsi Item / Jasa</th>
                                            <th>Qty</th>
                                            <th>Harga Satuan</th>
                                            <th style="text-align:right;">Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="line-items-body">
                                        <!-- Generated dynamically by invoice-builder.js -->
                                    </tbody>
                                </table>
                            </div>

                            <hr style="border:none; border-top:1px solid var(--border-color); margin:1.5rem 0;">

                            <!-- Notes & Payment Info -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="payment-info">Rekening & Instruksi Pembayaran</label>
                                    <textarea id="payment-info" class="form-control" rows="3">BCA: 8730-192-881 a/n InvoiceLite Studio
Mandiri: 137-00-1928-3310
QRIS Tersedia</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="invoice-notes">Catatan Tambahan untuk Klien</label>
                                    <textarea id="invoice-notes" class="form-control" rows="3">Terima kasih atas kerja sama Anda. Harap konfirmasi bukti transfer via WhatsApp atau email.</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Right Panel: Sticky Summary & Action -->
                        <div class="summary-panel">
                            <h3 style="font-size:1.1rem; font-weight:700;">Ringkasan Biaya</h3>

                            <div class="summary-row">
                                <span>Subtotal</span>
                                <strong id="summary-subtotal">Rp 0</strong>
                            </div>

                            <!-- Discount Input -->
                            <div class="form-group" style="margin-top:0.5rem;">
                                <label style="font-size:0.8rem;">Diskon</label>
                                <div style="display:flex; gap:0.5rem;">
                                    <select id="discount-type" class="form-control" style="width:40%;">
                                        <option value="percent">Persen (%)</option>
                                        <option value="nominal">Nominal (Rp)</option>
                                    </select>
                                    <input type="number" id="discount-val" class="form-control" placeholder="0" min="0" value="0">
                                </div>
                            </div>
                            <div class="summary-row" style="font-size:0.85rem; color:#f87171;">
                                <span>Potongan Diskon</span>
                                <span id="summary-discount">- Rp 0</span>
                            </div>

                            <!-- Tax Input -->
                            <div class="form-group">
                                <label style="font-size:0.8rem;">Pajak (PPN)</label>
                                <select id="tax-rate" class="form-control">
                                    <option value="0">Bebas Pajak (0%)</option>
                                    <option value="11" selected>PPN 11% (Standar ID)</option>
                                    <option value="12">PPN 12%</option>
                                    <option value="5">Pajak Jasa 5%</option>
                                </select>
                            </div>
                            <div class="summary-row" style="font-size:0.85rem; color:#34d399;">
                                <span>Nominal Pajak</span>
                                <span id="summary-tax">+ Rp 0</span>
                            </div>

                            <!-- Grand Total -->
                            <div class="summary-row total-row">
                                <span>Total Tagihan:</span>
                                <span class="total-amount" id="summary-grand-total">Rp 0</span>
                            </div>

                            <!-- Buttons -->
                            <div style="display:flex; flex-direction:column; gap:0.75rem; margin-top:1.5rem;">
                                <button type="button" id="btn-save-preview" class="btn btn-primary" style="width:100%;">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    Simpan & Pratinjau PDF
                                </button>
                                <button type="button" id="btn-save-draft" class="btn btn-secondary" style="width:100%;">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                        <polyline points="7 3 7 8 15 8"></polyline>
                                    </svg>
                                    Simpan Sebagai Draft
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="public/js/invoice-builder.js"></script>
    <script src="public/js/app-ui.js"></script>
</body>
</html>
