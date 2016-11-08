var elixir = require('laravel-elixir');
var bowerFiles = require('main-bower-files');
require('es6-promise').polyfill();
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass('app.scss');
    mix.scripts(bowerFiles('*.js'), 'public/js/app.js', '/');
});
