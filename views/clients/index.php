<?php
/**
 * InvoiceLite — Client Management (CRUD)
 * Author: Muhammad Rama Alfiannur (Backend & Database Lead)
 * Role: Anggota 2 - Backend & Database Lead
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/database.php';
$pdo = getDBConnection();

$msg = '';
$error = '';

// Handle Actions (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $client_name = trim($_POST['client_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');

        if (!empty($client_name)) {
            if ($pdo) {
                $stmt = $pdo->prepare("INSERT INTO clients (user_id, client_name, email, phone, address) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$_SESSION['user_id'] ?? 1, $client_name, $email, $phone, $address]);
                $msg = "Klien baru '{$client_name}' berhasil ditambahkan!";
            }
        } else {
            $error = "Nama klien wajib diisi!";
        }
    } elseif ($action === 'delete') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0 && $pdo) {
            $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
            $stmt->execute([$id]);
            $msg = "Data klien berhasil dihapus!";
        }
    }
}

// Fetch all clients
$clients = [];
if ($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM clients ORDER BY id DESC");
        $clients = $stmt->fetchAll();
    } catch (Exception $e) {
        $clients = [];
    }
}

// Fallback sample clients if database empty
if (empty($clients)) {
    $clients = [
        ['id' => 1, 'client_name' => 'PT Digital Solusindo', 'email' => 'finance@digitalsolusindo.co.id', 'phone' => '+62 811-2233-4455', 'address' => 'Jl. Sudirman Kav 25, Jakarta Selatan'],
        ['id' => 2, 'client_name' => 'Creative Media Nusantara', 'email' => 'billing@creativemedia.id', 'phone' => '+62 818-9988-7766', 'address' => 'Gedung Cyber 2 Lantai 8, Jakarta'],
        ['id' => 3, 'client_name' => 'Kopi Kenangan Senja (UMKM)', 'email' => 'owner@kenangansenja.com', 'phone' => '+62 813-4455-6677', 'address' => 'Jl. Riau No. 45, Bandung'],
        ['id' => 4, 'client_name' => 'Studio Foto Lumina', 'email' => 'lumina.studio@gmail.com', 'phone' => '+62 878-1122-3344', 'address' => 'Jl. Kaliurang KM 5, Yogyakarta']
    ];
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Klien — InvoiceLite SaaS</title>
    
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
                <li class="sidebar-item active">
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
                <li class="sidebar-item">
                    <a href="index.php?page=logout" style="color:var(--danger);">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        Keluar (Logout)
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-mini-card">
                    <div class="user-avatar" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">MR</div>
                    <div class="user-info">
                        <div class="user-name">Muhammad Rama A.</div>
                        <div class="user-role">Backend & Database Lead</div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="app-main">
            <!-- Header Bar -->
            <header class="app-header">
                <div class="header-title-block">
                    <h1>Basis Data & Manajemen Klien</h1>
                    <p>Kelola kontak pelanggan, alamat penagihan, dan riwayat tagihan klien UMKM.</p>
                </div>

                <div class="header-actions">
                    <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('add-client-panel').scrollIntoView({behavior:'smooth'});">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        + Tambah Klien Baru
                    </button>
                </div>
            </header>

            <div class="app-content">
                <?php if (!empty($msg)): ?>
                    <div style="background:rgba(16,185,129,0.15); border:1px solid rgba(16,185,129,0.3); color:#34d399; padding:0.85rem 1.25rem; border-radius:var(--radius-md); margin-bottom:1.5rem; font-size:0.9rem;">
                        ✓ <?= htmlspecialchars($msg) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($error)): ?>
                    <div style="background:rgba(239,68,68,0.15); border:1px solid rgba(239,68,68,0.3); color:#f87171; padding:0.85rem 1.25rem; border-radius:var(--radius-md); margin-bottom:1.5rem; font-size:0.9rem;">
                        ⚠️ <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <!-- Clients Table Card -->
                <div class="table-card" style="margin-bottom: 2rem;">
                    <div class="table-card-header">
                        <h3 class="chart-title">Daftar Klien Terdaftar (<?= count($clients) ?> Klien)</h3>
                        <div style="max-width: 300px; width:100%;">
                            <input type="text" id="client-search" class="form-control" placeholder="Cari nama klien / email...">
                        </div>
                    </div>

                    <div class="data-table-wrapper">
                        <table class="data-table" id="clients-table">
                            <thead>
                                <tr>
                                    <th>Nama Klien / Perusahaan</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat Penagihan</th>
                                    <th style="text-align:right;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clients as $client): ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($client['client_name']) ?></strong>
                                        </td>
                                        <td style="color:var(--text-secondary);"><?= htmlspecialchars($client['email'] ?: '-') ?></td>
                                        <td><?= htmlspecialchars($client['phone'] ?: '-') ?></td>
                                        <td style="font-size:0.85rem; color:var(--text-muted); max-width:250px;"><?= htmlspecialchars($client['address'] ?: '-') ?></td>
                                        <td style="text-align:right;">
                                            <div style="display:inline-flex; gap:0.5rem;">
                                                <a href="index.php?page=invoice-create" class="btn btn-outline btn-sm" title="Buat Tagihan">
                                                    Buat Invoice
                                                </a>
                                                <form action="index.php?page=clients" method="POST" onsubmit="return confirm('Hapus klien ini?');" style="display:inline;">
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="hidden" name="id" value="<?= $client['id'] ?>">
                                                    <button type="submit" class="btn btn-outline btn-sm" style="color:var(--danger); border-color:rgba(239,68,68,0.3);" title="Hapus Klien">
                                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Form Tambah Klien Baru -->
                <div class="form-panel" id="add-client-panel">
                    <div class="panel-header">
                        <h2 style="font-size:1.15rem; font-weight:700;">Tambah Data Klien Baru</h2>
                        <span class="badge badge-emerald">CRUD Database</span>
                    </div>

                    <form action="index.php?page=clients" method="POST">
                        <input type="hidden" name="action" value="create">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="c-name">Nama Klien / Perusahaan *</label>
                                <input type="text" id="c-name" name="client_name" class="form-control" placeholder="PT Maju Bersama / Nama Individu" required>
                            </div>
                            <div class="form-group">
                                <label for="c-email">Alamat Email Klien</label>
                                <input type="email" id="c-email" name="email" class="form-control" placeholder="finance@klien.com">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="c-phone">Nomor Telepon / WhatsApp</label>
                                <input type="text" id="c-phone" name="phone" class="form-control" placeholder="+62 812-xxxx-xxxx">
                            </div>
                            <div class="form-group">
                                <label for="c-address">Alamat Lengkap</label>
                                <input type="text" id="c-address" name="address" class="form-control" placeholder="Nama Jalan, Kota, Kode Pos">
                            </div>
                        </div>

                        <div style="display:flex; justify-content:flex-end; margin-top:1rem;">
                            <button type="submit" class="btn btn-primary">
                                Simpan Klien ke Database
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Instant Live Search Filter for Clients
        document.getElementById('client-search').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#clients-table tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    </script>
</body>
</html>

