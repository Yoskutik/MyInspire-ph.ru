<?php
    $phrases = [
        "Заказать фотосессию", "Фотограф в Санкт-Петербурге",
        "Заказать фотосъёмку", "СПб Фотограф",
        "Заказать портрет", "В обработке",
    ];
    $phrases_length = count($phrases);
?>
<div class="row">
    <div class="collage col-lg-9 col-md-8">
        <img src="/home/photos/1.png">
    </div>
    <div class="col-lg-3 col-md-4" style="padding-right: 0">
        <div class="card info">
            <div class="card-body">
                <div class="avatar">
                    <img alt="Аватар" src="/assets/ava.png">
                </div>
                <div>
                    <!--Не баг, а потенциальная фича ¯\_(ツ)_/¯-->
                    <h2 class="info__subtitle card-title">Мельникова Татьяна</h2>
                    <h1 class="info__title card-subtitle mb-2 text-muted">Фотограф в Санкт-Петербурге</h1>
                    <p class="card-text">
                        Индивидуальные фотосессии и love-story.
                    </p>
                    <a href="https://www.instagram.com/myinspire_ph/" class="card-link count-link"
                       data-id="Instagram" target="_blank" title="Instagram">
                        <?= HTML::render('instagram.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                    <a href="https://vk.com/inspiredbyspb" class="card-link count-link"
                       target="_blank" data-id="VK" title="VK">
                        <?= HTML::render('vk.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                    <a class="card-link count-link" data-id="WhatsApp" href="https://wa.me/79995154217"
                       title="WhatsApp">
                        <?= HTML::render('whatsapp.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h3 class="title text-center">Обо мне</h3>
</div>
<div class="row justify-content-center">
    <p class="col-md-5 text-justify">
        Привет. Меня зовут Таня, и я фотограф из прекрасного города
        Санкт-Петербурга. Фотографией занимаюсь сколько себя помню,
        однако в профессиональное русло это ушло около трех лет
        назад. В свои работы я вкладываюсь на все 100%.
    </p>
    <p class="col-md-5 text-justify">
        Я стараюсь, чтобы каждый человек раскрылся, работая со мной,
        и у него остались приятные воспоминания в виде фотографий от
        меня. <br>
        Со всеми моими работами в высоком разрешении можно ознакомиться
        по <a href="/portfolio/">ссылке</a>.
    </p>
</div>