<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="panel-wrapper">

    <h2>Aktivite Planı</h2>

    <div class="filter-box">
        <form method="get" action="/record/list">
            <select name="filter" onchange="this.form.submit()">
                <option value="weekly" <?= ($filter ?? '') == 'weekly' ? 'selected' : '' ?>>Haftalık</option>
                <option value="monthly" <?= ($filter ?? '') == 'monthly' ? 'selected' : '' ?>>Aylık</option>
            </select>
        </form>
    </div>

    <div class="plan-grid">

        <div class="card">
            <h3>Adım Grafiği</h3>
            <canvas id="stepChart"></canvas>
        </div>

        <div class="card">
            <h3>Kalori Grafiği</h3>
            <canvas id="calorieChart"></canvas>
        </div>

    </div>

    <div class="records-card">
        <table class="table">
            <tr>
                <th class="date-col">Tarih</th>
                <th>Kalori</th>
                <th>Adım</th>
            </tr>

            <?php if(!empty($records)): ?>
                <?php foreach($records as $r): ?>
                    <tr>
                        <td class="date-col"><?= $r['record_date'] ?></td>
                        <td><?= $r['burned_calories'] ?></td>
                        <td><?= $r['steps'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Kayıt bulunamadı</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = <?= json_encode(array_column($records ?? [], 'record_date')) ?>;
const steps = <?= json_encode(array_column($records ?? [], 'steps')) ?>;
const calories = <?= json_encode(array_column($records ?? [], 'burned_calories')) ?>;

new Chart(document.getElementById('stepChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Adım Sayısı',
            data: steps,
            borderWidth: 2,
            tension: 0.35
        }]
    }
});

new Chart(document.getElementById('calorieChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Yakılan Kalori',
            data: calories,
            borderWidth: 1
        }]
    }
});
</script>

<?= $this->endSection() ?>