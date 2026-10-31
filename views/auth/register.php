<?php
/**
 * InvoiceLite — Register Authentication View & Logic
 * Author: Muhammad Rama Alfiannur (Backend & Database Lead)
 * Role: Anggota 2 - Backend & Database Lead
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $business_name = trim($_POST['business_name'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        $error = 'Nama lengkap, email, dan kata sandi wajib diisi!';
    } elseif ($password !== $password_confirm) {
        $error = 'Konfirmasi kata sandi tidak cocok!';
    } elseif (strlen($password) < 6) {
        $error = 'Kata sandi minimal harus 6 karakter!';
    } else {
        $pdo = getDBConnection();
        if ($pdo) {
            // Check if email already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $error = 'Alamat email ini sudah terdaftar!';
            } else {
                // Insert new user with secure bcrypt hash
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $insert = $pdo->prepare("INSERT INTO users (name, email, password, business_name) VALUES (?, ?, ?, ?)");
                $success = $insert->execute([$name, $email, $hash, $business_name]);

                if ($success) {
                    header('Location: index.php?page=login&registered=1');
                    exit;
                } else {
                    $error = 'Gagal menyimpan data pengguna ke database.';
                }
            }
        } else {
            $error = 'Gagal terhubung ke database.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru — InvoiceLite SaaS</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/invoice.css">
    
    <style>
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1.5rem;
            position: relative;
            z-index: 10;
        }

        .auth-card {
            width: 100%;
            max-width: 480px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(16px);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        .auth-subtitle {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 0.35rem;
        }
    </style>
</head>
<body>

    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-3"></div>

    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <a href="index.php" class="brand-logo" style="display:inline-flex; margin-bottom:1rem;">
                    <div class="brand-icon" style="width:38px; height:38px; background:linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%); border-radius:10px; display:flex; align-items:center; justify-content:center; color:#fff;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                        </svg>
                    </div>
                    <span style="font-weight:800; font-size:1.35rem; margin-left:0.5rem; color:var(--text-primary);">InvoiceLite</span>
                </a>
                <h1 class="auth-title">Mulai Gratis Sekarang</h1>
                <p class="auth-subtitle">Kelola penagihan profesional untuk UMKM & Freelancer</p>
            </div>

            <?php if (!empty($error)): ?>
                <div style="background:rgba(239,68,68,0.15); border:1px solid rgba(239,68,68,0.3); color:#f87171; padding:0.75rem 1rem; border-radius:var(--radius-md); margin-bottom:1.5rem; font-size:0.875rem;">
                    ⚠️ <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="index.php?page=register" method="POST">
                <div class="form-group" style="margin-bottom:1rem;">
                    <label for="reg-name">Nama Lengkap</label>
                    <input type="text" id="reg-name" name="name" class="form-control" placeholder="Nama Anda" required>
                </div>

                <div class="form-group" style="margin-bottom:1rem;">
                    <label for="reg-biz">Nama Usaha / Usaha Dagang (Opsional)</label>
                    <input type="text" id="reg-biz" name="business_name" class="form-control" placeholder="Contoh: Studio Desain Kreatif">
                </div>

                <div class="form-group" style="margin-bottom:1rem;">
                    <label for="reg-email">Alamat Email</label>
                    <input type="email" id="reg-email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>

                <div class="form-row" style="margin-bottom:1.5rem;">
                    <div class="form-group">
                        <label for="reg-pass">Kata Sandi</label>
                        <input type="password" id="reg-pass" name="password" class="form-control" placeholder="Min. 6 Karakter" required>
                    </div>
                    <div class="form-group">
                        <label for="reg-pass-confirm">Ulangi Sandi</label>
                        <input type="password" id="reg-pass-confirm" name="password_confirm" class="form-control" placeholder="Sama dengan atas" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-emerald" style="width:100%; padding:0.85rem; font-size:1rem; margin-bottom:1.5rem;">
                    Buat Akun Saya
                </button>

                <div style="text-align:center; font-size:0.875rem; color:var(--text-muted);">
                    Sudah memiliki akun? 
                    <a href="index.php?page=login" style="color:#818cf8; font-weight:600;">Masuk di Sini</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

