/*----- Webpack compiler ------ */
const mix = require('laravel-mix');

/* SCSS */
mix.sass('wp-content/themes/sef/ressources/sass/site.scss',
    'wp-content/themes/sef/public/css').options({
    processCssUrls: false,
});



/* JS */
mix.js('wp-content/themes/sef/ressources/js/site.js',
    'wp-content/themes/sef/public/js');
/* Images */
mix.copyDirectory('wp-content/themes/sef/ressources/images',
    'wp-content/themes/sef/public/images');
/* Fonts */
mix.copyDirectory('wp-content/themes/sef/ressources/fonts',
    'wp-content/themes/sef/public/fonts');
