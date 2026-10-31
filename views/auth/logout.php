<?php
/**
 * InvoiceLite — Logout Handler
 * Author: Muhammad Rama Alfiannur (Backend & Database Lead)
 * Role: Anggota 2 - Backend & Database Lead
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

header('Location: index.php?page=login&logged_out=1');
exit;

