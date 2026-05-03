<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="home-hero">
    <div class="home-hero-content">
        <h1>Sağlığını kontrol altına al</h1>

        <p>
            Günlük kalori ve adım takibini yap, hedeflerini belirle
            ve ilerlemeni grafiklerle analiz et.
        </p>

        <?php if(session()->get('logged_in')): ?>
            <a href="/dashboard" class="hero-btn">Aktivite</a>
        <?php else: ?>
            <a href="/register" class="hero-btn">Hemen Başla</a>
        <?php endif; ?>
    </div>
</section>

<section class="home-section">
    <div class="home-card-grid">

        <a href="/dashboard" class="home-feature-card calorie-card">
            <h3>Kalori Takibi</h3>
            <p>Günlük kalori verilerini girerek ilerlemeni takip et.</p>
        </a>

        <a href="/dashboard" class="home-feature-card step-card">
            <h3>Adım Takibi</h3>
            <p>Günlük adım sayını kaydet ve fiziksel aktiviteni analiz et.</p>
        </a>

        <a href="/record/list" class="home-feature-card graph-card">
            <h3>Grafik Analiz</h3>
            <p>Haftalık ve aylık verilerini grafiklerle incele.</p>
        </a>

    </div>
</section>

<?= $this->endSection() ?>