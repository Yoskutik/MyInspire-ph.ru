<?php require_once '../../HTML.php' ?>

<!DOCTYPE>
<html lang="ru">
<head>
    <title>MyInspire. St. Petersburg photographer.</title>
    <meta name="description" content="
        Atmospheric photos in St. Petersburg from a professional photographer.
        Express photo shoot from 30€. Love story, photo walk, Studio photo
        shoot and professional retouching of your pictures.">
    <meta name="keywords" content="
        Photographer SBP, Photographer Saint Petersburg, Photo shoot SBP, Photo shoot Saint Petersburg,
        Love story SBP, Love story Saint Petersburg, Portrait SBP, Portrait Saint Petersburg,
        Shooting SBP, Shooting Saint Petersburg, Atmospheric photos">
    <?php include '../../assets/elements/head.php' ?>
    <link rel="stylesheet" href="/home/home.css">
    <script src="/home/home.js"></script>
    <script>
        let collageNumber = <?= count(glob(__DIR__ . "/../../home/photos/*")) / 2 ?>;
    </script>
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include '../../assets/elements/header-en.php'  ?>
<div class="body container">
    <?php include 'home.php' ?>
</div>
<?php include '../../assets/elements/footer-en.php' ?>
</body>
</html>