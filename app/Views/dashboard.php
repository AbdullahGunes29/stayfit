<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<h2>Stay Fit Panel</h2>

<p>Hoş geldin, <?= session()->get('user_name') ?></p>

<form method="post" action="/record/add" class="mt-4">
    <input class="form-control mb-2" type="number" name="calories" placeholder="Kalori">
    <input class="form-control mb-2" type="number" name="steps" placeholder="Adım">
    <button class="btn btn-success">Kaydet</button>
</form>

<a href="/record/list">Kayıtları Gör</a>

<a href="/logout">Çıkış Yap</a>

<?php
$model = new \App\Models\RecordModel();

$today = $model
    ->where('user_id', session()->get('user_id'))
    ->where('record_date', date('Y-m-d'))
    ->first();

if($today){
    if($today['steps'] >= session()->get('step_goal')){
        echo "<h3 style='color:green'>🔥 Hedefe ulaştın!</h3>";
    } else {
        echo "<h3 style='color:red'>⚠ Hedefe ulaşamadın</h3>";
    }
}
?>

<?php
if($today){
    echo "<p>Adım: ".$today['steps']."</p>";
    echo "<p>Kalori: ".$today['burned_calories']."</p>";
}
?>

<a href="/record/list" class="btn btn-primary mt-3">📊 Grafik Gör</a>