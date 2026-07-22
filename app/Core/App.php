<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use Throwable;

class App
{
        public function run(): void
    {
    try {

        $request = new Request();
        $router = new Router();

        require ROOT_PATH . '/routes/web.php';
        require ROOT_PATH . '/routes/admin.php';
        require ROOT_PATH . '/routes/api.php';

        $router->dispatch(
            $request->method(),
            $request->uri()
        );

    } catch (Throwable $e) {

        if (class_exists(Logger::class)) {
            Logger::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
        }

        http_response_code(500);
        exit('500 Internal Server Error');
    }
  }

}
