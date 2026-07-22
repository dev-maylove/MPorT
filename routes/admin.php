<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Core\Router;
use App\Middleware\AdminMiddleware;

$home = new HomeController();
$auth = new AuthController();

$router->group('/admin', function (Router $router) use ($home, $auth): void {

    $router->get('', [$home, 'adminDashboard']);

    $router->get('/pelanggan', [$home, 'adminPelanggan']);

    $router->get('/paket', [$home, 'adminPaket']);

    $router->get('/tagihan', [$home, 'adminTagihan']);

    $router->get('/pembayaran', [$home, 'adminPembayaran']);

    $router->get('/pengguna', [$home, 'adminPengguna']);

    $router->get('/pengaturan', [$home, 'adminPengaturan']);

    $router->get('/laporan', [$home, 'adminLaporan']);

    $router->get('/logout', [$auth, 'logout']);

}, [
    new AdminMiddleware(),
]);
