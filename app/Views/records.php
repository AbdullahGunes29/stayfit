<?php $records = $records ?? []; ?>

<h2>Kayıtlarım</h2>

<table border="1">
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="myChart"></canvas>

<script>
const labels = [
<?php foreach($records as $r): ?>
'<?= $r['record_date'] ?>',
<?php endforeach; ?>
];

const data = [
<?php foreach($records as $r): ?>
<?= $r['steps'] ?>,
<?php endforeach; ?>
];

new Chart(document.getElementById('myChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Adım Sayısı',
            data: data
        }]
    }
});
</script>