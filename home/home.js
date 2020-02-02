let commercial0 = '';
let commercial1 = '';

$(window)
    .ready(() => {
        $('.toast.telegram .close').on('click', () => {
            $('.toast.telegram').css({
                transform: 'translate(0, 100px)',
                opacity: 0
            })
        });
    })
    .on('resize', () => {
        if (window.innerWidth < 768 && $('.commercial p').eq(1).text().length > 0) {
            $('.commercial p').eq(0).text(`${commercial0} ${commercial1}`);
            $('.commercial p').eq(1).text('');
        } else if (window.innerWidth >= 768 && $('.commercial p').eq(1).text().length === 0) {
            $('.commercial p').eq(0).text(commercial0);
            $('.commercial p').eq(1).text(commercial1);
        }
    })
    .on('load', () => {
        $(".beauty__photo").twentytwenty({no_overlay: true});
        $(document).trigger('scroll');

        commercial0 = $('.commercial p').eq(0).text();
        commercial1 = $('.commercial p').eq(1).text();
        $(window).trigger('resize');
    });

$(document).scroll(() => {
    for (let i = 0; i <  $('.row').length; i++) {
        let el = $('.row')[i];
        let rect = el.getBoundingClientRect();
        if (rect.top >= 0 && rect.top <= window.innerHeight
                || rect.bottom <= window.innerHeight && rect.bottom >= 0
                || rect.bottom > window.innerHeight && rect.top < 0) {
            $(el).css({
                opacity: 1,
                transform: 'translateY(0)'
            })
        }
        else if (rect.top < 0)
            $(el).css({
                opacity: 0,
                transform: 'translateY(-75px)'
            });
        else if (rect.bottom > window.innerHeight)
            $(el).css({
                opacity: 0,
                transform: 'translateY(75px)'
            });
    }
});