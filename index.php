<?php require_once 'HTML.php' ?>

<!DOCTYPE>
<html lang="ru">
<head>
    <title>Фотограф в Санкт-Петербурге. Мельникова Татьяна.</title>
    <meta name="description" content="
        Атмосферные фото в Санкт-Петербурге от профессионального фотографа.
        Экспресс фотосессия от 3000 ₽. Лавстори, фотопрогулка, студийная
        фотосессия и профессиональная ретушь ваших снимков.">
    <meta name="keywords" content="Фотограф Санкт-Петербург, Мельникова Татьяна, Фотограф СПБ, Фотограф">
    <?php include 'assets/elements/head.php' ?>
    <link rel="stylesheet" href="/home/home.css">
    <script>
        let collageNumber = <?= count(glob(__DIR__. "/home/photos/*")) / 2 ?>;
    </script>
    <script src="/home/home.js"></script>
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include('assets/elements/header.php') ?>
<div class="body container">
    <?php
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
        case '/home/':
            include 'home/home.php';
            break;
        default:
            include 'fileNotFound.php';
            break;
    } ?>
</div>
<?php include 'assets/elements/footer.php' ?>
<?php include 'assets/elements/yandex.metrica.php' ?>
</body>
</html>