<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include '../assets/elements/head.php' ?>
    <title>Мельникова Татьяна. Портфолио.</title>
    <meta name="description" content="
        Лавстори, фотопрогулка, студийная фотосессия и профессиональная
        ретушь. Здесь находится мое портфолио.">
    <meta name="keywords" content="Фотограф Санкт-Петербург портфолио,
        Мельникова Татьяна портфолио, Фотограф СПб портфолио, Фотограф портфолио">
    <style>
        .item {
            margin: 5px;
        }
        .photo {
            border: 1px solid #E0E0E0;
            overflow: hidden;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #1a1a1a;
            position: relative;
        }
        .photo img {
            width: 100%;
            height: auto;
            transition-duration: 1s;
            transform: scale(1.1);
        }
        .photo:hover {
            box-shadow: inset 0 35px 20px -10px black;
        }
        .photo:hover img {
            transform: scale(1.3);
            opacity: 0.5;
        }
        .photo:hover .photo__href {
            opacity: 1;
        }
        .photo__href {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            color: #e0e0e0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            font-size: 24px;
        }
        .photo__frame {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            transition-duration: 1s;
        }
        .photo:hover .photo__frame {
            opacity: 0.5;
            box-shadow: inset 0 -35px 20px -10px black;
        }
        .block {
            display: flex;
            margin: 20px auto;
            max-width: 800px;
            flex-wrap: wrap;
        }
        /*@media screen and (max-width: 800px) {*/
        /*    .block {*/
        /*        width: inherit;*/
        /*        max-width: 100%;*/
        /*    }*/
        }
    </style>
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include('../assets/elements/header.php') ?>
<?php
function createItem($title, $style = []) {
    return "
        <div class='item'>
            <div class='photo' data-href='$title/'>
                <img alt='$title' src='photos/$title.png' style='margin-top: {$style['margin-top']}'>
                <div class='photo__frame'></div>
                <a class='photo__href'>$title</a>
            </div>
        </div>
    ";
}
?>
<div class="block">
    <?= createItem('Daria') ?>
    <?= createItem('Dasha') ?>
    <?= createItem('Julia', ['margin-top' => '-20px;']) ?>
    <?= createItem('Kristina', ['margin-top' => '100px']) ?>
    <?= createItem('Mark') ?>
</div>
<?php include '../assets/elements/footer.php' ?>
<?php include '../assets/elements/yandex.metrica.php' ?>
<script>
    $(window).ready(() => {
        let minSize;
        $(window).on('resize', function() {
            let perRow = innerWidth < 580 ? 2 : 3;
            let width = $('.block').width();
            let size = width / perRow;
            $('.photo').each((i, el) => {
                let margin = 2 * parseInt($(el).parent().css('margin-left'));
                $(el).css({
                    width: size - margin + 'px',
                    height: size - margin + 'px',
                });
                $(el).parent().css({
                    width: size - margin + 'px',
                    height: size - margin + 'px',
                });
            });
        }).trigger('resize').trigger('resize');
        $('.photo img').on('load', () => $(widnow).trigger('resize'));
        $('.photo').on('click', function() {
            location.href = this.dataset.href;
        })
    });
</script>
</body>
</html>