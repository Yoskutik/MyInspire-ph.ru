$(window).ready(() => {
    $(() => {
        $(".beauty__photo").twentytwenty({
            no_overlay: true
        });
    });

    let bigActivePhotos = new Set();
    let collagePhotos = new Set();
    collagePhotos.add(14);
    let updatesAt = [[0, 0, 0, 0], [0, 0, 0, 0]];
    let collageNumber = 15;
    let i;
    for (i = 0; i < 8; i++) {
        $('.small').eq(i).attr({src: `assets/imgs/collage/${i}.jpg`});
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
            let src = $('.big').eq(i).toggleClass('hidden').attr('src');
            bigActivePhotos.delete(i);
        };

        while (true) {
            await sleep(2000);
            let src = `assets/imgs/collage/${++i % collageNumber}.jpg`;
            while (collagePhotos.has(i % collageNumber)) {
                src = `assets/imgs/collage/${++i % collageNumber}.jpg`;
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
                el[0].src = src;

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
                let ind = val.src.match(/\d+\.jpg$/i)[0].replace('.jpg', '');
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
});

function randomInteger(min, max) {
    let rand = min - 0.5 + Math.random() * (max - min + 1);
    return Math.round(rand);
}

$(document).scroll(() => {
    for (let i = 0; i <  $('.row').length; i++) {
        let el = $('.row')[i];
        let rect = el.getBoundingClientRect();
        if (rect.top >= 0 && rect.top <= window.innerHeight
                || rect.bottom <= window.innerHeight && rect.bottom >= 0
                || rect.bottom > window.innerHeight && rect.top < 0) {
            $(el).css({
                opacity: 1,
                transform: 'matrix(1, 0, 0, 1, 0, 0)'
            })
        }
        else if (rect.top < 0)
            $(el).css({
                opacity: 0,
                transform: 'matrix(1, 0, 0, 1, 0, -100)'
            });
        else if (rect.bottom > window.innerHeight)
            $(el).css({
                opacity: 0,
                transform: 'matrix(1, 0, 0, 1, 0, 100)'
            });
    }
});