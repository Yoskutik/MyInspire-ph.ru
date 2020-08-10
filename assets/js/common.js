const sleep = ms => new Promise(resolve => setTimeout(resolve, ms));

function copyToClipboard(str) {
    const el = document.createElement('textarea');
    el.value = str;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
}

function copy(copy, title, desrciption) {
    copyToClipboard(copy);
    toast(title, desrciption);
}

$(window).on('load', () => {
    console.timeEnd('Loaded');

    $('.main-loader')
        .on('transitionend', e => {
            $(e.target).remove();
        })
        .css('opacity', 0);

    $('.count-link').on('click', e => {
        let el = $(e.target);
        while (!el.hasClass('count-link'))
            el = el.parent();
        $.ajax({
            url: '/api/link.php',
            type: 'post',
            data: {
                id: el.data('id'),
            },
        })
    });

    $('.footer__block_title').on('click', function() {
        let el = $(this).parent();
        if (el[0].offsetHeight < 20) {
            el.find('.footer__block_triangle').css('transform', 'rotate(90deg)');
            el.css('max-height', el.find('.footer__block_title')[0].offsetHeight + el.find('.footer__block_body')[0].offsetHeight + 2 + 'px');
        } else {
            el.find('.footer__block_triangle').css('transform', 'rotate(0deg)');
            el.css('max-height', el.find('.footer__block_title')[0].offsetHeight + 'px');
        }
    });
});

function toast(title, text) {
    let lang = $('html').attr('lang');
    let when;
    if (lang === 'ru')
        when = 'Только что';
    else if (lang === 'en')
        when = 'Right now';
    $('body').append(`
    <div class="toast">
        <div class="toast-header">
            <strong class="mr-auto">${title}</strong>
            <small>${when}</small>
            <button type="button" class="ml-2 mb-1 close">
                <span>&times;</span>
            </button>
        </div>
        <div class="toast-body">
            ${text}
        </div>
    </div>
    `);

    let el = $('.toast').last();
    $('.toast .close').last().on('click', () => {
        el.css({
            transform: 'translate(0, 100px)',
            opacity: 0
        });
        el.on('transitionend', event => $(event.target).remove());
    });

    setTimeout(() => {
        $('.toast').last().css({
            transform: 'translate(0,0)',
            opacity: 1,
        }, 200)
    });

    sleep(5000).then(() => el.find('.close').trigger('click'));
}

var onPinClick = function (advertisements, evt) {
    if (!document.querySelector('.map__card')) {
        var pin = evt.target.closest('.map__pin');
        if  ((!pin)|| (pin.classList.contains('map__pin--main'))) {
            return;
        }
        var j = pin.dataset.index;
        addAdvertismentCard(advertisements[j]);
        var cardClose = document.querySelector('.popup__close');
        cardClose.addEventListener('click', function () {
            closePopUp();
        });
        document.addEventListener('keydown', onClosePopUpEsc);
    } else {
        closePopUp();
        var pin = evt.target.closest('.map__pin');
        if  ((!pin)|| (pin.classList.contains('map__pin--main'))) {
            return;
        }
        var j = pin.dataset.index;
        addAdvertismentCard(advertisements[j]);
        var cardClose = document.querySelector('.popup__close');
        cardClose.addEventListener('click', function () {
            closePopUp();
        });
        document.addEventListener('keydown', onClosePopUpEsc);
    }
}
