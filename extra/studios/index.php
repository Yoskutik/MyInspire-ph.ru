<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include '../../assets/elements/head.php' ?>
    <title>Проверенные студии</title>
    <link rel="stylesheet" href="/extra/studios/studio.css">
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include('../../assets/elements/header.php') ?>
<div class="body container">
    <?php include 'studios.php' ?>
</div>
<?php include '../../assets/elements/footer.php' ?>
<?php include '../../assets/elements/yandex.metrica.php' ?>
<script src="studios.js"></script>
</body>
</html>