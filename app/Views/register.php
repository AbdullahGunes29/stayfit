<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Kayıt Ol</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <p class="warning"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="/register" method="post">

            <input type="text" name="first_name" placeholder="Ad" required>
            <input type="text" name="last_name" placeholder="Soyad" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" id="password" placeholder="Şifre" required>

            <!-- Şifre kuralları -->
            <div id="password-rules" style="font-size:14px; margin-bottom:10px;">
                <p id="rule-length" style="color:red;">En az 8 karakter</p>
                <p id="rule-uppercase" style="color:red;">En az 1 büyük harf</p>
                <p id="rule-number" style="color:red;">En az 1 rakam</p>
            </div>

            <select name="gender" required>
                <option value="">Cinsiyet seç</option>
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>

            <input type="number" name="age" placeholder="Yaş" required>
            <input type="number" name="height" placeholder="Boy (cm)" required>
            <input type="number" name="weight" placeholder="Kilo (kg)" required>

            <input type="number" name="step_goal" value="10000" placeholder="Günlük hedef">

            <button type="submit">Kayıt Ol</button>

        </form>

        <p style="text-align:center;">
            Hesabın var mı? <a href="/login">Giriş yap</a>
        </p>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
const password = document.getElementById('password');

password.addEventListener('input', () => {
    const value = password.value;

    document.getElementById('rule-length').style.color =
        value.length >= 8 ? 'green' : 'red';

    document.getElementById('rule-uppercase').style.color =
        /[A-Z]/.test(value) ? 'green' : 'red';

    document.getElementById('rule-number').style.color =
        /[0-9]/.test(value) ? 'green' : 'red';
});
</script>

<?= $this->endSection() ?>