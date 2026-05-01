<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Stay Fit | Giriş</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="container">
    <div class="card" style="max-width: 450px; margin: auto;">
        <h1>Stay Fit</h1>
        <h2>Giriş Yap</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <p class="warning"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form method="post" action="/login">
            <input type="email" name="email" placeholder="Email adresi" required>
            <input type="password" name="password" placeholder="Şifre" required>

            <button type="submit">Giriş Yap</button>
        </form>

        <p>Hesabın yok mu? <a href="/register">Kayıt ol</a></p>
    </div>
</div>

</body>
</html>