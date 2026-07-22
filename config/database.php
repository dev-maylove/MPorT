<?php

declare(strict_types=1);


$config = [
    'host'     => '127.0.0.1',
    'database' => 'mandalanet',
    'username' => 'mandala',
    'password' => 'Mandala@2026',
    'charset'  => 'utf8mb4',
];

$dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=%s',
    $config['host'],
    $config['database'],
    $config['charset']
);

try {

    return new PDO(
        $dsn,
        $config['username'],
        $config['password'],
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_STRINGIFY_FETCHES  => false,
        ]
    );

} catch (PDOException $e) {

    throw new RuntimeException(
        'Koneksi database gagal: ' . $e->getMessage(),
        0,
        $e
    );
}
