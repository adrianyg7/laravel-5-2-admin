var elixir = require('laravel-elixir')

elixir(function(mix) {
    mix.sass('admin.scss', 'public/css/admin.css')
    mix.sass('auth.scss', 'public/css/auth.css')

    mix.browserify('admin.js', 'public/js/admin.js')
    mix.browserify('auth.js', 'public/js/auth.js')

    mix.browserSync({ proxy: 'skull.dev' })
});
