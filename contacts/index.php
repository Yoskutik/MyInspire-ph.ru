<?php require_once '../HTML.php' ?>

<!DOCTYPE>
<html lang="ru">
<head>
    <title>MyInspire. Фотограф в Санкт-Петербурге. Контакты.</title>
    <meta name="description" content="
        Атмосферные фото в Санкт-Петербурге от профессионального фотографа.
        Экспресс фотосессия от 2000р. Лавстори, фотопрогулка, студийная
        фотосессия и профессиональная ретушь ваших снимков.">
    <meta name="keywords" content="MyInspire контакты, MyInspire телефон, MyInspire почта">
    <?php include '../assets/elements/head.php' ?>
    <link rel="stylesheet" href="/contacts/contacts.css">
    <script src="/contacts/contacts.js"></script>
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include('../assets/elements/header.php') ?>
<div class="body container">
    <?php include 'contacts.php' ?>
</div>
<?php include '../assets/elements/footer.php' ?>
</body>
</html>