<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php $user = $user ?? []; ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Profil Bilgileri</h2>

        <?php if(session()->getFlashdata('success')): ?>
            <p class="success"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="/profile/update" method="post">

            <input type="text" name="first_name"
                value="<?= $user['first_name'] ?? '' ?>"
                placeholder="Ad">

            <input type="text" name="last_name"
                value="<?= $user['last_name'] ?? '' ?>"
                placeholder="Soyad">

            <select name="gender">
                <option value="male" <?= ($user['gender'] ?? '') == 'male' ? 'selected' : '' ?>>Erkek</option>
                <option value="female" <?= ($user['gender'] ?? '') == 'female' ? 'selected' : '' ?>>Kadın</option>
            </select>

            <input type="number" name="age"
                value="<?= $user['age'] ?? '' ?>"
                placeholder="Yaş">

            <input type="number" name="height"
                value="<?= $user['height'] ?? '' ?>"
                placeholder="Boy (cm)">

            <input type="number" name="weight"
                value="<?= $user['weight'] ?? '' ?>"
                placeholder="Kilo (kg)">

            <input type="number" name="step_goal"
                value="<?= $user['step_goal'] ?? '' ?>"
                placeholder="Günlük hedef">

            <button type="submit">Güncelle</button>

        </form>

    </div>
</div>

<?= $this->endSection() ?>