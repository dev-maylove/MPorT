<?php

declare(strict_types=1);

namespace App\Core;

use JsonException;

class Response
{
    public function status(int $code): void
    {
        http_response_code($code);
    }

    public function json(array $data, int $status = 200): void
    {
        $this->status($status);

        header('Content-Type: application/json; charset=utf-8');

        try {
            echo json_encode(
                $data,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_PRETTY_PRINT |
                JSON_THROW_ON_ERROR
            );
        } catch (JsonException $e) {
            http_response_code(500);
            echo '{"error":"Failed to encode JSON response"}';
        }

        exit;
    }

    public function redirect(string $url): void
    {
        header("Location: {$url}", true, 302);
        exit;
    }

    public function view(string $content): void
    {
        header('Content-Type: text/html; charset=utf-8');
        echo $content;
    }
}
