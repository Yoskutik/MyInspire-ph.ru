let individualPhotos = '';
let pairPhotos = '';
let beautyPhotos = '';

let showedImageInd = 0;
let showedImageType = '';

$(window).ready(() => {
    $('.nav-tabs .nav-link').on('click', e => {
       $('.nav-tabs .nav-link.active').removeClass('active');
       $(e.target).addClass('active');
    });

    $('.navigation__individual').on('click', () => {
       $('.portfolio__beauty, .portfolio__individual, .portfolio__pair, .portfolio__retouch')
           .css('transform', 'translateX(0)');
       let height = $('.portfolio__individual_photos').height();
       let padding = $('.portfolio__individual').css('padding').replace('px', '') || '20';
       $('.portfolio__container').css('max-height', `${height + parseInt(padding) * 2}px`);
    });

    $('.navigation__pair').on('click', () => {
       $('.portfolio__beauty, .portfolio__individual, .portfolio__pair, .portfolio__retouch')
           .css('transform', 'translateX(-100%)');
       let height = $('.portfolio__pair_photos').height();
       let padding = $('.portfolio__pair').css('padding').replace('px', '') || '20';
       $('.portfolio__container').css('max-height', `${height + parseInt(padding) * 2}px`);
    });

    $('.navigation__beauty').on('click', () => {
        $('.portfolio__beauty, .portfolio__individual, .portfolio__pair, .portfolio__retouch')
            .css('transform', 'translateX(-200%)');
        let height = $('.portfolio__beauty_photos').height();
        let padding = $('.portfolio__beauty').css('padding').replace('px', '') || '20';
        $('.portfolio__container').css('max-height', `${height + parseInt(padding) * 2}px`);
    });

    $('.navigation__retouch').on('click', () => {
        $('.portfolio__beauty, .portfolio__individual, .portfolio__pair, .portfolio__retouch')
            .css('transform', 'translateX(-300%)');
        let height = $('.portfolio__retouch_photos').height();
        let padding = $('.portfolio__retouch').css('padding').replace('px', '');
        $('.portfolio__container').css('max-height', `${height + parseInt(padding) * 2}px`);
    });

    sleep(300).then(() => $('.nav-link.active').click());

    $('.image-shower .paginator-left').on('click', () => {
        $('.image-shower .photo')
            .attr('src', '')
            .attr(
            'src',
            $(`.portfolio__${showedImageType}_photo[data-index=${($(`.portfolio__${showedImageType}_photo`).length + --showedImageInd) % $(`.portfolio__${showedImageType}_photo`).length}]`)
                .attr('src').replace('-minify', '')
        );
    });

    $('.image-shower .paginator-right').on('click', () => {
        $('.image-shower .photo')
            .attr('src', '')
            .attr(
            'src',
            $(`.portfolio__${showedImageType}_photo[data-index=${++showedImageInd % $(`.portfolio__${showedImageType}_photo`).length}]`)
                .attr('src').replace('-minify', '')
        );
    });

    $('.image-shower .photo').on('click', e => {
        let left = $('.image-shower .photo').offset().left;
        let width = $('.image-shower .photo').width();
        if (e.clientX < left + width / 2)
            $('.image-shower .paginator-left').trigger('click');
        else
            $('.image-shower .paginator-right').trigger('click');
    });

    $('.image-shower .close').on('click', e => window.history.back());

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
        let setPhotos = columns => {
            let types = ['individual', 'pair', 'beauty'];
            for (let key in types) {
                let type = types[key];
                let marginBottom = parseInt($(`.portfolio__${type}_photo`).css('margin-bottom').replace('px', ''));
                if (typeof $(`.portfolio__${type}_photos div`).eq(2).find('img').data('index') === 'undefined'
                        || (columns === 4 && $(`.portfolio__${type}_photos div`).eq(2).find('img').data('index') !== 2)
                        || (columns === 2 && $(`.portfolio__${type}_photos div`).eq(2).find('img').data('index') === 2)) {
                    $(`.portfolio__${type}_photos div`).html('');
                    $(`.portfolio__${type}_photos div`).eq(0).html(eval(`${type}Photos`));
                    let heights = Array(columns);
                    for (let i  = 0; i < columns; i++) heights[i] = 0;
                    $(`.portfolio__${type}_photo`).each((i, el) => heights[0] += $(el).height());
                    let avgSize = heights[0] / $(`.portfolio__${type}_photo`).length;
                    let last = $(`.portfolio__${type}_photos div`).eq(0).find('img').last();
                    while (Math.min(...heights) < heights[0] - marginBottom - last.height()) {
                        let i = argMin(heights);
                        let h = last.appendTo($(`.portfolio__${type}_photos div`).eq(i)).height();
                        last = $(`.portfolio__${type}_photos div`).eq(0).find('img').last();
                        heights[0] -= h;
                        heights[i] += h;
                    }

                    setTimeout(() => {
                        let container = $(`.portfolio__${type}_photos`);
                        let h = container.offset().top;
                        let index = 0;
                        while (h < container.offset().top + container.height()) {
                            h += 50;
                            $(`.portfolio__${type}_photos`).find("img")
                                .filter((i, el) =>
                                    $(el).offset().top <= h
                                    && $(el).offset().top + $(el).height() >= h
                                    && typeof $(el).data('index') === 'undefined')
                                .each((i, el) => $(el).attr('data-index', index++));
                        }
                    }, 1000);
                }
            }
        };

        if (window.innerWidth >= 768) {
            setPhotos(4);
        } else {
            setPhotos(2);
        }

        sleep(500).then(() => $('.nav-link.active').click());

        $('.portfolio__individual_photo, .portfolio__pair_photo, .portfolio__beauty_photo').on('click', e => {
            $('.image-shower')
                .show()
                .find('.photo')
                .attr('src', e.target.src.replace('-minify', ''));
            showedImageInd = $(e.target).data('index');
            showedImageType = $(e.target)[0].className.match(/__.+_/)[0].replace(/_/g, '');
            location.hash = 'show';
        });
    })
    .on('load', () => {
        let inds  = shuffleArray([...Array($('.portfolio__retouch_photo').length).keys()]);
        $('.portfolio__retouch_photo').each((i, el) => {
            let imgs = $(el).find('img');
            imgs.eq(0)
                .attr('src', `/portfolio/photos/retouch/${inds[i]}.jpg`)
                .one('load', ()=> $(el).twentytwenty({no_overlay: true}));
            imgs.eq(1)
                .attr('src', `/portfolio/photos/retouch/${inds[i]}.1.jpg`)
                .one('load', ()=> $(el).twentytwenty({no_overlay: true}));
        });

        individualPhotos = $('.portfolio__individual_photos div').html();
        pairPhotos = $('.portfolio__pair_photos div').html();
        beautyPhotos = $('.portfolio__beauty_photos div').html();

        if (new URLSearchParams(window.location.search).get('link') === 'retouch')
            setTimeout(() => $('.navigation .active').trigger('click'), 2000);

        $(window).trigger('resize');
    });

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function argMin(arr) {
    for (let i in arr) {
        if (arr[i] === Math.min(...arr)) {
            return i;
        }
    }
}