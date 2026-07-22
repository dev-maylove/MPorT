<?php

declare(strict_types=1);

namespace App\Core;

use JsonException;

class Logger
{
    private static string $logFile = __DIR__ . '/../../storage/logs/app.log';

    public static function write(
        string $level,
        string $message,
        array $context = []
    ): void {

        try {

            $directory = dirname(self::$logFile);

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $record = [
                'time'    => date('Y-m-d H:i:s'),
                'level'   => strtoupper($level),
                'user'    => $_SESSION['user']['username'] ?? 'Guest',
                'ip'      => $_SERVER['REMOTE_ADDR'] ?? 'CLI',
                'message' => $message,
                'context' => $context
            ];

            file_put_contents(
                self::$logFile,
                json_encode(
                    $record,
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES |
                    JSON_THROW_ON_ERROR
                ) . PHP_EOL,
                FILE_APPEND | LOCK_EX
            );

        } catch (JsonException|\Throwable $e) {
            error_log($e->getMessage());
        }
    }

    public static function info(string $message, array $context = []): void
    {
        self::write('INFO', $message, $context);
    }

    public static function warning(string $message, array $context = []): void
    {
        self::write('WARNING', $message, $context);
    }

    public static function error(string $message, array $context = []): void
    {
        self::write('ERROR', $message, $context);
    }
}
