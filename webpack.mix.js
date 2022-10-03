const { styles, scripts } = require("laravel-mix");
const mix = require("laravel-mix");

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

mix.styles(
        [
            "resources/views/admin/css/style.css",
            "resources/views/admin/css/list.css",
            "resources/views/admin/css/menu.css",
        ],
        "public/admin/css/style.css"
    )

    .scripts(
        [
            "resources/views/admin/js/url.js",
            "resources/views/admin/js/script.js",
            "resources/views/admin/js/axios-admin.js",
        ],
        "public/admin/js/script.js"
    )

    .version();
