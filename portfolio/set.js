$(window).ready(() => {
    let minSize;
    $(window).on('resize', function() {
        if (innerWidth < 510) minSize = 160;
        else minSize = 230;
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

    $('.photo img').on('load', function() {
        if (this.scrollHeight < this.scrollWidth)
            $(this).css({
                height: '100%',
                width: 'auto',
            });
        $(window).trigger('resize');
    });

    $('.photo').on('click', function() {
        $('.image-shower')
            .show()
            .data('index', $(this).index())
            .find('.image')
            .attr('src', $(this).find('img').attr('src').replace(/m\.png$/, '.png'));
        location.hash = 'show';
    });

    const photos = $('.photo');
    $('.image-shower .paginator-left').on('click', function() {
        let parent = $(this).parent();
        parent.data('index', (parent.data('index') - 1 + photos.length) % photos.length);
        $('.image-shower .image')
            .attr('src', '')
            .attr('src', $('.photo').eq(parent.data('index')).find('img').attr('src').replace(/m\.png$/, '.png'));
    });

    $('.image-shower .paginator-right').on('click', function() {
        let parent = $(this).parent();
        parent.data('index', (parent.data('index') + 1 + photos.length) % photos.length);
        $('.image-shower .image')
            .attr('src', '')
            .attr('src', $('.photo').eq(parent.data('index')).find('img').attr('src').replace(/m\.png$/, '.png'));
    });

    $('.image-shower .image').on('click', e => {
        let left = $('.image-shower .image').offset().left;
        let width = $('.image-shower .image').width();
        if (e.clientX < left + width / 2)
            $('.image-shower .paginator-left').trigger('click');
        else
            $('.image-shower .paginator-right').trigger('click');
    });

    $('.image-shower .close').on('click', e => window.history.back());

    $('.image-shower')
        .swipe({
            swipe: (e, direction) => {
                if (!$('.image-shower').is(':visible')) return;
                switch (direction){
                    case 'left':
                        $('.image-shower .paginator-right').trigger('click');
                        break;
                    case 'right':
                        $('.image-shower .paginator-left').trigger('click');
                        break;
                    case 'up':
                        window.history.back();
                        break;
                    case 'down':
                        document.location.reload();
                        break;
                }
            }
        })
        .on('mousedown', function (e) {
            $('.image-shower').on('mouseup mousemove', function handler(e) {
                if (e.type === 'mouseup' && $(e.target).hasClass('loader'))
                    window.history.back();
                $('.image-shower').off('mouseup mousemove', handler);
            });
        });

    $(window)
        .on('keyup', e => {
            let el = $('.image-shower');
            if (![27, 37, 39].includes(e.keyCode)) return;
            if (!el.is(':visible')) return;
            el.find('.image').attr('src', '');
            switch (e.keyCode){
                case 27:
                    window.history.back();
                    break;
                case 39:
                    $('.image-shower .paginator-right').trigger('click');
                    break;
                case 37:
                    $('.image-shower .paginator-left').trigger('click');
                    break;
            }
        })
        .on('popstate', () => {
            if (!$('.image-shower').is(':visible')) return;
            if (location.hash === '')
                $('.image-shower').hide().find('.image').attr('src', '');
        });
});