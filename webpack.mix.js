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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/master.scss', 'public/css')
    .sass('resources/css/header.scss', 'public/css')
    .sass('resources/css/footer.scss', 'public/css')
    .sass('resources/css/homepage.scss', 'public/css')
    .sass('resources/css/about.scss', 'public/css')
    .sass('resources/css/products.scss', 'public/css')
    .sass('resources/css/contact.scss', 'public/css')
    .sass('resources/css/events.scss', 'public/css')
    .sass('resources/css/rtl/master-rtl.scss', 'public/css/rtl')
    .sass('resources/css/rtl/header-rtl.scss', 'public/css/rtl')
    .sass('resources/css/rtl/footer-rtl.scss', 'public/css/rtl')
    .sass('resources/css/rtl/homepage-rtl.scss', 'public/css/rtl')
    .sass('resources/css/rtl/about-rtl.scss', 'public/css/rtl')
    .sass('resources/css/rtl/products-rtl.scss', 'public/css/rtl')
    .sass('resources/css/rtl/contact-rtl.scss', 'public/css/rtl')
    .sass('resources/css/rtl/events-rtl.scss', 'public/css/rtl');

mix.styles([
    'public/css/global.css',
    'public/css/master.css',
    'public/css/header.css',
    'public/css/footer.css',
    'public/css/homepage.css',
    'public/css/about.css',
    'public/css/products.css',
    'public/css/contact.css',
    'public/css/events.css',
], 'public/css/build/all.css');

mix.styles([
    'public/css/rtl/global-rtl.css',
    'public/css/rtl/master-rtl.css',
    'public/css/rtl/header-rtl.css',
    'public/css/rtl/footer-rtl.css',
    'public/css/rtl/homepage-rtl.css',
    'public/css/rtl/about-rtl.css',
    'public/css/rtl/products-rtl.css',
    'public/css/rtl/contact-rtl.css',
    'public/css/rtl/events-rtl.css',
], 'public/css/build/all-rtl.css');