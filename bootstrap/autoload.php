<?php

declare(strict_types=1);

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__));
}

$composer = ROOT_PATH . '/vendor/autoload.php';

if (!file_exists($composer)) {
    throw new RuntimeException('Composer autoload not found.');
}

require_once $composer;
