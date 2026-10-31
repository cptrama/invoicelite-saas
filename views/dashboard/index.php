<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Analitik & Invoice — InvoiceLite SaaS</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/invoice.css">
    
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
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
                <li class="sidebar-item active">
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
                <li class="sidebar-item">
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
                    <h1>Dashboard & Analitik Bisnis</h1>
                    <p>Pantau metrik pendapatan, status tagihan, dan kinerja faktur secara real-time.</p>
                </div>

                <div class="header-actions">
                    <button class="theme-toggle-btn" aria-label="Ubah Tema">
                        <span class="theme-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                    <a href="index.php?page=invoice-create" class="btn btn-primary btn-sm">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Buat Invoice Baru
                    </a>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="app-content">
                <!-- 1. KPI Stats Cards Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <span class="stat-label">Total Pendapatan (Lunas)</span>
                            <div class="stat-icon emerald">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-value" id="kpi-paid-revenue">Rp 0</div>
                        <div class="stat-trend trend-up">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            <span>+18.4% bulan ini</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <span class="stat-label">Tagihan Tertunda (Unpaid)</span>
                            <div class="stat-icon warning">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-value" id="kpi-pending-balance">Rp 0</div>
                        <div class="stat-trend trend-neutral">
                            <span>Menunggu proses pembayaran klien</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <span class="stat-label">Invoice Jatuh Tempo</span>
                            <div class="stat-icon danger">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-value" id="kpi-overdue-count">0 Invoice</div>
                        <div class="stat-trend trend-down">
                            <span>Perlu tindakan follow-up segera</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <span class="stat-label">Total Faktur Diterbitkan</span>
                            <div class="stat-icon primary">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-value" id="kpi-total-invoices">0 Faktur</div>
                        <div class="stat-trend trend-up">
                            <span>Basis transaksi aktif</span>
                        </div>
                    </div>
                </div>

                <!-- 2. Charts Section -->
                <div class="analytics-grid">
                    <!-- Revenue Trend Area Chart -->
                    <div class="chart-card">
                        <div class="chart-card-header">
                            <div>
                                <h3 class="chart-title">Pertumbuhan Pendapatan Bulanan</h3>
                                <p class="chart-subtitle">Grafik tren arus kas masuk 6 bulan terakhir</p>
                            </div>
                            <span class="badge badge-emerald">Real-time Analytics</span>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="chart-revenue-trend"></canvas>
                        </div>
                    </div>

                    <!-- Status Distribution Doughnut Chart -->
                    <div class="chart-card">
                        <div class="chart-card-header">
                            <div>
                                <h3 class="chart-title">Status Faktur</h3>
                                <p class="chart-subtitle">Distribusi status seluruh tagihan</p>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="chart-status-distribution"></canvas>
                        </div>
                    </div>
                </div>

                <!-- 3. Recent Invoices Table -->
                <div class="table-card">
                    <div class="table-card-header">
                        <div>
                            <h3 class="chart-title">Daftar Faktur Terbaru</h3>
                            <p class="chart-subtitle">Kelola dan pantau status tagihan pembayaran klien Anda</p>
                        </div>

                        <div class="table-filter-pills">
                            <button type="button" class="filter-pill active" data-filter="all">Semua</button>
                            <button type="button" class="filter-pill" data-filter="paid">Lunas</button>
                            <button type="button" class="filter-pill" data-filter="unpaid">Menunggu</button>
                            <button type="button" class="filter-pill" data-filter="overdue">Jatuh Tempo</button>
                        </div>
                    </div>

                    <div class="data-table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No. Invoice</th>
                                    <th>Klien</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Total Tagihan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="recent-invoices-body">
                                <!-- Populated dynamically by analytics-charts.js -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="public/js/invoice-builder.js"></script>
    <script src="public/js/analytics-charts.js"></script>
    <script src="public/js/app-ui.js"></script>
</body>
</html>
