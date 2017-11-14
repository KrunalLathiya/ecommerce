let mix = require('laravel-mix');

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/AdminLTE.css',
    'public/css/app.css',
    'public/css/_all-skins.min.css'
], 'public/css/master.css');

mix.scripts([
    'public/js/jquery.min.js',
    'public/js/jquery-ui.min.js',
    'public/js/bootstrap.min.js',
    'public/js/jquery.slimscroll.min.js',
    'public/js/adminlte.min.js',
    'public/js/dashboard2.js',
    'public/js/fonticons.js'
], 'public/js/master.js');
