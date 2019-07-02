<!DOCTYPE>
<html lang="ru">
<head>
    <script>console.time('Loaded');</script>
    <title>MyInspire photographer</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Атмосферные фото в Санкт-Петербурге от профессионального фотографа. Экспресс фотосессия от 2000р. Лавстори, фотопрогулка, студийная фотосессия и профессиональная ретушь ваших снимков.">
    <script src="/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/jquery.event.move.js"></script>
    <script src="/assets/js/jquery.twentytwenty.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
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
            <a class="nav-link header__link" href="/"><span>Главная</span></a>
            <a class="nav-link header__link" href="/portfolio/"><span>Портфолио</span></a>
            <a class="nav-link header__link" href="/pricelist/"><span>Цены</span></a>
            <a class="nav-link header__link" href="/contacts/"><span>Контакты</span></a>
        </div>
        <div class="dropdown-menu header__nav">
            <a class="nav-link header__link" href="/"><span>Главная</span></a>
            <a class="nav-link header__link" href="/portfolio/"><span>Портфолио</span></a>
            <a class="nav-link header__link" href="/pricelist/"><span>Цены</span></a>
            <a class="nav-link header__link" href="/contacts/"><span>Контакты</span></a>
        </div>
        <a class="nav-link header__title">MyInspire photographer</a>
    </div>
</header>
<div class="body container">
    <?php
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
        case '/home/':
            include 'home/home.php';
            break;
        case (preg_match('/\/portfolio\/\??.*/', $_SERVER['REQUEST_URI']) ? true : false):
            include 'portfolio/portflio.php';
            break;
        case '/pricelist/':
            include 'pricelist/pricelist.php';
            break;
        case '/pricelist/studio/':
            include 'pricelist/studio/studio.php';
            break;
        case '/contacts/':
            include 'contacts/contacts.php';
            break;
        default:
            echo '<b>File not exist</b>';
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
                        <a onclick="copy('+7(999)512-42-17', 'Telegram', 'Номер телефона был скопирован')"
                           data-id="Telegram" class="count-link" style="cursor: pointer">
                            Telegram
                        </a><br>
                        <a onclick="copy('+7(999)512-42-17', 'WhatsApp', 'Номер телефона был скопирован')"
                           data-id="WhatsApp" class="count-link" style="cursor: pointer">
                            WhatsApp
                        </a><br>
                        <a onclick="copy('tatiana.mix.1910@gmail.com', 'Электронная почта', 'Адрес электронной почты был скопирован в буфер обмена')"
                           style="cursor: pointer" data-id="E-mail" class="count-link">
                            E-mail
                        </a><br>
                        <a target="_blank" href="https://www.pinterest.ru/tatianamix1910/" data-id="Pinterest" class="count-link">
                            Pinterest
                        </a>
                    </div>
                    <span class="footer__copyright">
                            &copy; 2019 MyInspire.com
                        </span>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>