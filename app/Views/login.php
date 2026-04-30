<h2>Giriş Yap</h2>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form method="post" action="/login">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Şifre" required><br><br>

    <button type="submit">Giriş Yap</button>
</form>

<a href="/register">Hesap oluştur</a>