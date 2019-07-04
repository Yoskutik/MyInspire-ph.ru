<link rel="stylesheet" href="/home/home.css">
<script src="/home/home.js"></script>
<script>
    let collageNumber = <?= count(glob(__DIR__ . "/../../home/photos/*")) / 2 ?>;
</script>

<div class="row">
    <div class="collage col-lg-9 col-md-8">
        <div class="collage__block">
            <?php for ($i = 0; $i < 8; $i++) { ?>
                <img alt="Photo" class="small">
            <?php } ?>
        </div>
        <div class="collage__block">
            <?php for ($i = 0; $i < 8; $i++) { ?>
                <img alt="Photo" class="small hidden">
            <?php } ?>
        </div>
        <div class="collage__block">
            <?php
            $r = rand(0, 2);
            for ($i = 0; $i < 3; $i++) {
                if ($i == $r) { ?>
                    <img alt="Photo" class="big" src="/home/photos/8-b.png">
                <?php } else { ?>
                    <img alt="Photo" class="big hidden">
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
                    <h4 class="card-title">Melnikova Tatiana</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Photographer-Retoucher</h6>
                    <p class="card-text">
                        The invididual, beauty, love-story photo shooting and high-end retouch<br>
                        <small>Saint-Petersburg</small>
                    </p>
                    <a href="https://www.instagram.com/myinspire_ph/" class="card-link count-link" data-id="Instagram" target="_blank">
                        <?= HTML::render('instagram.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                    <a href="https://vk.com/inspiredbyspb" class="card-link count-link" target="_blank" data-id="VK">
                        <?= HTML::render('vk.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                    <a class="card-link count-link" style="cursor: pointer" data-id="Telegram"
                       onclick="copy('+7(999)512-42-17', 'WhatsApp', 'Phone number was copied')">
                        <?= HTML::render('whatsapp.svg', ['size' => 35], 'assets/icons') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">About</h2>
</div>
<div class="row justify-content-center">
    <p class="col-lg-5 col-md-6 text-justify">
        Hey. My name is Tatiana and I am a photographer from the beautiful
        city on the Neva river. I have been engaged in photography for as long
        as I remember, but only about two years ago I started taking pictures
        professionally.
    </p>
    <p class="col-lg-5 col-md-6 text-justify">
        I invest 100% of energy in my works. I try to make every person open up,
        working with me, and make him or her have pleasant memories in the form
        of photos from me. <br>
        All my works in high quality can be found <a href="/en/portfolio/">here</a>.
    </p>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Individual photo shooting</h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="individual">
            <p class="individual__description text-justify">
                Take a walk through the most beautiful places of St. Petersburg
                with professional photographer, and get some amazing shots from it.
                Before shooting, we will think over the idea, create an image, choose
                location, and if it's necessary, even make a route of several places
                for shooting.
            </p>
            <img alt="Individual photo" class="individual__photo" src="/home/photos/21.png">
            <img alt="Individual photo" class="individual__photo" src="/home/photos/25-b.png">
            <img alt="Individual photo" class="individual__photo" src="/home/photos/22.png">
            <img alt="Individual photo" class="individual__photo" src="/home/photos/12.png">
            <img alt="Individual photo" class="individual__photo" src="/home/photos/3.png">
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Love-story</h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="pair">
            <p class="pair__description text-justify">
                Love takes no account of time. Years will pass, and you may
                not remain imprinted memories about those times, when you had
                got butterflies in the stomach. To prevent this from happening,
                your most tender and sincere feelings can forever be captured in photos.
            </p>
            <img alt="Love-Story photo" class="pair__photo" src="/portfolio/photos/pair/0.jpg">
            <img alt="Love-Story photo" class="pair__photo" src="/portfolio/photos/pair/1-minify.jpg">
            <img alt="Love-Story photo" class="pair__photo" src="/portfolio/photos/pair/2-minify.jpg">
            <img alt="Love-Story photo" class="pair__photo" src="/portfolio/photos/pair/3-minify.jpg">
            <img alt="Love-Story photo" class="pair__photo" src="/portfolio/photos/pair/4-minify.jpg">
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">Beauty photo shooting</h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="beauty">
            <p class="beauty__description text-justify">
                Have you always wanted to become a top model from the cover
                of glossy magazines? Now you have the opportunity. I'll rent
                a suitable Studio, hire a professional makeup artist who will
                make you an amazing makeover, and do photography and photo editing.
                And you will choose which photos need to be retouched.
            </p>
            <div class="beauty__photo">
                <img alt="Photo before retouch" src="/portfolio/photos/retouch/1.jpg" />
                <img alt="Photo after retouch" src="/portfolio/photos/retouch/1.1.jpg" />
            </div>
            <div class="beauty__photo">
                <img alt="Photo before retouch" src="/portfolio/photos/retouch/8.jpg" />
                <img alt="Photo after retouch" src="/portfolio/photos/retouch/8.1.jpg" />
            </div>
        </div>
    </div>
</div>
<hr class="row">
<div class="row">
    <h2 class="title text-center">For large commercial projects and creativity</h2>
</div>
<div class="row justify-content-center commercial">
    <p class="col-lg-5 col-md-6 text-justify">
        If you have some kind of super-creative idea or a large commercial
        order that goes beyond the usual client shooting or requires other
        conditions of cooperation,
    </p>
    <p class="col-lg-5 col-md-6 text-justify">
        then write me a personal message in any of my social networks or
        e-mail, and we will discuss in more detail the terms of our cooperation
        on the best conditions for you.
    </p>
</div>