<?php require_once '../../HTML.php' ?>

<!DOCTYPE>
<html lang="en">
<head>
    <title>MyInspire. St. Petersburg photographer. Pricelist.</title>
    <meta name="description" content="
        Atmospheric photos in St. Petersburg from a professional photographer.
        Express photo shoot from 30€. Love story, photo walk, Studio photo
        shoot and professional retouching of your pictures.">
    <meta name="keywords" content="
        MyInspire price, MyInspire services, MyInspire pricelist,
        Photographer services">
    <?php include '../../assets/elements/head.php' ?>
    <link rel="stylesheet" href="/pricelist/pricelist.css">
    <script src="/pricelist/pricelist.js"></script>
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include '../../assets/elements/header-en.php'  ?>
<div class="body container">
    <?php include 'pricelist.php' ?>
</div>
<?php include '../../assets/elements/footer-en.php' ?>
</body>
</html>