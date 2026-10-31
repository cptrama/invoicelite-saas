<?php
/**
 * InvoiceLite — Login Authentication View & Logic
 * Author: Muhammad Rama Alfiannur (Backend & Database Lead)
 * Role: Anggota 2 - Backend & Database Lead
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/database.php';

$error = '';
$success = '';

if (isset($_GET['registered'])) {
    $success = 'Pendaftaran berhasil! Silakan masuk dengan akun baru Anda.';
}
if (isset($_GET['logged_out'])) {
    $success = 'Anda telah berhasil keluar dari akun.';
}

// Handle POST Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Harap isi email dan password!';
    } else {
        $pdo = getDBConnection();
        $user = null;

        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
        }

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['business_name'] = $user['business_name'] ?: 'InvoiceLite Studio';

            header('Location: index.php?page=dashboard');
            exit;
        } elseif ($email === 'demo@invoicelite.id' && $password === 'password123') {
            // Instant fallback demo login
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = 'Fikri Nabillah & Team';
            $_SESSION['user_email'] = 'demo@invoicelite.id';
            $_SESSION['business_name'] = 'InvoiceLite Studio';

            header('Location: index.php?page=dashboard');
            exit;
        } else {
            $error = 'Email atau kata sandi tidak valid!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun — InvoiceLite SaaS</title>
    
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
            padding: 2rem 1.5rem;
            position: relative;
            z-index: 10;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
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

        .auth-header .brand-logo {
            display: inline-flex;
            margin-bottom: 1rem;
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

        .demo-box {
            background: rgba(99, 102, 241, 0.1);
            border: 1px dashed rgba(99, 102, 241, 0.35);
            border-radius: var(--radius-md);
            padding: 0.85rem 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.825rem;
        }
    </style>
</head>
<body>

    <!-- Background Blobs -->
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>

    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <a href="index.php" class="brand-logo">
                    <div class="brand-icon" style="width:38px; height:38px; background:linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%); border-radius:10px; display:flex; align-items:center; justify-content:center; color:#fff;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                        </svg>
                    </div>
                    <span style="font-weight:800; font-size:1.35rem; margin-left:0.5rem; color:var(--text-primary);">InvoiceLite</span>
                </a>
                <h1 class="auth-title">Selamat Datang Kembali</h1>
                <p class="auth-subtitle">Masuk untuk mengelola tagihan dan analitik bisnis Anda</p>
            </div>

            <!-- Demo Fill Assistant -->
            <div class="demo-box">
                <div>
                    <strong style="color:#818cf8; display:block;">Akun Pengujian Demo:</strong>
                    <span style="color:var(--text-muted);">demo@invoicelite.id • pass: password123</span>
                </div>
                <button type="button" class="btn btn-secondary btn-sm" id="btn-fill-demo">Isi Cepat</button>
            </div>

            <?php if (!empty($error)): ?>
                <div style="background:rgba(239,68,68,0.15); border:1px solid rgba(239,68,68,0.3); color:#f87171; padding:0.75rem 1rem; border-radius:var(--radius-md); margin-bottom:1.5rem; font-size:0.875rem;">
                    ⚠️ <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div style="background:rgba(16,185,129,0.15); border:1px solid rgba(16,185,129,0.3); color:#34d399; padding:0.75rem 1rem; border-radius:var(--radius-md); margin-bottom:1.5rem; font-size:0.875rem;">
                    ✓ <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form action="index.php?page=login" method="POST">
                <div class="form-group" style="margin-bottom:1.25rem;">
                    <label for="login-email">Email Bisnis</label>
                    <input type="email" id="login-email" name="email" class="form-control" placeholder="nama@perusahaan.com" required>
                </div>

                <div class="form-group" style="margin-bottom:1.5rem;">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <label for="login-password">Kata Sandi</label>
                    </div>
                    <input type="password" id="login-password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%; padding:0.85rem; font-size:1rem; margin-bottom:1.5rem;">
                    Masuk ke Dashboard
                </button>

                <div style="text-align:center; font-size:0.875rem; color:var(--text-muted);">
                    Belum memiliki akun? 
                    <a href="index.php?page=register" style="color:#818cf8; font-weight:600;">Daftar Sekarang</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('btn-fill-demo').addEventListener('click', function() {
            document.getElementById('login-email').value = 'demo@invoicelite.id';
            document.getElementById('login-password').value = 'password123';
        });
    </script>
</body>
</html>

