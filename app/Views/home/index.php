<?php

declare(strict_types=1);
?>

<section class="hero">

    <div class="hero-badge">
        <span class="pulse-dot"></span>
        MANDALANET.ID • SERVER 2026 • ONLINE
    </div>

    <h1>
        Koneksi Internet
        <span class="gradient-text">Super Cepat</span>
        Untuk Bangsalrejo dan Sekitarnya
    </h1>

    <p>
        Nikmati Internet Fiber Optik dengan koneksi stabil,
        cepat, tanpa FUP, dan didukung monitoring jaringan 24 jam.
    </p>

    <div class="hero-buttons">

        <a href="/paket" class="btn btn-primary">
            <i class="fa-solid fa-wifi" aria-hidden="true"></i>
            <span class="btn-text">Lihat Paket</span>
            <span class="spinner" aria-hidden="true"></span>
        </a>

        <a href="/coverage" class="btn btn-outline">
            <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
            Cek Coverage
        </a>

    </div>

    <div class="hero-stats">

        <div class="hero-stat">
            <div class="hero-stat-value">500+</div>
            <div class="hero-stat-label">Pelanggan</div>
        </div>

        <div class="hero-stat">
            <div class="hero-stat-value">99.9%</div>
            <div class="hero-stat-label">Uptime</div>
        </div>

        <div class="hero-stat">
            <div class="hero-stat-value">1 Gbps</div>
            <div class="hero-stat-label">Backbone</div>
        </div>

        <div class="hero-stat">
            <div class="hero-stat-value">24/7</div>
            <div class="hero-stat-label">Support</div>
        </div>

    </div>

</section>

<section class="section-container">

    <div class="section-header">

        <span class="section-tag">
            Paket Internet
        </span>

        <h2 class="section-title">
            Pilih Paket Terbaik
        </h2>

        <p class="section-subtitle">
            Internet Fiber Optik Unlimited untuk rumah dan bisnis.
        </p>

    </div>

    <?php
    require __DIR__ . '/paket.php';
    ?>

</section>
