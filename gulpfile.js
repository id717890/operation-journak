var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.sass("app.scss", "public/css/app-style.css");
    mix.browserify("app.js", "public/js/app.js");
    mix.version(["css/app-style.css", "js/app.js"]);
    mix.copy("resources/assets/sass/font-awesome/fonts", "public/fonts");
});