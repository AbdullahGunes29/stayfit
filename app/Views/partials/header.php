<header class="home-header">
    <a href="/" class="logo">stay<span>fit</span></a>

    <nav class="home-nav">
        <a href="/">Ana Sayfa</a>
        <a href="/dashboard">Aktivite</a>
        <a href="/record/list">Plan</a>
    </nav>

    <div class="hamburger-icon" onclick="openDrawer()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>

<div id="drawerMenu" class="drawer">
    <div class="drawer-content">
        <span class="close-btn" onclick="closeDrawer()">×</span>

        <?php if(session()->get('logged_in')): ?>
            <a href="/">Ana Sayfa</a>
            <a href="/dashboard">Aktivite</a>
            <a href="/record/list">Plan</a>
            <a href="/profile">Profil</a>
            <a href="/logout">Çıkış Yap</a>
        <?php else: ?>
            <a href="/">Ana Sayfa</a>
            <a href="/login">Giriş Yap</a>
            <a href="/register">Kayıt Ol</a>
        <?php endif; ?>
    </div>
</div>