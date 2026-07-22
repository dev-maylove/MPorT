<?php

declare(strict_types=1);

$providers = [
    __DIR__ . '/middleware.php',
    __DIR__ . '/csrf.php',
];

foreach ($providers as $provider) {

    if (!file_exists($provider)) {
        throw new RuntimeException(
            'Provider tidak ditemukan: ' . basename($provider)
        );
    }

    require_once $provider;
}
