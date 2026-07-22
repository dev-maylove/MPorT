<?php

declare(strict_types=1);

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../bootstrap/middleware.php';
require_once __DIR__ . '/../../bootstrap/csrf.php';
require_once __DIR__ . '/../../app/Core/Logger.php';

use App\Core\Logger;

requireGuest();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    csrf_verify();
    
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } else {

        $stmt = $pdo->prepare(
            "SELECT id, username, password, role
             FROM users
             WHERE username = ?
             LIMIT 1"
        );

        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            session_regenerate_id(true);

            $_SESSION['user'] = [
                'id'       => (int)$user['id'],
                'username' => $user['username'],
                'role'     => $user['role']
            ];
            
            Logger::info('Login berhasil', [
              'user_id'  => (int)$user['id'],
              'username' => $user['username'],
              'role'     => $user['role']
           ]);
            
            if ($user['role'] === 'admin') {
                header('Location: /admin/dashboard.php');
            } else {
                header('Location: /dashboard.php');
            }

            exit;
        }

              $error = 'Username atau password salah.';
              Logger::warning('Login gagal', [
                    'username' => $username
              ]);
    }
}

require_once __DIR__ . '/../../app/Views/login/index.php';
