const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 | NOTE: I can't get Laravel Mix to copy the FontAwesome files where I want
 | them to live, so I've given up and am moving them myself!
 |
 */

mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/assets/fonts');
mix.sass('resources/sass/font-awesome.scss', 'public/assets/css');
mix.sass('resources/sass/app.scss', 'public/assets/css');