<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Database;
use App\Core\Logger;
use App\Core\Session;
use PDO;

class AuthService
{
    /**
     * Proses login pengguna.
     */
    public function login(string $username, string $password): ?array
    {
        $username = trim($username);

        if ($username === '' || $password === '') {
            return null;
        }

        $pdo = Database::getInstance()->connection();

        $stmt = $pdo->prepare("
            SELECT id, username, password, role
            FROM users
            WHERE username = ?
            LIMIT 1
        ");

        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {

            Logger::warning('Login gagal', [
                'username' => $username,
            ]);

            return null;
        }

        Session::regenerate();

        Session::set('user', [
            'id'       => (int) $user['id'],
            'username' => $user['username'],
            'role'     => $user['role'],
        ]);

        Logger::info('Login berhasil', [
            'user_id'  => (int) $user['id'],
            'username' => $user['username'],
            'role'     => $user['role'],
        ]);

        return [
            'id'       => (int) $user['id'],
            'username' => $user['username'],
            'role'     => $user['role'],
        ];
    }

    /**
     * Logout pengguna.
     */
    public function logout(): void
    {
        Session::destroy();
    }

    /**
     * Ambil user yang sedang login.
     */
    public function user(): ?array
    {
        return Session::get('user');
    }

    /**
     * Cek apakah user sudah login.
     */
    public function check(): bool
    {
        return Session::has('user');
    }

    /**
     * Cek apakah user belum login.
     */
    public function guest(): bool
    {
        return !$this->check();
    }

    /**
     * Ambil ID user yang sedang login.
     */
    public function id(): ?int
    {
        return $this->user()['id'] ?? null;
    }

    /**
     * Ambil role user yang sedang login.
     */
    public function role(): ?string
    {
        return $this->user()['role'] ?? null;
    }
}
