let commercial0 = '';
let commercial1 = '';

$(window).ready(() => {
    let randomInteger = (min, max) => {
        let rand = min - 0.5 + Math.random() * (max - min + 1);
        return Math.round(rand);
    };

    let bigActivePhotos = new Set();
    let collagePhotos = new Set();
    collagePhotos.add(8);
    let updatesAt = [[0, 0, 0, 0], [0, 0, 0, 0]];
    let i;
    for (i = 0; i < 8; i++) {
        $('.small').eq(i).attr({src: `/home/photos/${i}.png`});
        collagePhotos.add(i);
    }

    let ind = $('.big:not(.hidden)').index();
    bigActivePhotos.add(ind);
    updatesAt[0][ind] = Date.now() + 5000;
    updatesAt[1][ind] = Date.now() + 5000;
    updatesAt[0][ind + 1] = Date.now() + 5000;
    updatesAt[1][ind + 1] = Date.now() + 5000;

    (async() => {
        let closeBigPhoto = i => {
            $('.big').eq(i).toggleClass('hidden');
            bigActivePhotos.delete(i);
        };

        while (true) {
            await sleep(2000);
            let src = `/home/photos/${++i % collageNumber}.png`;
            while (collagePhotos.has(i % collageNumber)) {
                src = `/home/photos/${++i % collageNumber}.png`;
            }
            let rand = randomInteger(0, 7);
            let y = () => Math.floor(rand / 4);
            let x = () => (rand % 4);
            if (Math.random() < 0.6) {
                rand = randomInteger(1, 3) + 4;
                while ($('.big').eq(rand - 5).css('display') === 'none')
                    rand = randomInteger(1, 3) + 4;
                let el = $('.big').eq(rand - 5);
                if (!el.hasClass('hidden'))
                    continue;
                if (Date.now() - updatesAt[0][x() - 1] < 3000
                        || Date.now() - updatesAt[0][x()] < 3000
                        || Date.now() - updatesAt[1][x()] < 3000
                        || Date.now() - updatesAt[1][x() - 1] < 3000)
                    continue;
                switch(rand - 5) {
                    case 0:
                    case 2:
                        if (bigActivePhotos.has(1)) {
                            closeBigPhoto(1);
                        }
                        break;
                    case 1:
                        if (bigActivePhotos.has(0)) {
                            closeBigPhoto(0);
                        }
                        if (bigActivePhotos.has(2)) {
                            closeBigPhoto(2);
                        }
                        break;
                    default:
                        continue;
                }
                bigActivePhotos.add(rand - 5);
                el.toggleClass('hidden');
                el[0].src = src.replace('.png', '-b.png');

                updatesAt[y()][x() - 1] = Date.now();
                updatesAt[y() - 1][x()] = Date.now();
                updatesAt[y() - 1][x() - 1] = Date.now();
            } else {
                while (Date.now() - updatesAt[y()][x()] < 3000
                        || $('.small').eq(rand).css('display') === 'none') {
                    rand = randomInteger(0, 7);
                }

                if ([0, 1, 4, 5].includes(rand) && bigActivePhotos.has(0))
                    closeBigPhoto(0);
                if ([1, 2, 5, 6].includes(rand) && bigActivePhotos.has(1))
                    closeBigPhoto(1);
                if ([2, 3, 6, 7].includes(rand) && bigActivePhotos.has(2))
                    closeBigPhoto(2);

                let els = $(`.small:nth-child(8n + ${rand + 1})`);
                if (els.eq(0).css('opacity') === '0') {
                    els[0].src = src;
                } else {
                    els[1].src = src;
                }
                els.toggleClass('hidden');
            }
            updatesAt[y()][x()] = Date.now();

            collagePhotos = new Set();
            $('.small:not(.hidden), .big:not(.hidden)').each((j, val) => {
                let ind = val.src.match(/\d+(-b)?\.png$/i)[0];
                collagePhotos.add(parseInt(ind));
            });
        }
    })();

    $('.toast.telegram .close').on('click', () => {
        $('.toast.telegram').css({
            transform: 'translate(0, 100px)',
            opacity: 0
        })
    });
}).on('resize', () => {
    if (window.innerWidth < 768 && $('.commercial p').eq(1).text().length > 0) {
        $('.commercial p').eq(0).text(`${commercial0} ${commercial1}`);
        $('.commercial p').eq(1).text('');
    } else if (window.innerWidth >= 768 && $('.commercial p').eq(1).text().length === 0) {
        $('.commercial p').eq(0).text(commercial0);
        $('.commercial p').eq(1).text(commercial1);
    }
}).on('load', () => {
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