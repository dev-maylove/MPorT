<?php

declare(strict_types=1);

require __DIR__ . '/header.php';

require __DIR__ . '/navbar.php';

echo $content ?? '';

require __DIR__ . '/footer.php';
