const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js');

mix.less('resources/assets/less/app.less', 'public/css')
  .options({
    postCss: [
      tailwindcss('./tailwind.js'),
    ]
  }).version();

mix.sass('resources/assets/sass/admin.sass', 'public/css')
    .version();
