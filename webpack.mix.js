const mix = require('laravel-mix');
const path = require('path');
// config eslint
mix.webpackConfig({
    module: {
        rules: [
            {
                enforce: 'pre',
                exclude: /node_modules/,
                loader: 'eslint-loader',
                include: path.resolve(__dirname),
                test: /\.(js|vue)?$/
            },
        ]
    }
})
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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .vue({ runtimeOnly: (process.env.NODE_ENV || 'production') === 'production' })
    .webpackConfig({
        output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('resources/js'),
                '~': path.resolve('resources')
            },
        }
    }).copyDirectory("resources/assets" , "public/assets");

mix.options({
    hmrOptions: {
        host: "localhost",
        port: 8500
    }
})
mix.override(webpackConfig => {

    webpackConfig.module.rules.forEach(rule => {if (rule.test.toString() === '/(\\.(png|jpe?g|gif|webp)$|^((?!font).)*\\.svg$)/') {if (Array.isArray(rule.use)) {rule.use.forEach(ruleUse => {if (ruleUse.loader === 'file-loader') {ruleUse.options.esModule = false;}});}}});

})
