$(window).ready(() => {
    $('.list__item').on('click', function() {
        let el =  $(this);
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

    $('.faq__block').on('click', function() {
        let el = $(this);
        if (el[0].offsetHeight <= el.find('.faq__block_title')[0].offsetHeight + 15) {
            el.find('.faq__block_arrow').css('transform', 'rotate(180deg)');
            el.css('max-height',
                el.find('.faq__block_title')[0].offsetHeight +
                el.find('p')[0].offsetHeight +
                parseInt(el.css('padding-bottom').replace('px', '')) * 2 + 'px');
        } else {
            el.find('.faq__block_arrow').css('transform', 'rotate(0deg)');
            el.css('max-height', el.find('.faq__block_title')[0].offsetHeight + 15 + 'px');
        }
    }).trigger('click');
});