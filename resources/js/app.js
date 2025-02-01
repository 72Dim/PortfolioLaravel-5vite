// import './bootstrap';
// Абсолютный URL путь, например, /foo/
// Полный URL, например, https://foo.com/
// Пустая строка или ./ (для embedded deployment)
// import './node_modules/jquery/dist/jquery.js';
import $ from 'jquery';         // работает
window.$ = window.jQuery = $;   // работает
// import jQuery from 'jquery'; // работает
// window.$ = jQuery;           // работает


read_env_variables();
only_js();
only_jQuery();
function read_env_variables() {
    // var nameAplication = import.meta.env.VITE_APP_NAME;
    console.log('Key values ​​from file .env');
    console.log(import.meta.env.VITE_APP_NAME);
    console.log(import.meta.env.VITE_EXAMPLE);
    console.log(import.meta.env.ASSET_URL);
}
function only_js() {
    var token = null;
    var metaElements = document.getElementsByTagName('meta');
    console.dir(metaElements);
    for (let i = 0; i < metaElements.length; i++) {
        let elem = metaElements[i];
        // console.log(elem.name);
        if ("csrf-token" == elem.name) {
            console.log('element №' + i + ', attr(name)= ' + elem.name);
            token = elem.content;
            console.log(token);
            break;
        }
    }
}
function only_jQuery() {
    $(document).ready(function () {
        // console.log('Csrf-token from app.js - '+window.$("[name='csrf-token']").attr("content"));
        console.log('I am from app.js, '
            + 'typeof $: ' + typeof $);
    });
}


