<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Stay Fit | Kayıt</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="container">
    <div class="card" style="max-width: 500px; margin: auto;">
        <h1>Stay Fit</h1>
        <h2>Kayıt Ol</h2>

        <form method="post" action="/register">

            <input type="text" name="first_name" placeholder="Ad" required>
            <input type="text" name="last_name" placeholder="Soyad" required>

            <input type="email" name="email" placeholder="Email adresi" required>
            <input type="password" name="password" placeholder="Şifre" required>

            <select name="gender" required>
                <option value="">Cinsiyet Seç</option>
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>

            <input type="number" name="age" placeholder="Yaş" required>
            <input type="number" step="0.01" name="height" placeholder="Boy (cm)" required>
            <input type="number" step="0.01" name="weight" placeholder="Kilo (kg)" required>

            <input type="number" name="step_goal" placeholder="Günlük adım hedefi" value="10000">

            <button type="submit">Kayıt Ol</button>
        </form>

        <p>Zaten hesabın var mı? <a href="/login">Giriş yap</a></p>
    </div>
</div>

</body>
</html>