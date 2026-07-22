<?php

declare(strict_types=1);

$title = $title ?? 'Admin Dashboard';

require APP_ROOT . '/app/Views/layouts/header.php';
require APP_ROOT . '/app/Views/layouts/navbar.php';
?>

<main class="container py-4">

    <h1>Admin Dashboard</h1>

    <p>Selamat datang Administrator.</p>

</main>

<?php require APP_ROOT . '/app/Views/layouts/footer.php'; ?>
