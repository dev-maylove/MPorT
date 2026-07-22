<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

class Database
{
    private static ?Database $instance = null;

    private PDO $pdo;

    private function __construct()
    {
        try {

            $pdo = require dirname(__DIR__, 2) . '/config/database.php';

            if (!$pdo instanceof PDO) {
                throw new RuntimeException(
                    'config/database.php harus mengembalikan objek PDO.'
                );
            }

            $this->pdo = $pdo;

        } catch (PDOException $e) {
            throw new RuntimeException(
                'Database connection failed: ' . $e->getMessage(),
                0,
                $e
            );
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connection(): PDO
    {
        return $this->pdo;
    }
}
