const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

// npm run dev
// npm run prod
// npm run watch

// .env
// ASSET_URL=http://localhost/assets

mix.styles([
    'resources/front/css/bootstrap.css',
    'resources/front/css/main.css',
], 'public/css/styles.css');

mix.scripts([
    'resources/front/js/jquery-migrate-3.4.0.js',
    'resources/front/js/bootstrap.js',
], 'public/js/scripts.js');

mix.copyDirectory([
    'resources/front/img'
], 'public/img');

// mix.browserSync('http://laravel.loc');
