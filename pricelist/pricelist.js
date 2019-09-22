$(window).ready(() => {
    $('.list__item').on('click', e => {
        let el =  $(e.target);
        while (!el.hasClass('list__item'))
            el = el.parent();
        if (!el.hasClass('active')) {
            let height =
                parseInt(el.css('height').replace('px', '')) +
                parseInt(el.css('padding-bottom').replace('px', '')) +
                parseInt(el.find('p').css('height').replace('px', ''));
            el.css('max-height', `${height}px`).addClass('active');
        } else {
            el.css('max-height', '56px').removeClass('active')
        }
    });

    $('.action__close').on('click', () => $('.action').hide());

    $(window)
        .on('resize', () => {
            if (window.innerWidth <= 450 && $('.__additional_shots').text() === 'Ретушь дополнительных кадров') {
                $('.__additional_shots').text('Ретушь доп. кадров');
            } else if (window.innerWidth > 450 && $('.__additional_shots').text() === 'Ретушь доп. кадров') {
                $('.__additional_shots').text('Ретушь дополнительных кадров');
            }
        })
        .trigger('resize');
});