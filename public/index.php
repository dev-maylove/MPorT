<?php

declare(strict_types=1);

try {
    $app = require __DIR__ . '/../bootstrap/app.php';
    $app->run();
} catch (\Throwable $e) {
    http_response_code(500);

    if (class_exists(\App\Core\Logger::class)) {
        \App\Core\Logger::error($e->getMessage(), [
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);
    }

    exit('500 Internal Server Error');
}
