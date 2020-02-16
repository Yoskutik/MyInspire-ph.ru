<?php

function createStylist($name, $type, $price, $username) {
    return "
        <div class=\"stylist row\">
            <div class=\"col-sm-6\">
                <h2 class=\"stylist__title\">$name</h2>
                <h3 class=\"stylist__subtitle\">$type</h3>
            </div>
            <div class=\"col-sm-6\">
                Цена: <span class=\"stylist__price\">$price</span><br>
                Контакты: <a class=\"stylist__instagram\" href=\"https://www.instagram.com/$username/\" target=\"_blank\">@$username</a>
            </div>
        </div>
    ";
} ?>

<div class="row justify-content-center">
    <div class="col-md-8">

        <p class="intro">
            Это девушки, с которыми я работала на съёмках и за чьи работы я могу быть уверена
            и советовать их Вам как проверенных мастеров.
        </p>

        <?= createStylist('Джетт', 'Макияж', 'от 1000', 'g_hassliebe') ?>

        <?= createStylist('Аня', 'Макияж + прическа', 'полный образ от 2500', 'anya_stylist_spb') ?>

        <?= createStylist('Аня', 'Макияж + прическа', 'полный образ от 3500', 'annsemenenko_makeup') ?>

        <small class="caption">
            * Услуги стилистов и визажистов бронируются и оплачиваются Вами отдельно.
        </small>

    </div>
</div>