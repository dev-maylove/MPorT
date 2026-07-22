<section class="page-section" id="page-paket" data-page="paket">
    <div class="section-container">

        <div class="section-header">
            <span class="section-tag">Pilih Paketmu</span>

            <h2 class="section-title">
                Paket Internet MandalaNet
            </h2>

            <p class="section-subtitle">
                Semua paket dilengkapi AI Optimizer &amp; Cyber Shield gratis.
                Harga berlaku per bulan.
            </p>
        </div>

<?php

$pakets = [

    [
        'name' => 'Mandala BASIC',
        'speed' => '15',
        'upto' => '50',
        'price' => 'Rp 100',
        'badge' => '',
        'icon' => 'wifi',
        'features' => [
            ['label'=>'AI Traffic Optimizer','available'=>true],
            ['label'=>'Cyber Shield','available'=>true],
            ['label'=>'WiFi Router Dipinjami','available'=>true],
            ['label'=>'Support AI 24/7','available'=>true],
            ['label'=>'IP Publik Statis','available'=>false],
            ['label'=>'Priority Bandwidth','available'=>false],
        ]
    ],

    [
        'name' => 'Mandala LITE',
        'speed' => '20',
        'upto' => '50',
        'price' => 'Rp 110',
        'badge' => '🔥 Best Seller',
        'icon' => 'rocket',
        'features' => [
            ['label'=>'AI Traffic Optimizer Pro','available'=>true],
            ['label'=>'Cyber Shield','available'=>true],
            ['label'=>'WiFi Router','available'=>true],
            ['label'=>'Support AI Prioritas','available'=>true],
            ['label'=>'IP Publik Statis','available'=>false],
            ['label'=>'Dedicated AI Server','available'=>true],
        ]
    ],

    [
        'name' => 'Mandala PRO',
        'speed' => '30',
        'upto' => '70',
        'price' => 'Rp 150',
        'badge' => '',
        'icon' => 'crown',
        'features' => [
            ['label'=>'AI Traffic Optimizer Max','available'=>true],
            ['label'=>'Cyber Shield','available'=>true],
            ['label'=>'WiFi Router Dipinjami','available'=>true],
            ['label'=>'Support AI VIP 24/7','available'=>true],
            ['label'=>'IP Publik Statis','available'=>false],
            ['label'=>'Dedicated AI Server','available'=>true],
        ]
    ],

    [
        'name' => 'Mandala MAX',
        'speed' => '40',
        'upto' => '100',
        'price' => 'Rp 200',
        'badge' => '⭐ Best Value',
        'icon' => 'gem',
        'features' => [
            ['label'=>'AI Traffic Optimizer Max','available'=>true],
            ['label'=>'Cyber Shield Pro','available'=>true],
            ['label'=>'WiFi Router Dipinjami','available'=>true],
            ['label'=>'Support AI VIP 24/7','available'=>true],
            ['label'=>'IP Publik Statis','available'=>false],
            ['label'=>'Dedicated AI Server','available'=>true],
            ['label'=>'Bandwidth Prioritas','available'=>true],
        ]
    ]

];

?>

        <div class="packages-grid">

<?php foreach ($pakets as $p): ?>

            <div class="package-card <?= !empty($p['badge']) ? 'featured' : '' ?> reveal">

<?php if (!empty($p['badge'])): ?>
                <span class="package-badge">
                    <?= htmlspecialchars($p['badge'], ENT_QUOTES, 'UTF-8') ?>
                </span>
<?php endif; ?>

                <div class="package-icon">
                    <i class="fa-solid fa-<?= htmlspecialchars($p['icon'], ENT_QUOTES, 'UTF-8') ?>"></i>
                </div>

                <div class="package-name">
                    <?= htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8') ?>
                </div>

                <div class="package-speed">
                    <span class="speed-number">
                        <?= htmlspecialchars($p['speed'], ENT_QUOTES, 'UTF-8') ?>
                        <small> Mbps</small>
                    </span>

                    <span class="upto-label">
                        UpTo <?= htmlspecialchars($p['upto'], ENT_QUOTES, 'UTF-8') ?> Mbps
                    </span>
                </div>

                <div class="package-price">
                    <?= htmlspecialchars($p['price'], ENT_QUOTES, 'UTF-8') ?>
                    <span>rb/bln</span>
                </div>

                <ul class="package-features">

<?php foreach ($p['features'] as $f): ?>

                    <li>
                        <i class="fa-solid <?= $f['available'] ? 'fa-check' : 'fa-times' ?>"></i>

                        <?= htmlspecialchars($f['label'], ENT_QUOTES, 'UTF-8') ?>
                    </li>

<?php endforeach; ?>

                </ul>

                <button
                    type="button"
                    class="btn <?= !empty($p['badge']) ? 'btn-primary' : 'btn-outline' ?>"
                    style="width:100%;justify-content:center;"
                    data-reg-toggle>

                    Pilih Paket

                </button>

                <form class="registrasi-form" method="post">

                    <input
                        type="text"
                        class="reg-name"
                        placeholder="Nama Lengkap"
                        autocomplete="name"
                        required>

                    <input
                        type="tel"
                        class="reg-hp"
                        placeholder="Nomor HP / WhatsApp"
                        autocomplete="tel"
                        required>

                    <input
                        type="text"
                        class="reg-alamat"
                        placeholder="Alamat Lengkap"
                        autocomplete="street-address"
                        required>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        data-reg-submit>

                        <span class="btn-text">
                            <i class="fa-brands fa-whatsapp"></i>
                            Daftar via WhatsApp
                        </span>

                        <span class="spinner"></span>

                    </button>

                </form>

            </div>

<?php endforeach; ?>

        </div>

    </div>
</section>

<script src="/assets/js/paket.js"></script>
