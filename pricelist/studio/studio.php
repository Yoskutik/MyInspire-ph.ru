<?php
function createStudio($name, $contacts, $halls_list) {
    $address = $contacts['address'] ? "Адрес: {$contacts['address']}<br>" : '';
    $phone = $contacts['phone'] ? "Телефон: {$contacts['phone']}<br>" : '';
    $site = $contacts['site'] ? "Сайт: <a href=\"{$contacts['site']['href']}\" target=\"_blank\">{$contacts['site']['name']}</a><br>" : '';
    $halls = '';
    foreach ($halls_list as $hall)
        $halls .= "<li><a target=\"_blank\" href=\"{$hall['href']}\">{$hall['name']}</a></li>";
    return "
        <div class=\"list__item\">
            <div>
                <h1 class=\"list__item_title\">$name</h1>
                <div class=\"list__item_contacts\">
                    <b>Contacts:</b>
                    <p>
                        $address
                        $phone
                        $site
                    </p>
                </div>
            </div>
            <div>
                Halls:
                <ul class=\"list__item_rooms\">
                    $halls
                </ul>
            </div>
        </div>
    ";
}
?>

<div class="row justify-content-center">
    <div class="col-md-10 list">
        <?= createStudio(
            'BEDFORD STUDIO', [
            'address' => ' м. Чернышевская, ул. Кирочная, д. 24',
            'phone' => '+7(812)905-29-56',
            'site' => ['href' => 'https://www.bedford.studio/', 'name' => 'Bedford.studio'],
        ], [
            ['href' => 'https://vk.com/market-80652199?section=album_2&w=product-80652199_2068613%2Fquery', 'name' => 'Studio B'],
            ['href' => 'https://vk.com/market-80652199?section=album_2&w=product-80652199_1704192%2Fquery', 'name' => 'Studio C'],
        ]) ?>
        <?= createStudio(
            'POLYGON Photo Manufactory', [
            'address' => 'м. Площадь Ленина, ул. Михайлова, д. 21, территория завода Арсенал',
            'phone' => '+7(812)777-02-47',
            'site' => ['href' => 'https://www.polygonphoto.ru/', 'name' => 'PolygonPhoto.ru'],
        ], [
            ['href' => 'https://polygonphoto.ru/booking/rooms/apartamenti/', 'name' => 'Апартаменты'],
            ['href' => 'https://polygonphoto.ru/booking/rooms/ring/', 'name' => 'Ринг'],
            ['href' => 'https://polygonphoto.ru/booking/rooms/teksturnyi-zal/', 'name' => 'Текстурный'],
            ['href' => 'https://polygonphoto.ru/booking/rooms/loft/', 'name' => 'Циклорама-лофт'],
        ]) ?>
        <?= createStudio(
            'Pavilion', [
            'address' => 'м. Чкаловская, ул Гатчинская, д. 28, вход №4',
            'phone' => '+7(921)449-59-38',
            'site' => ['href' => 'https://vk.com/pavilionstudio', 'name' => 'PavilionStudio'],
        ], [
            ['href' => 'https://vk.com/market-55344392?w=product-55344392_1873943', 'name' => 'Industry Hall'],
        ]) ?>
        <?= createStudio(
            'Art-place Faktura', [
            'address' => 'м. Василеостровская, ул. Кожевенная, д. 34',
            'site' => ['href' => 'https://vk.com/artplacevo', 'name' => 'ArtPlacevo'],
        ], [
            ['href' => 'https://vk.com/market-133756115?w=product-133756115_1692010', 'name' => 'Манхэттен'],
            ['href' => 'https://vk.com/market-133756115?w=product-133756115_2716816', 'name' => 'Новый'],
            ['href' => 'https://vk.com/market-133756115?w=product-133756115_1765584', 'name' => 'Амстердам'],
        ]) ?>
        <?= createStudio(
            'Liberty Studio', [
            'address' => 'м. Петроградская, ул. Газовая, д. 10',
            'site' => ['href' => 'https://vk.com/studio.liberty', 'name' => 'Studio.Liberty'],
        ], [
            ['href' => 'https://vk.com/market-142411368?w=product-142411368_1021179', 'name' => 'Karl'],
            ['href' => 'https://vk.com/market-142411368?w=product-142411368_934724', 'name' => 'Bella'],
        ]) ?>
        <?= createStudio(
            'ArtPro', [
            'address' => 'м. Чкаловская, ул. Большая Разночинная, д. 24',
            'site' => ['href' => 'https://vk.com/artpro.photo', 'name' => 'ArtPro.photo'],
        ], [
            ['href' => 'https://vk.com/market-139157544?w=product-139157544_1171806%2Fquery', 'name' => 'Зал №1'],
        ]) ?>
        <?= createStudio(
            'Skypoint', [
            'site' => ['href' => 'http://www.skypointstudio.ru', 'name' => 'SkypointStudio.ru'],
        ], [
            ['href' => 'http://skypointstudio.ru/1etazh', 'name' => 'Первый этаж'],
            ['href' => 'http://skypointstudio.ru/greyroom', 'name' => 'Grey Room'],
            ['href' => 'http://skypointstudio.ru/balconyroom', 'name' => 'Balcony Room'],
            ['href' => 'http://skypointstudio.ru/lower', 'name' => 'Нижний'],
        ]) ?>
    </div>
</div>