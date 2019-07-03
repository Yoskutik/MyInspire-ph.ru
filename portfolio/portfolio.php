<?php
function render($str) {
    $files = glob(__DIR__. "/photos/{$str}/*");
    $total = count($files) / 2;
    preg_match('/\.[a-z]+$/', $files[0], $format);
    $format = $format[0];
    $result = [];
    foreach (range(0, $total - 1) as $i) {
        $result[] = "<img alt=\"{$str} фотография\" class=\"portfolio__{$str}_photo\" src=\"/portfolio/photos/{$str}/${i}-minify{$format}\">";
    }
    shuffle($result);
    $result = implode('', $result);
    return "<div>{$result}</div><div></div><div></div><div></div>";
}
?>

<link rel="stylesheet" href="/portfolio/portfolio.css">
<script src="/assets/js/jquery.touchSwipe.min.js"></script>
<script src="/portfolio/portfolio.js"></script>

<style>
    .portfolio__individual, .portfolio__pair, .portfolio__beauty, .portfolio__retouch {
    <?php
    $link = $_GET['link'];
    if ($link === 'beauty') echo 'transform: translateX(-100%)';
    else if ($link === 'pair') echo 'transform: translateX(-200%)';
    else if ($link === 'retouch') echo 'transform: translateX(-300%)';
    else {
        $link = 'individual';
        echo 'transform: translateX(0)';
    } ?>
    }
</style>

<div class="image-shower" style="display: none">
    <div class="loader">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <span class="paginator-left paginator">
        <img alt="Предыдущее фото" src="/assets/icons/pagination.png" style="transform: rotate(180deg)">
    </span>
    <img alt="Фотография" class="photo" src="">
    <span class="paginator-right paginator">
        <img alt="Следущее фото" src="/assets/icons/pagination.png">
    </span>
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <ul class="navigation nav nav-tabs">
            <li class="nav-item">
                <a class="navigation__individual nav-link <?= $link === 'individual' ? 'active' : '' ?>" style="cursor: pointer">Индивидуальная</a>
            </li>
            <li class="nav-item">
                <a class="navigation__pair nav-link <?= $link === 'pair' ? 'active' : '' ?>" style="cursor: pointer">Парная</a>
            </li>
            <li class="nav-item">
                <a class="navigation__beauty nav-link <?= $link === 'beauty' ? 'active' : '' ?>" style="cursor: pointer">Бьюти</a>
            </li>
            <li class="nav-item">
                <a class="navigation__retouch nav-link <?= $link === 'retouch' ? 'active' : '' ?>" style="cursor: pointer">Ретушь</a>
            </li>
        </ul>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="portfolio">
            <div class="portfolio__container">
                <div class="portfolio__individual">
                    <div class="portfolio__individual_photos">
                        <?= render('individual') ?>
                    </div>
                </div>
                <div class="portfolio__pair">
                    <div class="portfolio__pair_photos">
                        <?= render('pair') ?>
                    </div>
                </div>
                <div class="portfolio__beauty">
                    <div class="portfolio__beauty_photos">
                        <?= render('beauty') ?>
                    </div>
                </div>
                <div class="portfolio__retouch">
                    <div class="portfolio__retouch_photos">
                        <?php
                        $total = count(glob(__DIR__ . "/photos/retouch/*")) / 2;
                        $result = '';
                        foreach (range(0, $total - 1) as $i) {
                            $result .= '<div class="portfolio__retouch_photo"><img alt="Фото до обработки" src="" /><img alt="Фото после обработки" src="" /></div>';
                        }
                        echo $result;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>