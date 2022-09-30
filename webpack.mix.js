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


mix.options({
    hmrOptions: {
        host: 'localhost',
        port: 8001
    },
});

mix.webpackConfig({
    mode: "development",
    devtool: "inline-source-map",
    devServer: {
        allowedHosts: 'all',
        headers: {
            'Access-Control-Allow-Origin': '*'
        },
        host: "0.0.0.0",
        port: 8001
    },
});

mix.ts('resources/ts/app.ts', 'public/js')
    .vue({ version: 2 })
    .sass('resources/css/app.scss', 'public/css');
    
