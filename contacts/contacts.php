<link rel="stylesheet" href="/contacts/contacts.css">
<script src="/contacts/contacts.js"></script>

<div class="row">
    <h3 class="col-md-12 text-center intro__title">О записи на съёмку</h3>
</div>
<div class="row justify-content-center intro__text">
    <p class="col-md-5 text-justify">
        Если вы ознакомились со всеми ценами, прочли условия и осознали,
        что я - именно тот, кого Вы так давно искали, то скорее пишите мне
        в удобной Вам социальной сети и мы с Вами обсудим все детали.
    </p>
    <p class="col-md-5 text-justify">
        P. S. У меня не всегда бывает возможность моментально отвечать. Обычно
        ответ занимает не больше суток. Прошу отнестись к этому с пониманием.
    </p>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <hr>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-9 col-md-12 row contacts">
        <div class="col-md-6 contacts__column">
            <h4 class="">Контакты</h4>
            <p>
                <b>Свяжитесь со мной:</b><br>
                E-mail: tatiana.mix.1910@gmail.com
                <img alt="Копировать" class="copy count-link" src="/assets/icons/copy.png" width="16" data-id="E-mail"
                     onclick="copy('tatiana.mix.1910@gmail.com', 'Электронная почта', 'Адрес электронной почты был скопирован')"><br>
                Телефон: +7(999)515-42-17
                <img alt="Копировать" class="copy count-link" src="/assets/icons/copy.png" width="16" data-id="Phone"
                     onclick="copy('+7(999)515-42-17', 'Телефон', 'Номер телефона был скопирован')"><br>
                Для связи в WhatsApp, Telegram
            </p>
            <p><b>Социальные сети:</b></p>
            <div class="contacts__links">
                <a href="https://www.instagram.com/myinspire_ph/" target="_blank" data-id="Instagram" class="count-link">
                    <?= HTML::render('instagram.svg', ['size' => 35, 'className' => 'contacts__link'], 'assets/icons') ?>
                </a>
                <a href="https://vk.com/inspiredbyspb" target="_blank" data-id="VK" class="count-link">
                    <?= HTML::render('vk.svg', ['size' => 35, 'className' => 'contacts__link'], 'assets/icons') ?>
                </a>
                <a href="https://www.pinterest.ru/tatianamix1910/" target="_blank" data-id="Pinterest" class="count-link">
                    <?= HTML::render('pinterest.svg', ['size' => 35, 'className' => 'contacts__link'], 'assets/icons') ?>
                </a>
            </div>
        </div>
        <div class="col-md-6 contacts__column">
            <h4>
                Прямая связь
                <div class="loader">
                    <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </h4>
            <form class="contacts__message">
                <div class="contacts__message_field">
                    <div>
                        <input class="contacts__message_input" name="name" type="text" placeholder="Ваше имя:">
                    </div>
                </div>
                <div class="contacts__message_field">
                    <div>
                        <input class="contacts__message_input" name="email" type="email" placeholder="E-mail:">
                    </div>
                </div>
                <div class="contacts__message_field">
                    <div>
                        <input class="contacts__message_input" name="subject" type="text" placeholder="Тема:">
                    </div>
                </div>
                <div class="contacts__message_field">
                    <div>
                        <textarea class="contacts__message_input" rows="6" name="body" placeholder="Сообщение:"></textarea>
                    </div>
                </div>
                <input type="submit" value="Отправить" class="contacts__message_submit count-link" data-id="E-mail">
                <p class="contacts__message_error empty text-danger">* Перед отправкой заполните, пожалуйста, все поля</p>
                <p class="contacts__message_error email text-danger">* Адрес электронной почты недействителен</p>
            </form>
        </div>
    </div>
</div>