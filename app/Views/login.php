<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Giriş Yap</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <p class="warning"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <p class="success"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="/login" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Şifre" required>

            <button type="submit">Giriş Yap</button>
        </form>

        <p style="text-align:center;">
            Hesabın yok mu? <a href="/register">Kayıt ol</a>
        </p>

    </div>
</div>

<?= $this->endSection() ?>