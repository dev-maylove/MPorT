<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$home = new HomeController();
$auth = new AuthController();

$router->get('/', [$home, 'index']);

$router->get('/paket', [$home, 'paket']);

$router->get('/login', [$auth, 'login'], [
    new GuestMiddleware(),
]);

$router->post('/login', [$auth, 'login'], [
    new GuestMiddleware(),
]);

$router->post('/logout', [$auth, 'logout'], [
    new AuthMiddleware(),
]);

$router->get('/dashboard', [$home, 'dashboard'], [
    new AuthMiddleware(),
]);

// Aktifkan jika controller dan view sudah dibuat
// $router->get('/coverage', [$home, 'coverage']);
// $router->get('/speedtest', [$home, 'speedtest']);
// $router->get('/contact', [$home, 'contact']);
