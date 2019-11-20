$('.main-loader')
    .on('transitionend', e => {
        $(e.target).remove();
    })
    .css('opacity', 0);

$(window).ready(() => {
    $('.main-loader').remove();

    $('.list__item_img-small:first-child').addClass('active');
    $('.list__item_studio').each((i, el) => {
        if (i === 0) return;
        if ($('.list__item_studio').eq(i - 1).text() === el.innerText) $(el).hide();
    });

    $('.list__item_img-small').on('click', function() {
        let el = $(this);
        el.parent().parent()
            .find('.list__item_img').attr('src', el.attr('src'))
            .parent().find('.active').removeClass('active');
        el.addClass('active');
    });

    let filters = {
        darkness: null,
        furniture: null,
        sort: 1,
    };

    function resetFilters() {
        $('.list__item_studio').show();
        $('.list__item').show();
    }

    function filter() {
        $('.list__item').each((i, el) => {
            el = $(el);
            let furniture = parseInt($(el).data('furniture'));
            let darkness = parseInt($(el).data('darkness'));
            if (filters.furniture !== null && furniture !== 2 && furniture !== filters.furniture) $(el).hide();
            if (filters.darkness !== null && darkness !== 2 && darkness !== filters.darkness) $(el).hide();
        });
        $('.list__item:visible .list__item_studio').each((i, el) => {
            if (i === 0) return;
            if ($('.list__item:visible .list__item_studio').eq(i - 1).text() === el.innerText) $(el).hide();
        });
    }

    $('.filters__filter span').on('click', function () {
        let el = $(this);
        el.parent().find('.active').removeClass('active');
        el.addClass('active');
    });

    $('.filters__darkness_all').on('click', () => filters.darkness = null);
    $('.filters__darkness_dark').on('click', () => filters.darkness = 1);
    $('.filters__darkness_light').on('click', () => filters.darkness = 0);

    $('.filters__furniture_all').on('click', () => filters.furniture = null);
    $('.filters__furniture_yes').on('click', () => filters.furniture = 1);
    $('.filters__furniture_no').on('click', () => filters.furniture = 0);

    $('.filters__cost').on('click', function() {
        resetFilters();
        let el = $(this);
        let elements = document.querySelectorAll('.list__item');
        elements = [].slice.call(elements);
        elements.sort((a, b) => {
            if (parseInt(a.dataset['price']) > parseInt(b.dataset['price'])) {
                return filters.sort;
            }
            if (parseInt(a.dataset['price']) < parseInt(b.dataset['price'])) {
                return -filters.sort;
            }
            return 0;
        });
        $('.list__item').remove();
        for (let elem of elements) $('.list').append(elem);
        filters.sort *= -1;
        this.title = filters.sort > 0
            ? 'Сортировать по увеличению стоимости'
            : 'Сортировать по уменьшению стоимости';
        filter();
        if (!el.hasClass('active')) {
            el.addClass('active');
            return;
        }
        el.toggleClass('__asc __desc');
    });

    $('.filters__filter span').on('click', () => {
        resetFilters();
        filter();
    });
});