<?php
function createLocation($title, $address, $photos) {
    $address = is_array($address)
        ? "Адрес: <a href=\"{$address['href']}\" target=\"_blank\">{$address['location']}</a>"
        : "Адрес: {$address}";
    $photos = is_array($photos) ? $photos : [$photos];
    $tmp = $photos;
    $photos = '';
    foreach ($tmp as $photo) {
        $photos .= "<img alt=\"$title\" src=\"photos/$photo.jpg\">";
    }
    return "
        <div class=\"show__item\">
            <h2 class=\"show__item_title\">$title</h2>
            <div class=\"show__item_images\">$photos</div>
            <p class=\"show__item_address\">$address</p>
        </div>
    ";
}
?>

<div class="row justify-content-center">
    <div class="col-md-10 col-xl-8 show">
        <?= createLocation(
            'Улица Рубинштейна и Пять углов',
            [
                'href' => 'https://www.google.com/maps/dir/59.9264303,30.3417926/ул.+Рубинштейна,+20,+Санкт-Петербург,+191002/@59.9288464,30.3408668,15.92z/data=!4m9!4m8!1m0!1m5!1m1!1s0x469631a8a64ee0e3:0x69a0174ba0d2c0e!2m2!1d30.3448317!2d59.9300805!3e2',
                'location' => 'м. Владимирская, ул. Рубинштейна'
            ],
            ['ruben_0', 'ruben_1', 'ruben_2']
        ) ?>
        <?= createLocation(
            'Банковский мост, Зингер и Казанский собор',
            [
                'href' => 'https://www.google.com/maps/dir/Олимпиады,+наб.+канала+Грибоедова,+30,+Санкт-Петербург,+191186/59.9348291,30.3261251/Зингеръ,+Невский+проспект,+Санкт-Петербург/@59.9340096,30.3224802,16.5z/',
                'location' => 'м. Невский проспект, наб. Канала Грибоедова'
            ],
            ['lion_bridge_0', 'lion_bridge_1', 'lion_bridge_2']
        ) ?>
        <?= createLocation(
            'Троицкий мост и Заячий остров',
            [
                'href' => 'https://www.google.com/maps/dir/59.951957,30.3222803/59.9544798,30.3224923/59.951102,30.3253072/@59.952533,30.3201983,15.8z',
                'location' => 'м. Горьковская, Заячий о.'
            ],
            ['troi_0', 'troi_1', 'troi_2']
        ) ?>
        <?= createLocation(
            'Эрмитаж и Набережная реки Зимней канавки',
            [
                'href' => 'https://www.google.com/maps/dir/59.942567,30.3166733/Государственный+Эрмитаж,+Дворцовая+пл.,+2,+Санкт-Петербург,+190000/@59.9411066,30.3121558,16z/data=!4m14!4m13!1m5!3m4!1m2!1d30.3100432!2d59.9401089!3s0x46963110b6c71fb7:0x36f0270879e150b2!1m5!1m1!1s0x4696310b32cbe2e9:0x74e032aa0505dfc!2m2!1d30.3145597!2d59.9398317!3e2/',
                'location' => 'м. Адмиралтейская, наб. р. Зимней канавки'
            ],
            ['ermy_0', 'ermy_1', 'ermy_2']
        ) ?>
        <?= createLocation(
            'Исаакиевский собор, Зеркальный дворик и Медный всадник',
            [
                'href' => 'https://www.google.com/maps/dir/Исаакиевский+собор,+Исаакиевская+пл.,+4,+Санкт-Петербург,+190000/Зеркальный+двор,+Почтамтская+ул.,+3,+Санкт-Петербург,+190000/Медный+всадник,+Сенатская+пл.,+Санкт-Петербург,+190000/@59.9345585,30.3015667,16z/data=!4m25!4m24!1m10!1m1!1s0x4696311b867a3a49:0x1db57252b47d25e9!2m2!1d30.306485!2d59.933905!3m4!1m2!1d30.3083476!2d59.9329209!3s0x4696311c9dd71d77:0x253d97ee0beb3e90!1m5!1m1!1s0x4696319f3092f3f3:0x4f4b2ff832358587!2m2!1d30.3038222!2d59.932806!1m5!1m1!1s0x4696311969a2145d:0x72b3cdb5229676ea!2m2!1d30.3022305!2d59.9363783!3e2',
                'location' => 'м. Адмиралтейская, Исаакиевский сквер'
            ],
            ['isaac_0', 'isaac_1', 'isaac_2']
        ) ?>
        <?= createLocation(
            'Новая Голандия',
            [
                'href' => 'https://www.google.com/maps/place/Новая+Голландия/@59.9289984,30.2724904,14z/',
                'location' => 'о. Новая Голандия'
            ],
            ['holl_0', 'holl_1', 'holl_2']
        ) ?>
    </div>
</div>

