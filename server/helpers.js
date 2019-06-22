function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

module.exports = {
    repeat: function(n, block){
        let accum = '';
        for(let i = 0; i < n; i++)
            accum += block.fn(i);
        return accum;
    },
    initStreet: () => {
        let accum = '';
        for(let i = 0; i < 5; i++)
            accum += `<img class="street__photo" src="assets/imgs/street/${i}.jpg">`;
        return accum;
    },
    initbig: function(n, block){
        let accum = '';
        let rand = Math.floor(Math.random() * 2);
        for(let i = 0; i < n; i++) {
            if (i === rand)
                accum += '<img class="big" src="assets/imgs/collage/14.jpg">';
            else
                accum += block.fn(i);
        }
        return accum;
    },
    initPortfolioIndividual: () => {
        const total = 18;
        let accum = [];
        for (let i = 0; i < total; i++)
            accum.push(`<img class="portfolio__individual_photo" src="assets/imgs/portfolio/individual/${i}-minify.png">`);
        accum = shuffleArray(accum);

        let result = '';
        let count = 0;
        for (let i = 0; i < 4; i++) {
            result += `<div>${accum.splice(count, Math.floor((total - count) / 4)).join('\n')}</div>`;
            count += Math.floor(count / 4);
        }
        return result;
    },
    initPortfolioBeauty: () => {
        const total = 9;
        let result = '';
        for (let i = 0; i < total; i++)
            result += `
            <div class="portfolio__beauty_photo">
                <img src="" />
                <img src="" />
            </div>   
            `;
        return result;
    }
};