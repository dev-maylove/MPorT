<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Session;

class AuthMiddleware
{
    public function handle(): void
    {
        if (!Session::has('user')) {
            header('Location: /login');
            exit;
        }
    }
}
