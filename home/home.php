<link rel="stylesheet" href="/home/home.css">
<script src="/home/home.js"></script>
<script>
    let collageNumber = <?= count(glob(__DIR__. "/photos/*")) / 2 ?>;
</script>

<div class="row">
    <div class="collage col-lg-9 col-md-8">
        <div class="collage__block">
            <?php for ($i = 0; $i < 8; $i++) { ?>
                <img alt="Фотография" class="small">
            <?php } ?>
        </div>
        <div class="collage__block">
            <?php for ($i = 0; $i < 8; $i++) { ?>
                <img alt="Фотография" class="small hidden">
            <?php } ?>
        </div>
        <div class="collage__block">
            <?php
            $r = rand(0, 2);
            for ($i = 0; $i < 3; $i++) {
                if ($i == $r) { ?>
                    <img alt="Фотография" class="big" src="/home/photos/8-b.png">
                <?php } else { ?>
                    <img alt="Фотография" class="big hidden">
                <?php }
            } ?>
        </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="card info">
            <div class="card-body">
                <div class="avatar">
                    <img alt="Avatar" src="/assets/ava.jpg">
                </div>
                <div>
                    <h4 class="card-title">Мельникова Татьяна</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Фотограф-ретушер</h6>
                    <p class="card-text">
                        Индивидуальные съёмки, бьюти съёмки, love-story и high-end ретушь.<br>
                        <small>г. Санкт-Петербург</small>
                    </p>
                    <a href="https://www.instagram.com/myinspire_ph/" class="card-link count-link" data-id="Instagram" target="_blank">
                        <?= HTML::render('instagram.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                    <a href="https://vk.com/inspiredbyspb" class="card-link count-link" target="_blank" data-id="VK">
                        <?= HTML::render('vk.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                    <a class="card-link count-link" style="cursor: pointer" data-id="Telegram"
                       onclick="copy('+7(999)512-42-17', 'WhatsApp', 'Номер телефона был скопирован')">
                        <?= HTML::render('whatsapp.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Обо мне</h2>
</div>
<div class="row justify-content-center">
    <p class="col-md-5 text-justify">
        Привет. Меня зовут Таня, и я фотограф из прекрасного города
        на Неве. Фотографией занимаюсь сколько себя помню, однако в
        профессиональное русло это ушло около полутора лет назад. В
        свои работы я вкладываюсь на все 100%.
    </p>
    <p class="col-md-5 text-justify">
        Я стараюсь, чтобы каждый человек раскрылся, работая со мной, и у
        него остались приятные воспоминания в виде фотографий от меня. <br>
        Со всеми моими работами в высоком разрешении можно ознакомиться
        по <a href="/portfolio/">ссылке</a>.
    </p>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Индивидуальная съёмка</h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="individual">
            <p class="individual__description text-justify">
                Если Вы давно хотели тотально обновить свои фото в социальных
                сетях или просто побаловать себя и хорошо провести время, то
                индивидуальная съёмка для этого подойдёт как нельзя лучше. До
                съёмки мы продумаем идею, подберём образ, локацию, и если
                необходимо, то даже составим маршрут из нескольких мест для съёмок.
            </p>
            <img alt="Индивидуальная фотография" class="individual__photo" src="/home/photos/21.png">
            <img alt="Индивидуальная фотография" class="individual__photo" src="/home/photos/25-b.png">
            <img alt="Индивидуальная фотография" class="individual__photo" src="/home/photos/22.png">
            <img alt="Индивидуальная фотография" class="individual__photo" src="/home/photos/12.png">
            <img alt="Индивидуальная фотография" class="individual__photo" src="/home/photos/3.png">
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Парная съемка</h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="pair">
            <p class="pair__description text-justify">
                Влюблённые часов не наблюдают, и вы не успеете обернуться,
                как пройдут года, а у вас не останется никаких воспоминаний
                о том, как здорово было когда-то. Чтобы такого не случилось,
                ваши самые нежные и искренние чувства можно навсегда
                запечатлеть на фотографии.
            </p>
            <img alt="Парная фотография" class="pair__photo" src="/portfolio/photos/pair/0.jpg">
            <img alt="Парная фотография" class="pair__photo" src="/portfolio/photos/pair/1-minify.jpg">
            <img alt="Парная фотография" class="pair__photo" src="/portfolio/photos/pair/2-minify.jpg">
            <img alt="Парная фотография" class="pair__photo" src="/portfolio/photos/pair/3-minify.jpg">
            <img alt="Парная фотография" class="pair__photo" src="/portfolio/photos/pair/4-minify.jpg">
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Beauty съёмка</h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="beauty">
            <p class="beauty__description text-justify">
                Если Вы хотите примерить на себя роль настоящей модели из
                глянцевых журналов, то бьюти-съёмка — это определённо то,
                что Вам нужно. С меня аренда подходящей студии, поиск
                профессионального визажиста, который сделает Вам потрясающие
                макияж и укладку, а также съёмка и редактирование фотографий.
            </p>
            <div class="beauty__photo">
                <img alt="Фото до ретуши" src="/portfolio/photos/retouch/1.jpg" />
                <img alt="Фото после ретуши" src="/portfolio/photos/retouch/1.1.jpg" />
            </div>
            <div class="beauty__photo">
                <img alt="Фото до ретуши" src="/portfolio/photos/retouch/8.jpg" />
                <img alt="Фото после ретуши" src="/portfolio/photos/retouch/8.1.jpg" />
            </div>
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Для крупных коммерческих проектов и творчества</h2>
</div>
<div class="row justify-content-center commercial">
    <p class="col-md-5 text-justify">
        Если у Вас есть какая-то супер-креативная задумка или большой
        коммерческий заказ, который выходит за рамки обычных клиентских
        съёмок или требует иных условий сотрудничества,
    </p>
    <p class="col-md-5 text-justify">
        то напишите мне в личные сообщения в любую из моих социальных
        сетей или на почту, и мы подробнее обсудим условия нашего сотрудничества
        на оптимальных для Вас условиях.
    </p>
</div>