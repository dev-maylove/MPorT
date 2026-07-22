<?php

declare(strict_types=1);

use App\Core\App;

$autoload = __DIR__ . '/autoload.php';

if (!file_exists($autoload)) {
    throw new RuntimeException('Autoload file not found.');
}

require_once $autoload;

$providers = __DIR__ . '/providers.php';

if (!file_exists($providers)) {
    throw new RuntimeException('Providers file not found.');
}

require_once $providers;

return new App();
