const mix = require('laravel-mix');

mix.browserSync({
    watch: true,
    open: false,
    host: 'localhost',
    proxy: '2cmc.info',
    logLevel: "debug"
});

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ]);
