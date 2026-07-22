<?php

declare(strict_types=1);

use App\Core\Session;

Session::start();

function csrf_token(): string
{
    if (!isset($_SESSION['_csrf'])) {
        $_SESSION['_csrf'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['_csrf'];
}

function csrf_field(): string
{
    return sprintf(
        '<input type="hidden" name="_csrf" value="%s">',
        htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8')
    );
}

function csrf_verify(): void
{
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
        return;
    }

    $token = (string) ($_POST['_csrf'] ?? '');

    if (
        !isset($_SESSION['_csrf']) ||
        !hash_equals($_SESSION['_csrf'], $token)
    ) {
        http_response_code(419);
        exit('419 CSRF Token Mismatch');
    }
}
