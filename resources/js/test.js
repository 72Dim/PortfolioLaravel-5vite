
// test_for_jquery();
$(document).ready(function () {
    console.log('Csrf-token from test.js - '
        +window.$("[name='csrf-token']").attr("content"));
    console.log('I am from test.js, '
        +'typeof $: ' + typeof $);
});
