<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Session;

class AdminMiddleware
{
    public function handle(): void
    {
        if (!Session::has('user')) {
            header('Location: /login');
            exit;
        }

        $user = Session::get('user');

        if (($user['role'] ?? '') !== 'admin') {
            http_response_code(403);
            exit('403 Forbidden');
        }
    }
}
