<?php
/**
 * InvoiceLite — Database Connection & Helper
 * Author: Muhammad Rama Alfiannur (Backend & Database Lead)
 * Role: Anggota 2 - Backend & Database Lead
 */

define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'invoicelite_db');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');

function getDBConnection() {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    try {
        // Try connecting to MySQL
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Fallback to SQLite local file if MySQL is not running or credentials differ
        $sqlitePath = __DIR__ . '/invoicelite_local.sqlite';
        try {
            $pdo = new PDO("sqlite:" . $sqlitePath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            initSqliteTables($pdo);
            return $pdo;
        } catch (Exception $ex) {
            error_log("Database connection error: " . $ex->getMessage());
            return null;
        }
    }
}

function initSqliteTables($pdo) {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            business_name TEXT,
            phone TEXT,
            address TEXT,
            currency TEXT DEFAULT 'IDR',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS clients (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            client_name TEXT NOT NULL,
            email TEXT,
            phone TEXT,
            address TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS invoices (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            client_id INTEGER,
            invoice_number TEXT NOT NULL,
            issue_date TEXT NOT NULL,
            due_date TEXT NOT NULL,
            status TEXT DEFAULT 'unpaid',
            tax_rate REAL DEFAULT 0.00,
            discount REAL DEFAULT 0.00,
            total_amount REAL DEFAULT 0.00,
            notes TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");

    // Insert Default Demo User if not exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute(['demo@invoicelite.id']);
    if (!$stmt->fetch()) {
        $hash = password_hash('password123', PASSWORD_BCRYPT);
        $insert = $pdo->prepare("INSERT INTO users (name, email, password, business_name, phone, address) VALUES (?, ?, ?, ?, ?, ?)");
        $insert->execute([
            'Fikri Nabillah & Team',
            'demo@invoicelite.id',
            $hash,
            'InvoiceLite Studio',
            '+62 812-3456-7890',
            'Gedung Cyber One Lt. 5, Jakarta Selatan'
        ]);
    }

    // Insert Default Demo Clients if not exists
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM clients");
    $count = $stmt->fetch()['count'] ?? 0;
    if ($count == 0) {
        $insertClient = $pdo->prepare("INSERT INTO clients (user_id, client_name, email, phone, address) VALUES (?, ?, ?, ?, ?)");
        $insertClient->execute([1, 'PT Digital Solusindo', 'finance@digitalsolusindo.co.id', '+62 811-2233-4455', 'Jl. Sudirman Kav 25, Jakarta Selatan']);
        $insertClient->execute([1, 'Creative Media Nusantara', 'billing@creativemedia.id', '+62 818-9988-7766', 'Gedung Cyber 2 Lantai 8, Jakarta']);
        $insertClient->execute([1, 'Kopi Kenangan Senja (UMKM)', 'owner@kenangansenja.com', '+62 813-4455-6677', 'Jl. Riau No. 45, Bandung']);
        $insertClient->execute([1, 'Studio Foto Lumina', 'lumina.studio@gmail.com', '+62 878-1122-3344', 'Jl. Kaliurang KM 5, Yogyakarta']);
    }
}

