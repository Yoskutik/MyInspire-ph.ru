<?php include '../assets/elements/head.php' ?>
<style>
    .photo {
        border: 1px solid #E0E0E0;
        overflow: hidden;
        cursor: pointer;
    }

    .photo img {
        width: 100%;
        height: auto;
        transition-duration: 1s;
        transform: scale(1.1);
    }

    .photo:hover img {
        transform: scale(1.3);
    }

    .block {
        display: flex;
        margin: 0 auto;
        max-width: 880px;
        flex-wrap: wrap;
    }
</style>

<div class="block">
    <div class="photo">
        <img src="photos/individual/0-minify.png">
    </div>
    <div class="photo">
        <img src="photos/individual/1-minify.png">
    </div>
    <div class="photo">
        <img src="photos/individual/2-minify.png">
    </div>
    <div class="photo">
        <img src="photos/individual/3-minify.png">
    </div>
    <div class="photo">
        <img src="photos/individual/4-minify.png">
    </div>
</div>

<script>
    $(window).ready(() => {
        let minSize;
        $(window).on('resize', function() {
            if (innerWidth < 400) minSize = 160;
            else minSize = 200;
            let width = $('.block').width();
            let d = Math.floor(width / minSize);
            let size = width / d;
            $('.photo').each((i, el) => {
                $(el).css({
                    width: size + 'px',
                    height: size + 'px',
                });
            });
        });
        $('.photo img').on('load', () => $(window).trigger('resize'));
    });
</script>