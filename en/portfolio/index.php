<?php require_once '../../HTML.php' ?>

<!DOCTYPE>
<html lang="en">
<head>
    <title>MyInspire. St. Petersburg photographer. Portfolio.</title>
    <meta name="description" content="
        Atmospheric photos in St. Petersburg from a professional photographer.
        Express photo shoot from 30€. Love story, photo walk, Studio photo
        shoot and professional retouching of your pictures.">
    <meta name="keywords" content="
        MyInspire portfolio, MyInspire works, MyInspire shoots,
        MyInspire photos, MyInspire love story, MyInspire portrait,
        MyInspire pair, MyInspire retouch">
    <?php include '../../assets/elements/head.php' ?>
    <link rel="stylesheet" href="/portfolio/portfolio.css">
    <script src="/assets/js/jquery.touchSwipe.min.js"></script>
    <script src="/portfolio/portfolio.js"></script>
    <style>
        .portfolio__individual, .portfolio__pair, .portfolio__beauty, .portfolio__retouch {
        <?php
        $link = $_GET['link'];
        if ($link === 'beauty') echo 'transform: translateX(-100%)';
        else if ($link === 'pair') echo 'transform: translateX(-200%)';
        else if ($link === 'retouch') echo 'transform: translateX(-300%)';
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
<?php include '../../assets/elements/header-en.php'  ?>
<div class="body container">
    <?php include 'portfolio.php' ?>
</div>
<?php include '../../assets/elements/footer-en.php' ?>
</body>
</html>