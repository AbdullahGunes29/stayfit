<?php $records = $records ?? []; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Stay Fit | Kayıtlar</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="nav">
    Stay Fit
    <a href="/dashboard">Panel</a>
    <a href="/logout">Çıkış</a>
</div>

<div class="container">

    <div class="card">
        <h2>Günlük Kayıtlarım</h2>

        <table class="table">
            <tr>
                <th>Tarih</th>
                <th>Kalori</th>
                <th>Adım</th>
            </tr>

            <?php foreach($records as $r): ?>
                <tr>
                    <td><?= $r['record_date'] ?></td>
                    <td><?= $r['burned_calories'] ?></td>
                    <td><?= $r['steps'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <br>

    <div class="card">
        <h2>Adım Grafiği</h2>
        <canvas id="stepChart"></canvas>
    </div>

</div>

<script>
const labels = [
    <?php foreach($records as $r): ?>
        "<?= $r['record_date'] ?>",
    <?php endforeach; ?>
];

const steps = [
    <?php foreach($records as $r): ?>
        <?= $r['steps'] ?>,
    <?php endforeach; ?>
];

new Chart(document.getElementById('stepChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Günlük Adım Sayısı',
            data: steps,
            tension: 0.3
        }]
    }
});
</script>

</body>
</html>