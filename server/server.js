import express from 'express';
import exphbs from 'express-handlebars';
import fs from 'fs';

const address = '0.0.0.0';
const port = 80;

const app = express();
app.engine('.hbs', exphbs({
    layoutsDir: "views/layouts",
    defaultLayout: "index",
    extname: "hbs",
    helpers: require('./server/helpers')
}));
app.set('view engine', '.hbs');

app.use((request, response, next) => {
    let now = new Date();
    let hour = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
    let data = `${hour}:${minutes}:${seconds} ${request.method} ${request.url}`;
    fs.appendFile("server/server.log", data + "\n", function(){});
    next();
});

app.get('/', (request, response) => {
    response.render('home');
});

app.get('/home', (request, response) => {
    response.render('home');
});

app.get('/portfolio', (request, response) => {
    let params = new URLSearchParams(request.url.replace('/portfolio', ''));
    response.render('portfolio', {
        beauty: params.get('link') === 'beauty',
        main: params.get('link') !== 'beauty',
    });
});

app.get('/pricelist', (request, response) => {
    response.render('pricelist');
});

app.use(function (request, response) {
    let url = request.url;
    response.sendFile(__dirname + url);
});

app.listen(port, address, () => {
    console.log(`Server is running on ${address}:${port}`);
});