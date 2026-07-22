<?php

declare(strict_types=1);
?>
<div class="container" style="max-width:420px;margin:60px auto;padding:24px;">

    <h2><?= htmlspecialchars($title ?? 'Login', ENT_QUOTES, 'UTF-8') ?></h2>

    <?php if (!empty($error)): ?>
        <div style="
            background:#fdecea;
            color:#b71c1c;
            border:1px solid #f5c6cb;
            padding:12px;
            margin-bottom:20px;
            border-radius:6px;
        ">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/login">

        <?= csrf_field(); ?>

        <div style="margin-bottom:15px;">
            <label for="username">Username</label><br>
            <input
                type="text"
                id="username"
                name="username"
                required
                autocomplete="username"
                style="width:100%;padding:10px;"
            >
        </div>

        <div style="margin-bottom:20px;">
            <label for="password">Password</label><br>
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
                style="width:100%;padding:10px;"
            >
        </div>

        <button
            type="submit"
            style="
                width:100%;
                padding:12px;
                cursor:pointer;
            "
        >
            Login
        </button>

    </form>

</div>
