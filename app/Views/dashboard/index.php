<?php

declare(strict_types=1);

$title = $title ?? 'Dashboard';

require APP_ROOT . '/app/Views/layouts/header.php';
require APP_ROOT . '/app/Views/layouts/navbar.php';
?>

<main class="container py-4">

    <h1>Dashboard</h1>

    <p>Selamat datang di MPorT.</p>

</main>

<?php require APP_ROOT . '/app/Views/layouts/footer.php'; ?>
