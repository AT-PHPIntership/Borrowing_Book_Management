var gulp = require('gulp');
var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    // Combine scripts
  mix.scripts([
      'jquery/dist/jquery.js',
      'bootstrap/dist/js/bootstrap.min.js'
    ],
    'public/backend/js/vendor.js',
    'vendor/bower_dl'
  );

  // Compile css
  mix.styles([
  	  'bootstrap/dist/css/bootstrap.min.css',
  	  'font-awesome/css/font-awesome.min.css'
  ], 
    'public/backend/css/vendor.css',
    'vendor/bower_dl'
);
});
