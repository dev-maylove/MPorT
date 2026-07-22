<?php

declare(strict_types=1);

namespace App\Core;

class Session
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $key, mixed $value): void
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        self::start();

        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool
    {
        self::start();

        return array_key_exists($key, $_SESSION);
    }

    public static function remove(string $key): void
    {
        self::start();

        unset($_SESSION[$key]);
    }

    public static function regenerate(bool $deleteOld = true): void
    {
        self::start();

        session_regenerate_id($deleteOld);
    }

    public static function all(): array
    {
        self::start();

        return $_SESSION;
    }

    public static function pull(string $key, mixed $default = null): mixed
    {
        self::start();

        $value = $_SESSION[$key] ?? $default;

        unset($_SESSION[$key]);

        return $value;
    }

    public static function flash(string $key, mixed $value): void
    {
        self::set('_flash.' . $key, $value);
    }

    public static function getFlash(string $key, mixed $default = null): mixed
    {
        return self::pull('_flash.' . $key, $default);
    }

    public static function isLoggedIn(): bool
    {
        return self::has('user');
    }

    public static function destroy(): void
    {
        self::start();

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
    }
}
