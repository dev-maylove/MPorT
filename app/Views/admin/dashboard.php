<?php

declare(strict_types=1);

use App\Core\Session;

$title = $title ?? 'Dashboard Admin';

$user = Session::get('user');
?>

<section class="section-container">

    <div class="section-header">

        <span class="section-tag">
            Admin Panel
        </span>

        <h1 class="section-title">
            Dashboard Admin
        </h1>

        <p class="section-subtitle">
            Selamat datang,
            <strong><?= htmlspecialchars($user['username'] ?? 'Administrator', ENT_QUOTES, 'UTF-8') ?></strong>.
        </p>

    </div>

    <div class="hero-stats">

        <div class="hero-stat">
            <div class="hero-stat-value">0</div>
            <div class="hero-stat-label">Pelanggan</div>
        </div>

        <div class="hero-stat">
            <div class="hero-stat-value">0</div>
            <div class="hero-stat-label">Paket</div>
        </div>

        <div class="hero-stat">
            <div class="hero-stat-value">0</div>
            <div class="hero-stat-label">Tagihan</div>
        </div>

        <div class="hero-stat">
            <div class="hero-stat-value">ONLINE</div>
            <div class="hero-stat-label">Server</div>
        </div>

    </div>

    <div class="hero-buttons">

        <a href="/admin/pelanggan" class="btn btn-primary">
            <i class="fa-solid fa-users"></i>
            Kelola Pelanggan
        </a>

        <a href="/admin/paket" class="btn btn-outline">
            <i class="fa-solid fa-wifi"></i>
            Kelola Paket
        </a>

        <a href="/admin/tagihan" class="btn btn-outline">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            Kelola Tagihan
        </a>

        <a href="/admin/pembayaran" class="btn btn-outline">
            <i class="fa-solid fa-money-bill-wave"></i>
            Pembayaran
        </a>

        <a href="/admin/pengguna" class="btn btn-outline">
            <i class="fa-solid fa-user-shield"></i>
            Pengguna
        </a>

        <a href="/admin/pengaturan" class="btn btn-outline">
            <i class="fa-solid fa-gear"></i>
            Pengaturan
        </a>

        <a href="/admin/laporan" class="btn btn-outline">
            <i class="fa-solid fa-chart-line"></i>
            Laporan
        </a>

        <a href="/admin/logout" class="btn btn-danger">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </div>

</section>
