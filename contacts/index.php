<?php require_once '../HTML.php' ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include '../assets/elements/head.php' ?>
    <title>Мельникова Татьяна. Контакты.</title>
    <meta name="description" content="
        Электронная почта, номер телефона и социальные сети.
        Есть форма обратной связи.">
    <meta name="keywords" content="Фотограф Санкт-Петербург контакты,
        Мельникова Татьяна контакты, Фотограф СПб контакты, Фотограф контакты">
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
<?php include '../assets/elements/yandex.metrica.php' ?>
</body>
</html>