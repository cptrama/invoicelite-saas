<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Faktur & Manajemen Invoice — InvoiceLite SaaS</title>
    
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
                <li class="sidebar-item active">
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
                    <h1>Manajemen & Arsip Faktur</h1>
                    <p>Kelola seluruh invoice yang pernah diterbitkan, filter status, dan ekspor dokumen.</p>
                </div>

                <div class="header-actions">
                    <a href="index.php?page=invoice-create" class="btn btn-primary btn-sm">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Buat Invoice Baru
                    </a>
                </div>
            </header>

            <!-- Table Content -->
            <div class="app-content">
                <div class="table-card">
                    <div class="table-card-header">
                        <!-- Search Box -->
                        <div style="flex:1; max-width:350px;">
                            <input type="text" id="invoice-search-input" class="form-control" placeholder="Cari nomor invoice / nama klien...">
                        </div>

                        <!-- Filter Pills -->
                        <div class="table-filter-pills">
                            <button type="button" class="filter-pill active" data-filter="all">Semua</button>
                            <button type="button" class="filter-pill" data-filter="paid">Lunas</button>
                            <button type="button" class="filter-pill" data-filter="unpaid">Menunggu</button>
                            <button type="button" class="filter-pill" data-filter="overdue">Jatuh Tempo</button>
                            <button type="button" class="filter-pill" data-filter="draft">Draft</button>
                        </div>
                    </div>

                    <div class="data-table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No. Invoice</th>
                                    <th>Klien / Perusahaan</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Total Tagihan</th>
                                    <th>Status</th>
                                    <th style="text-align:right;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="invoices-list-body">
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="public/js/invoice-builder.js"></script>
    <script src="public/js/app-ui.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentFilter = 'all';
            let searchQuery = '';

            const tableBody = document.getElementById('invoices-list-body');
            const searchInput = document.getElementById('invoice-search-input');

            function renderInvoices() {
                const invoices = InvoiceEngine.getInvoices();
                let filtered = invoices;

                if (currentFilter !== 'all') {
                    filtered = filtered.filter(i => i.status === currentFilter);
                }

                if (searchQuery.trim() !== '') {
                    const q = searchQuery.toLowerCase();
                    filtered = filtered.filter(i => 
                        i.invoice_number.toLowerCase().includes(q) ||
                        i.client_name.toLowerCase().includes(q)
                    );
                }

                tableBody.innerHTML = '';

                if (filtered.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="7" style="text-align:center; padding:3rem; color:var(--text-muted);">
                                Tidak ada invoice yang cocok dengan kriteria pencarian / filter.
                            </td>
                        </tr>
                    `;
                    return;
                }

                filtered.forEach(inv => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td><strong>${inv.invoice_number}</strong></td>
                        <td>${inv.client_name}</td>
                        <td style="color:var(--text-muted);">${inv.issue_date}</td>
                        <td>${inv.due_date}</td>
                        <td><strong>${InvoiceEngine.formatCurrency(inv.total_amount, inv.currency)}</strong></td>
                        <td><span class="status-badge status-${inv.status}">${inv.status}</span></td>
                        <td style="text-align:right;">
                            <div style="display:inline-flex; gap:0.4rem;">
                                <a href="index.php?page=invoice-preview&inv=${encodeURIComponent(inv.invoice_number)}" class="btn btn-outline btn-sm" title="Pratinjau / Cetak PDF">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                </a>
                                ${inv.status !== 'paid' ? `
                                <button type="button" class="btn btn-emerald btn-sm btn-mark-paid" data-inv="${inv.invoice_number}" title="Tandai Lunas">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </button>
                                ` : ''}
                                <button type="button" class="btn btn-outline btn-sm btn-delete-inv" data-inv="${inv.invoice_number}" style="color:var(--danger); border-color:rgba(239,68,68,0.3);" title="Hapus Invoice">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });

                // Bind Action Handlers
                tableBody.querySelectorAll('.btn-mark-paid').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const inv = this.getAttribute('data-inv');
                        InvoiceEngine.toggleInvoiceStatus(inv, 'paid');
                        renderInvoices();
                    });
                });

                tableBody.querySelectorAll('.btn-delete-inv').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const inv = this.getAttribute('data-inv');
                        if (confirm(`Apakah Anda yakin ingin menghapus invoice ${inv}?`)) {
                            InvoiceEngine.deleteInvoice(inv);
                            renderInvoices();
                        }
                    });
                });
            }

            // Bind Filter Buttons
            document.querySelectorAll('.filter-pill').forEach(pill => {
                pill.addEventListener('click', function () {
                    document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
                    this.classList.add('active');
                    currentFilter = this.getAttribute('data-filter') || 'all';
                    renderInvoices();
                });
            });

            // Bind Search Input
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    searchQuery = this.value;
                    renderInvoices();
                });
            }

            renderInvoices();
        });
    </script>
</body>
</html>
