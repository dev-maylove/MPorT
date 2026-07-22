<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Session;

class GuestMiddleware
{
    public function handle(): void
    {
        if (Session::has('user')) {
            header('Location: /');
            exit;
        }
    }
}
