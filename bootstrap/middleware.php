<?php

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Cek apakah pengguna sudah login.
 */
function isLoggedIn(): bool
{
    return isset(
        $_SESSION['user']['id'],
        $_SESSION['user']['username'],
        $_SESSION['user']['role']
    );
}

/**
 * Ambil data user yang sedang login.
 */
function currentUser(): ?array
{
    return $_SESSION['user'] ?? null;
}

/**
 * Cek role pengguna.
 */
function hasRole(string $role): bool
{
    $user = currentUser();

    return ($user['role'] ?? '') === $role;
}

/**
 * Wajib login.
 */
function requireLogin(): void
{
    if (!isLoggedIn()) {
        header('Location: /auth/login.php', true, 302);
        exit;
    }
}

/**
 * Hanya admin.
 */
function requireAdmin(): void
{
    requireLogin();

    if (!hasRole('admin')) {
        http_response_code(403);
        exit('403 Forbidden');
    }
}

/**
 * Hanya user biasa.
 */
function requireUser(): void
{
    requireLogin();

    if (!hasRole('user')) {
        http_response_code(403);
        exit('403 Forbidden');
    }
}

/**
 * Hanya tamu (belum login).
 */
function requireGuest(): void
{
    if (!isLoggedIn()) {
        return;
    }

    if (hasRole('admin')) {
        header('Location: /admin/dashboard.php', true, 302);
    } else {
        header('Location: /dashboard.php', true, 302);
    }

    exit;
}

/**
 * Logout paksa.
 */
function forceLogout(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            (bool) $params['secure'],
            (bool) $params['httponly']
        );
    }

    session_destroy();

    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');

    header('Location: /auth/login.php', true, 302);
    exit;
}
