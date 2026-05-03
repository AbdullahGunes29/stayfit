<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Stay Fit' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<?= view('partials/header') ?>

<main>
    <?= $this->renderSection('content') ?>
</main>

<?= view('partials/footer') ?>

<script>
function openDrawer() {
    document.getElementById("drawerMenu").classList.add("active");
}

function closeDrawer() {
    document.getElementById("drawerMenu").classList.remove("active");
}
</script>

<?= $this->renderSection('scripts') ?>

</body>
</html>