<link rel="stylesheet" href="/contacts/contacts.css">
<script src="/contacts/contacts.js"></script>

<div class="row">
    <h3 class="col-md-12 text-center intro__title">About recording</h3>
</div>
<div class="row justify-content-center intro__text">
    <p class="col-md-5 text-justify">
        If you are familiar with all the prices, read the terms and
        conditions and realized that I am the one you have been looking for,
        then rather write to me in a any convenient social network and we
        will discuss all the details.
    </p>
    <p class="col-md-5 text-justify">
        P. S. I do not always have the opportunity to respond instantly.
        Usually the answer takes no more than a day. Please treat this with understanding.
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
            <h4 class="">Contacts</h4>
            <p>
                <b>Contact me:</b><br>
                E-mail: <a href="mailto:tatiana@myinspire-ph.ru" class="count-link" data-id="E-mail">tatiana@myinspire-ph.ru</a>
                <img alt="Copy" class="copy count-link" src="/assets/icons/copy.png" width="16" data-id="E-mail"
                     onclick="copy('tatiana@myinspire-ph.ru', 'E-mail', 'The email address was copied')"><br>
                Phone: <a href="tel:+7(999)515-42-17" class="count-link" data-id="Phone">+7(999)515-42-17</a>
                <img alt="Copy" class="copy count-link" src="/assets/icons/copy.png" width="16" data-id="Phone"
                     onclick="copy('+7(999)515-42-17', 'Phone', 'The phone number was copied')"><br>
                For communication in WhatsApp, Telegram
            </p>
            <p><b>Social networks:</b></p>
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
                Direct connection
                <div class="loader">
                    <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </h4>
            <form class="contacts__message">
                <div class="contacts__message_field">
                    <div>
                        <input class="contacts__message_input" name="name" type="text" placeholder="Your name:">
                    </div>
                </div>
                <div class="contacts__message_field">
                    <div>
                        <input class="contacts__message_input" name="email" type="email" placeholder="E-mail:">
                    </div>
                </div>
                <div class="contacts__message_field">
                    <div>
                        <input class="contacts__message_input" name="subject" type="text" placeholder="Subject:">
                    </div>
                </div>
                <div class="contacts__message_field">
                    <div>
                        <textarea class="contacts__message_input" rows="6" name="body" placeholder="Message:"></textarea>
                    </div>
                </div>
                <input type="submit" value="Send" class="contacts__message_submit count-link" data-id="E-mail">
                <p class="contacts__message_error empty text-danger">* Please fill in all fields before sending</p>
                <p class="contacts__message_error email text-danger">* Email address is not valid</p>
            </form>
        </div>
    </div>
</div>