$(window).ready(() => {
    let showedImageInd = 0;
    let showedImageType = '';

    $('.portfolio__main_photos div').each((i, el) => {
        $(el).find('.portfolio__main_photo').each((j, ph) => $(ph).attr('data-index', i + 4*j));
    });

    $(window).trigger('resize');

    $('.nav-tabs .nav-link').on('click', e => {
       $('.nav-tabs .nav-link.active').removeClass('active');
       $(e.target).addClass('active');
    });

    $('.navigation__main').on('click', () => {
       $('.portfolio__beauty, .portfolio__main').css('transform', 'translateX(0)');
       let height = $('.portfolio__main_photos').css('height').replace('px', '');
       let padding = $('.portfolio__main').css('padding').replace('px', '');
       $('.portfolio__container').css('max-height', `${parseInt(height) + parseInt(padding) * 2}px`);
    });

    $('.navigation__beauty').on('click', () => {
        $('.portfolio__beauty, .portfolio__main').css('transform', 'translateX(-100%)');
        let height = $('.portfolio__beauty_photos').css('height').replace('px', '');
        let padding = $('.portfolio__beauty').css('padding').replace('px', '');
        $('.portfolio__container').css('max-height', `${parseInt(height) + parseInt(padding) * 2}px`);
    });

    sleep(300).then(() => $('.nav-link.active').click());

    $('.portfolio__main_photo').on('click', e => {
        $('.image-shower')
            .show()
            .find('.photo')
            .attr('src', e.target.src.replace('-minify', ''));
        showedImageInd = $(e.target).data('index');
        showedImageType = 'asd';
        location.hash = 'show';
    });

    $('.image-shower .paginator-left').on('click', () => {
        $('.image-shower .photo')
            .attr('src', '')
            .attr(
            'src',
            $(`.portfolio__main_photo[data-index=${($('.portfolio__main_photo').length + --showedImageInd) % $('.portfolio__main_photo').length}]`)
                .attr('src').replace('-minify', '')
        );
    });

    $('.image-shower .paginator-right').on('click', () => {
        $('.image-shower .photo')
            .attr('src', '')
            .attr(
            'src',
            $(`.portfolio__main_photo[data-index=${++showedImageInd % $('.portfolio__main_photo').length}]`)
                .attr('src').replace('-minify', '')
        );
    });

    $('.image-shower .photo').on('click', e => {
        let left = $('.image-shower .photo').offset().left;
        let width = parseInt($('.image-shower .photo').css('width').replace('px', ''));
        if (e.clientX < left + width / 2)
            $('.image-shower .paginator-left').trigger('click');
        else
            $('.image-shower .paginator-right').trigger('click');
    });

    $(window)
        .on('keyup', e => {
            let el = $('.image-shower');
            if (![27, 37, 39].includes(e.keyCode)) return;
            if (!el.is(':visible')) return;
            el.find('.photo').attr('src', '');
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
                $('.image-shower').hide()
                    .find('.photo').attr('src', '');
        });

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
                        document.location.reload(true);
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
});

$(window)
    .on('resize', () => {
        $('.nav-link.active').click();

        if ($('.portfolio__main_photos div').eq(2).find('.portfolio__main_photo').attr('data-index') === '2'
                && window.innerWidth < 576) {
            let els = $('.portfolio__main_photos div');
            let l = els.eq(0).find('.portfolio__main_photo').length;
            els.each((i, el) => {
                $(el).find('.portfolio__main_photo').each((j, ph) => {
                    $(ph).attr('data-index', 2*Math.floor(i / 2)*l + i%2 + 2*j);
                });
            });
        } else if ($('.portfolio__main_photos div').eq(2).find('.portfolio__main_photo').attr('data-index') !== '2'
                && window.innerWidth > 576)
            $('.portfolio__main_photos div').each((i, el) => {
                $(el).find('.portfolio__main_photo').each((j, ph) => $(ph).attr('data-index', i + 4*j));
            });
    })
    .on('load', () => {
        let inds  = shuffleArray([...Array($('.portfolio__beauty_photo').length).keys()]);
        $('.portfolio__beauty_photo')
            .each((i, el) => {
                let imgs = $(el).find('img');
                imgs.eq(0)
                    .attr('src', `assets/imgs/portfolio/beauty/${inds[i]}.jpg`)
                    .one('load',
                        ()=> $(el).twentytwenty({no_overlay: true})
                    );
                imgs.eq(1)
                    .attr('src', `assets/imgs/portfolio/beauty/${inds[i]}.1.jpg`)
                    .one('load',
                        ()=> $(el).twentytwenty({no_overlay: true})
                    );
            });
    });

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}