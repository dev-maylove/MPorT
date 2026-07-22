<?php

declare(strict_types=1);

use App\Controllers\ApiController;
use App\Core\Router;
use App\Middleware\AuthMiddleware;

$api = new ApiController();

$router->group('/api', function (Router $router) use ($api): void {

    $router->get('/status', [$api, 'status']);

    $router->post('/login', [$api, 'login']);

    $router->post('/logout', [$api, 'logout'], [
        new AuthMiddleware(),
    ]);

    $router->get('/paket', [$api, 'paket']);

    $router->get('/me', [$api, 'me'], [
        new AuthMiddleware(),
    ]);

});
