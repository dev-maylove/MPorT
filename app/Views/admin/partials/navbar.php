<?php

declare(strict_types=1);

use App\Core\Session;

$user = Session::get('user');
?>

<header class="admin-navbar">

    <div>

        <h3>Admin Panel</h3>

        <small>MandalaNet ISP 2026</small>

    </div>

    <div class="admin-user">

        <i class="fa-solid fa-circle-user"></i>

        <?= htmlspecialchars($user['username'] ?? 'Administrator', ENT_QUOTES, 'UTF-8') ?>

    </div>

</header>
