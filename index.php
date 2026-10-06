<?php
/**
 * InvoiceLite — Application Entry Point & Router
 * UTS Pemrograman Web
 */

// Simple router for viewing pages during development & production
$page = $_GET['page'] ?? 'landing';

switch ($page) {
    case 'login':
        if (file_exists(__DIR__ . '/views/auth/login.php')) {
            require __DIR__ . '/views/auth/login.php';
        } else {
            require __DIR__ . '/views/landing/index.php';
        }
        break;

    case 'register':
        if (file_exists(__DIR__ . '/views/auth/register.php')) {
            require __DIR__ . '/views/auth/register.php';
        } else {
            require __DIR__ . '/views/landing/index.php';
        }
        break;

    case 'clients':
        if (file_exists(__DIR__ . '/views/clients/index.php')) {
            require __DIR__ . '/views/clients/index.php';
        } else {
            require __DIR__ . '/views/landing/index.php';
        }
        break;

    case 'landing':
    default:
        require __DIR__ . '/views/landing/index.php';
        break;
}

