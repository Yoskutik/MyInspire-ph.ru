$(window).ready(() => {
    $(window)
        .on('resize', function() {
            let perRow = innerWidth < 580 ? 1 : 2;
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
                    height: size - margin + $(el).parent().find('.item__title')[0].scrollHeight + 'px',
                });
            });
        })
        .trigger('resize');
    $('.photo img').on('load', () => $(window).trigger('resize'));
    $('.photo').on('click', function() {
        location.href = this.dataset.href;
    })
});