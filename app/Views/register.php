<h2>Kayıt Ol</h2>

<form method="post" action="/register">
    <input type="text" name="first_name" placeholder="Ad" required><br><br>
    <input type="text" name="last_name" placeholder="Soyad" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Şifre" required><br><br>

    <select name="gender" required>
        <option value="">Cinsiyet Seç</option>
        <option value="male">Erkek</option>
        <option value="female">Kadın</option>
    </select><br><br>

    <input type="number" name="age" placeholder="Yaş" required><br><br>
    <input type="number" step="0.01" name="height" placeholder="Boy cm" required><br><br>
    <input type="number" step="0.01" name="weight" placeholder="Kilo kg" required><br><br>
    <input type="number" name="step_goal" placeholder="Günlük adım hedefi" value="10000"><br><br>

    <button type="submit">Kayıt Ol</button>
</form>

<a href="/login">Zaten hesabım var</a>