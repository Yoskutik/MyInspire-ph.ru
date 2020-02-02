<?php require_once 'HTML.php' ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include 'assets/elements/head.php' ?>
    <title>Фотограф в Санкт-Петербурге. Мельникова Татьяна.</title>
    <meta name="description" content="
        Атмосферные фото в Санкт-Петербурге от профессионального фотографа.
        Экспресс фотосессия от 3000 ₽. Лавстори, фотопрогулка, студийная
        фотосессия и профессиональная ретушь ваших снимков.">
    <meta name="keywords" content="Фотограф Санкт-Петербург, Мельникова Татьяна, Фотограф СПб, Фотограф">
    <link rel="stylesheet" href="/home/home.css">
<!--    <script src="/home/home.js"></script>-->
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include('assets/elements/header.php') ?>
<div class="body container">
    <?php include 'home/home.php'; ?>
</div>
<?php include 'assets/elements/footer.php' ?>
<?php include 'assets/elements/yandex.metrica.php' ?>
</body>
</html>