<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('title', 'Home Page')
        </title>
        <link rel="icon" type="image/x-icon" href="@yield('linkIcon')">

        <!-- include jQuery, Bootstrap_JS and JavaScript -->
        {{-- <script type="text/javascript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">
        </script> --}}
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous">
        </script>

        <!-- @-stack('scripts') -->
        <!-- Vite::content('resources/js/app.js') -->
        <script data-base="only_JavaScript">
            //  var app = <?php echo json_encode($nameContent); ?>;
            //  var app = {{ Illuminate\Support\Js::from($nameContent) }};
            var app = {{ Js::from($nameContent) }};
            console.log(app);
            /*
                console.log('Test from file base.blade.php');
                console.log($) // Uncaught ReferenceError: $ is not defined
                var token = null;
                var metaElements = document.getElementsByTagName('meta');
                console.dir(metaElements);
                for (let i = 0; i < metaElements.length; i++) {
                    let elem = metaElements[i];
                        // console.log(elem.name);
                    if ("csrf-token" == elem.name) {
                        console.log('element №'+i+', attr(name)= '+elem.name);
                        token = elem.content;
                        console.log(token);
                        break;
                    }
                }

                window.addEventListener("load", function() {
                    console.log($) // works
                });

                $(document).ready(function () {
                    console.log($("[name='csrf-token']").attr("content"));
                });
            */
        </script>
        <script data-base="only_jQuery" type="module">
            // Если jQuery не подключенна на странице ниже следующим образом
            // '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">/script>'
            // код на jQuery не работает
            $(document).ready(function () {
                console.log('Csrf-token from base.blade.php - '
                +$("[name='csrf-token']").attr("content"));
            });
        </script>
        <!-- In file app.js. import $ from 'jquery'; -->
        <!-- window.$ = window.jQuery = $; -->
        @vite('resources/js/app.js')
        <!-- test for jQuery -->
        @vite('resources/js/test.js')
        <!-- JS for cart -->
        @vite('resources/js/cart.js')
        <!-- dialog-in-modal, code on jQuery -->
        @vite('resources/js/dialog.modal.js')
        <!-- pagination for pages -->
        @vite('resources/js/pagination.js')
        <!-- JS for page products -->
        @vite('resources/js/products.js')

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <!-- Bootstrap_CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- style "website.css" -->
            @vite(['resources/css/website.css'])

        <!-- @-stack('otherStyles') -->
        <!-- Vite::content('resources/css/app.css') -->
        <!-- style "test-app.css" -->
            @vite(['resources/css/app.css'])
        <!-- style "baner.css" -->
            @vite(['resources/css/baner.css'])
        <!-- style "header.css" -->
            @vite(['resources/css/header.css'])
        <!-- style "start.page.css" -->
            @vite(['resources/css/start.page.css'])
        <!-- style "footer.css" -->
            @vite(['resources/css/footer.css'])
        <!-- style "pagination.css" -->
            @vite(['resources/css/pagination.css'])
   </head>

   @yield('bodyHeader')

   @yield('bodyContent')

   @yield('footerSite')
            </div><!-- <div style="order: 1;"> -->
         </div><!-- <div class="wrapper"> -->
      </div>
   </body>
</html>

