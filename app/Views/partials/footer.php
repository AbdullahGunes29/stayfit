<footer class="home-footer">
    <div>
        <h3>Stay Fit</h3>
        <p>Sağlıklı yaşam için geliştirilmiş kişisel takip sistemi.</p>
    </div>

    <div>
        <h3>Menü</h3>
        <a href="/">Ana Sayfa</a>
        <a href="/dashboard">Aktivite</a>
        <a href="/record/list">Plan</a>
    </div>

    <div>
        <h3>Hesap</h3>
        <?php if(session()->get('logged_in')): ?>
            <a href="/profile">Profil</a>
            <a href="/logout">Çıkış Yap</a>
        <?php else: ?>
            <a href="/login">Giriş Yap</a>
            <a href="/register">Kayıt Ol</a>
        <?php endif; ?>
    </div>
</footer>