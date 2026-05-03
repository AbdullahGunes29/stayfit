<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$todayCalories = $todayCalories ?? 0;
$todaySteps    = $todaySteps ?? 0;
$goal          = $goal ?? 10000;

$percentage = 0;
if ($goal > 0) {
    $percentage = min(100, round(($todaySteps / $goal) * 100));
}
?>

<div class="panel-wrapper">

    <h2>Hoş geldin, <?= session()->get('user_name') ?></h2>

    <div class="dashboard-two-column">

        <!-- SOL: FORM -->
        <div class="card">
            <h3>Bugünkü kalori ve adım sayını gir</h3>

            <form method="post" action="/record/add">
                <input type="number" name="calories" placeholder="Kalori" required>
                <input type="number" name="steps" placeholder="Adım sayısı" required>

                <button type="submit">Kaydet</button>
            </form>
        </div>

        <!-- SAĞ: PROGRESS -->
        <div class="card">
            <h3>Hedef Durumu</h3>

            <p><?= $todaySteps ?> / <?= $goal ?> adım</p>

            <div class="progress-bg">
                <div class="progress-fill" style="width: <?= $percentage ?>%;">
                    %<?= $percentage ?>
                </div>
            </div>

            <?php if($todaySteps >= $goal): ?>
                <p class="success">Hedefe ulaştın</p>
            <?php else: ?>
                <p class="warning">Hedefe ulaşmak için devam et</p>
            <?php endif; ?>
        </div>

    </div>

</div>

<?= $this->endSection() ?>