<?php

declare(strict_types=1);

$current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<aside class="admin-sidebar">

    <div class="sidebar-brand">

        <h2>MPorT</h2>

        <span>MandalaNet ISP</span>

    </div>

    <nav class="sidebar-menu">

        <a href="/admin" class="<?= $current === '/admin' ? 'active' : '' ?>">
            <i class="fa-solid fa-gauge-high"></i>
            Dashboard
        </a>

        <a href="/admin/pelanggan" class="<?= $current === '/admin/pelanggan' ? 'active' : '' ?>">
            <i class="fa-solid fa-users"></i>
            Pelanggan
        </a>

        <a href="/admin/paket" class="<?= $current === '/admin/paket' ? 'active' : '' ?>">
            <i class="fa-solid fa-wifi"></i>
            Paket
        </a>

        <a href="/admin/tagihan" class="<?= $current === '/admin/tagihan' ? 'active' : '' ?>">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            Tagihan
        </a>

        <a href="/admin/pembayaran" class="<?= $current === '/admin/pembayaran' ? 'active' : '' ?>">
            <i class="fa-solid fa-money-bill-wave"></i>
            Pembayaran
        </a>

        <a href="/admin/pengguna" class="<?= $current === '/admin/pengguna' ? 'active' : '' ?>">
            <i class="fa-solid fa-user-shield"></i>
            Pengguna
        </a>

        <a href="/admin/laporan" class="<?= $current === '/admin/laporan' ? 'active' : '' ?>">
            <i class="fa-solid fa-chart-column"></i>
            Laporan
        </a>

        <a href="/admin/pengaturan" class="<?= $current === '/admin/pengaturan' ? 'active' : '' ?>">
            <i class="fa-solid fa-gear"></i>
            Pengaturan
        </a>

        <hr>

        <a href="/admin/logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </nav>

</aside>
