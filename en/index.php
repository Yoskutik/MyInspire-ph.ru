<?php require_once(__DIR__ .'/../HTML.php') ?>

<!DOCTYPE>
<html lang="en">
<head>
    <script>console.time('Loaded');</script>
    <title>MyInspire photographer</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Atmospheric photos in St. Petersburg from a professional photographer. Express photo shoot from 30€. Love story, photo walk, Studio photo shoot and professional retouching of your pictures.">
    <script src="/assets/js/jquery-3.4.1.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/jquery.event.move.js"></script>
    <script src="/assets/js/jquery.twentytwenty.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/common.js"></script>
    <link rel="stylesheet" href="/assets/styles/common.css">
    <link rel="stylesheet" href="/assets/styles/twentytwenty.css">
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<header class="header">
    <div class="container">
        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i></i><i></i><i></i><i></i><i></i>
        </button>
        <div class="nav header__nav">
            <a class="nav-link header__link" href="/en/"><span>Main</span></a>
            <a class="nav-link header__link" href="/en/portfolio/"><span>Portfolio</span></a>
            <a class="nav-link header__link" href="/en/pricelist/"><span>Pricelist</span></a>
            <a class="nav-link header__link" href="/en/contacts/"><span>Contacts</span></a>
        </div>
        <div class="dropdown-menu header__nav">
            <a class="nav-link header__link" href="/en/"><span>Main</span></a>
            <a class="nav-link header__link" href="/en/portfolio/"><span>Portfolio</span></a>
            <a class="nav-link header__link" href="/en/pricelist/"><span>Pricelist</span></a>
            <a class="nav-link header__link" href="/en/contacts/"><span>Contacts</span></a>
        </div>
        <a class="nav-link header__title">MyInspire photographer</a>
    </div>
</header>
<div class="body container">
    <?php
    switch ($_SERVER['REQUEST_URI']) {
        case '/en/':
        case '/en/home/':
            include 'home/home.php';
            break;
        case (preg_match('/^\/en\/portfolio\/\??.*/', $_SERVER['REQUEST_URI']) ? true : false):
            include 'portfolio/portfolio.php';
            break;
        case '/en/pricelist/':
            include 'pricelist/pricelist.php';
            break;
        case '/en/pricelist/studio/':
            include 'pricelist/studio/studio.php';
            break;
        case '/en/contacts/':
            include 'contacts/contacts.php';
            break;
        default:
            include 'fileNotFound.php';
            break;
    }
    ?>
</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="footer__main col-md-9">
                    <div class="footer__block">
                        <h1>Icons</h1>
                        By <a href="https://www.freepik.com/" title="Freepik">Freepik</a><br>
                        From <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a><br>
                        Licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
                    </div>
                    <div class="footer__block">
                        <h1>Developer</h1>
                        <a href="https://www.github.com/yoskutik" target="_blank">Yoskutik</a><br><br>
                        <h1>Language</h1>
                        <a href="/">Русский</a><br>
                        <a href="/en/">English</a>
                    </div>
                    <div class="footer__block near">
                        <h1>Contacts</h1>
                        <a target="_blank" href="https://www.instagram.com/myinspire_ph/" data-id="Instagram" class="count-link">
                            Instagram
                        </a><br>
                        <a target="_blank" href="https://vk.com/inspiredbyspb" data-id="VK" class="count-link">
                            VK
                        </a><br>
                        <a href="https://telegramm.online/#/im?p=u715237458_9117853563131773346" data-id="Telegram" class="count-link">
                            Telegram
                        </a><br>
                        <a href="https://wa.me/79995154217" data-id="WhatsApp" class="count-link">
                            WhatsApp
                        </a><br>
                        <a onclick="copy('tatiana.mix.1910@gmail.com', 'Email', 'The email address was copied')"
                           style="cursor: pointer" data-id="E-mail" class="count-link">
                            E-mail
                        </a><br>
                        <a target="_blank" href="https://www.pinterest.ru/tatianamix1910/" data-id="Pinterest" class="count-link">
                            Pinterest
                        </a>
                    </div>
                    <span class="footer__copyright">
                        &copy; <?= date('Y') ?> MyInspire-ph.ru
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>