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
    })
});

function toast(title, text) {
    $('body').append(`
    <div class="toast">
        <div class="toast-header">
            <strong class="mr-auto">${title}</strong>
            <small>Только что</small>
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