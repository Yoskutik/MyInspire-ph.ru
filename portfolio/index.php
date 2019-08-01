<!DOCTYPE>
<html lang="ru">
<head>
    <title>MyInspire. Фотограф в Санкт-Петербурге. Портфолио.</title>
    <meta name="description" content="
        Атмосферные фото в Санкт-Петербурге от профессионального фотографа.
        Экспресс фотосессия от 2000р. Лавстори, фотопрогулка, студийная
        фотосессия и профессиональная ретушь ваших снимков.">
    <meta name="keywords" content="
        MyInspire портфолио, MyInspire работы, MyInspire фотографии,
        MyInspire фото, MyInspire love story, MyInspire индивидуальная,
        MyInspire парная, MyInspire ретушь">
    <?php include '../assets/elements/head.php' ?>
    <link rel="stylesheet" href="/portfolio/portfolio.css">
    <script src="/assets/js/jquery.touchSwipe.min.js"></script>
    <script src="/portfolio/portfolio.js"></script>
    <style>
        .portfolio__individual, .portfolio__pair, .portfolio__beauty, .portfolio__retouch {
        <?php
        $link = $_GET['link'];
        if ($link === 'beauty')
            echo 'transform: translateX(-100%)';
        else if ($link === 'pair')
            echo 'transform: translateX(-200%)';
        else if ($link === 'retouch')
            echo 'transform: translateX(-300%)';
        else {
            $link = 'individual';
            echo 'transform: translateX(0)';
        } ?>
        }
    </style>
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include('../assets/elements/header.php') ?>
<div class="body container">
    <?php include 'portfolio.php' ?>
</div>
<?php include '../assets/elements/footer.php' ?>
</body>
</html>