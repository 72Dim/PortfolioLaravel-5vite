import { defineConfig } from 'vite';
import Inspect from 'vite-plugin-inspect';
import laravel from 'laravel-vite-plugin';
import inject from "@rollup/plugin-inject";
// npm i @rollup/plugin-inject --save-dev
//  import inject from "@rollup/plugin-inject";

//  https://vite.dev/config/
export default defineConfig({
    plugins: [
        inject({   // => that should be first under plugins array
            $: 'jquery',
            jQuery: 'jquery',
        }),
        Inspect(),
        laravel({ // for Server-Side Rendering
            input: [
                'resources/css/app.css',
                'resources/css/baner.css',
                'resources/css/header.css',
                'resources/css/start.page.css',
                'resources/css/footer.css',
                'resources/css/pagination.css',
                'resources/css/website.css',
                'resources/js/app.js',
                'resources/js/test.js',
                'resources/js/cart.js',
                'resources/js/dialog.modal.js',
                'resources/js/pagination.js',
                'resources/js/products.js'
            ],
            // ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            // '$':'jQuery',
        },
    },
    server: {
        hmr: {
            host: 'localhost',
            // host: 'laravel-5vite.loc',
        },
        // port: '3333',
        // srictPort: true,
    },
    // optimizeDeps: {
    //     include: ['linked-dep'],
    // },
    // build: {
    //     commonjsOptions: {
    //         include: [/linked-dep/, /node_modules/],
    //     },
    // }
});

// import { jQuery } from '.node_modules/jquery/dist/jquery.js';
// import { jQuery } from './jquery';
// import { jQuery } from 'jquery';

    /*  Не удачная работа с jQuery
        import { jQuery } from 'jquery/dist/jquery.js';
        import pkg from 'laravel-5Vite.loc/node_modules/jquery/dist/jquery.js';

        const { jQuery } = pkg;
        window.$ = jQuery;
    */
    /*    export default defineConfig({
            plugins: [
                inject({   // => that should be first under plugins array
                    $: 'jquery',
                    jQuery: 'jquery',
                }),

                // laravel({
                //     input: [
                //         'resources/js/app.js'
                //     ],
                //     refresh: true,
                // }),
                laravel(
                    [
                        'resources/js/app.js'
                    ]
                    // refresh: true,
                )
            ],
            resolve: {
                alias: {
                    '$':'jQuery',
                }
            },
            server: {
                hmr: {
                    // host: 'localhost',
                    host: 'laravel-5vite.loc',
                },
            },
        });
    */
   // import jQuery from "jquery";
// Object.assign(window, { $: jQuery, jQuery });
// //or
// window.jQuery = window.$ = $;