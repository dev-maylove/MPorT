<?php

declare(strict_types=1);

require_once __DIR__ . '/../../app/Core/Logger.php';

use App\Core\Logger;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Simpan data user sebelum session dihapus
$user = $_SESSION['user'] ?? null;

if ($user) {
    Logger::info('Logout berhasil', [
        'user_id'  => $user['id'] ?? null,
        'username' => $user['username'] ?? 'unknown',
        'role'     => $user['role'] ?? 'unknown'
    ]);
}

// Hapus semua data session
$_SESSION = [];

// Hapus cookie session jika digunakan
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        (bool)$params['secure'],
        (bool)$params['httponly']
    );
}

// Hancurkan session
session_destroy();

// Hindari cache setelah logout
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');

// Redirect ke login
header('Location: /auth/login.php', true, 302);
exit;
