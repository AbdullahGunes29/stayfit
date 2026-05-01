<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Stay Fit | Panel</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="nav">
    Hoş geldin, <?= session()->get('user_name') ?>
    <a href="/record/list">Kayıtlar</a>
    <a href="/logout">Çıkış</a>
</div>

<div class="container">

    <div class="card">
        <h2>Günlük Veri Gir</h2>

        <form method="post" action="/record/add">
            <input type="number" name="calories" placeholder="Kalori" required>
            <input type="number" name="steps" placeholder="Adım" required>

            <button type="submit">Kaydet</button>
        </form>
    </div>

    <br>

    <!-- BUGÜN DURUM -->
    <div class="card">
        <h2>Bugünkü Durum</h2>

        <?php
        $model = new \App\Models\RecordModel();

        $today = $model
            ->where('user_id', session()->get('user_id'))
            ->where('record_date', date('Y-m-d'))
            ->first();

        if($today):
        ?>

            <p>Kalori: <?= $today['burned_calories'] ?></p>
            <p>Adım: <?= $today['steps'] ?></p>

            <?php if($today['steps'] >= session()->get('step_goal')): ?>
                <p class="success">🔥 Hedefe ulaştın!</p>
            <?php else: ?>
                <p class="warning">⚠ Hedefe ulaşamadın</p>
            <?php endif; ?>

        <?php else: ?>
            <p>Bugün henüz veri girilmedi</p>
        <?php endif; ?>

    </div>

    <br>

    <!-- BUTON -->
    <a href="/record/list" class="btn">📊 Tüm Kayıtları Gör</a>

</div>

</body>
</html>