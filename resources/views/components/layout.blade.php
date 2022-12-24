<!doctype html>
<html lang="ua">
<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KX8DH3S');</script>
    <!-- End Google Tag Manager -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CY3K5VV4KR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-CY3K5VV4KR');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'MadeIS - товари для виготовлення свічок в Україні, віддушки CandleScience в Україні. madeis.com.ua madeis')</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    {{--<meta name="title" content="@yield('meta_title', 'MadeIS - товари для виготовлення свічок в Україні, віддушки CandleScience в Україні. madeis.com.ua madeis')">--}}
    <meta name="description"
          content="@yield('description', 'Товари та складові для виготовлення свічок, які ви можете придбати у магазині madeis.com.ua в Україні. Якісні товари за приємними цінами: віддушки CandleScience США, соевий віск Kerasoy, деревяні гноти Wooden Wick та гноти Stabilo madeis.com.ua madeis')">
    <meta name="keywords"
          content="@yield('keywords', 'Магазин Madeis, товари для свічок, віддушки для свічок, віддушки для мила, ароматизатори для свічок, ароматизатори для аромадифузорів, совий віск Kerax в Україні, американські віддушки Україна, купити ароматизатори США в Україні, Candlescience в Україні, дерев’яні гноти Wooden Wick в Україні, товари для свічок MadeIS, Мейдіс , товары для изготовления свечей, отдушки, соевый воск, деревянные и хлопковые фитили. madeis.com.ua madeis')">
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">

    <style>
        html {
            scroll-behavior: smooth;
        }

        .clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp.one-line {
            -webkit-line-clamp: 1;
        }
    </style>

</head>
<body style="font-family: Open Sans, sans-serif">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX8DH3S"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="  bg-gray-100 border-opacity-5  text-right py-1 px-4 ">
    <div class="py-1">
        <div class="px-3  inline">
            <a href="/info_payment"
               class=" text-sm  lg:text-base  text-black inline  px-1 rounded-full "
               style=" position: relative; top: 0px !important;
            text-decoration: none;  border: 3px solid rgb(255, 179, 0);"
            >Оплата
            </a>
        </div>
        <div class="px-3 inline">
            <a href="/info_delivery"
               class=" text-sm  lg:text-base  text-black inline  px-1  rounded-full "
               style=" position: relative; top: 0px !important;
           text-decoration: none;  border: 3px solid rgb(255, 179, 0);"
            >Доставка
            </a>
        </div>
        <div class="px-3 inline">
            <a href="/info_contact"
               class=" text-sm  lg:text-base  text-black inline  px-1  rounded-full "
               style=" position: relative; top: 0px !important;
           text-decoration: none;  border: 3px solid rgb(255, 179, 0);"
            >Контакти
            </a>
        </div>
        {{--        <div class=" inline  px-1   rounded-full  "--}}
        {{--             style="position: relative; top: -9px !important; right: 10px !important; height: 200px; border: 3px solid rgb(255, 179, 0);">--}}
        {{--            <span>Ми у соцмережах</span>--}}
        {{--        </div>--}}
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://t.me/MadeIS_UA" target="_blank">
                <img src="/images/telegram.png" alt="" style="width: 20px; position: relative; top: 50px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://instagram.com/madeis.ua" target="_blank">
                <img src="/images/instagram.png" alt="" style="width: 20px; position: relative; top: 50px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://www.facebook.com/madeis.ua/" target="_blank">
                <img src="/images/facebook.png" alt="" style="width: 20px; position: relative; top: 50px !important;">
            </a>
        </div>
    </div>
</div>

<section class="px-6 py-8">
    <script> var snowCountMax = 50;
        var arrColor = ["#b9dff5","#b9dff5","#b9dff5","#b9dff5","#b9dff5"];
        var snowView = "*";
        var speed = 2;
        var sizeMax = 25;
        var sizeMin = 10;
        var screenHeight;
        var screenWidth;
        var timer;

        function initSnow() {
            screenHeight = jQuery(document).height();
            screenWidth = jQuery(document).width();
            var sizeRange = sizeMax - sizeMin;
            for(i = 0; i <= snowCountMax; i++){
                var sizeFont = Math.floor(sizeRange*Math.random())+sizeMin; // случайный размер снежинки
                var posx = Math.floor((screenWidth-sizeFont*2)*Math.random()); // снежинки по всей оси X
                var posy = Math.floor((screenHeight-sizeFont*2)*Math.random()); // снежинки по всей оси Y
                var randColor = arrColor[Math.floor(arrColor.length*Math.random())]; // случайный цвет
                var size = Math.floor(sizeRange*Math.random()) + sizeMin;
                span = jQuery("#snow_"+i); // снежинка по порядку
                span.css('fontSize', sizeFont+"px"); // задаем ей размер
                span.css('color', randColor); // цвет
                span.attr('size', size); // в атрибут сохраняем скорость этой снежинки
                span.attr('speed', speed*sizeFont/5); // в атрибут сохраняем скорость этой снежинки
                span.attr('posx', posx); // в атрибут пишем положение по X
                span.attr('posy', posy); // в атрибут пишем положение по Y
                span.css('left', posx+"px"); // задаем положение по X
                span.css('top', posy+"px"); // задаем положение по Y
            }
            moveSnow();
        }
        function moveSnow() {
            for(i = 0; i <= snowCountMax; i++){
                span = jQuery("#snow_"+i); // снежинка по порядку
                var posy = parseInt(span.attr('posy')) + parseInt(span.attr('speed'));
                var posx = parseInt(span.attr('posx'));
                var size = parseInt(span.attr('size'));
                var margin = posx + Math.floor(Math.random()*4)-2; // колыхание по X
                span.animate({
                    top: posy+"px",
                    left: margin + "px"
                }, 70);
                span.attr('posy', posy);
                span.attr('posx', margin);
                var sizeRange = sizeMax - sizeMin;
                var sizeFont = Math.floor(sizeRange*Math.random()) + sizeMin; // случайный размер снежинки
                if(posy >= (screenHeight-sizeFont*2)){ // если снежинка полностью опустилась
                    posx = Math.floor((screenWidth-sizeFont*2)*Math.random()); // снежинки по всей оси X
                    span.attr('posx', posx);
                    span.attr('posy', 0);
                    span.css('fontSize', sizeFont+"px"); // меняем размер
                }
            }
            var timer = setTimeout("moveSnow()", 70);
        }
        for (i = 0; i <= snowCountMax; i++){
            jQuery('body').append("<span id='snow_"+i+"' style='position: absolute;'>"+snowView+"</span>");
        }jQuery(function () {
            initSnow();
        });
    </script>
    <nav class="md:flex flex md:justify-between justify-between items-center  md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Logo" width="100" height="60">

            </a>
        </div>
        {{--        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
        {{--            Launch demo modal--}}
        {{--        </button>--}}

        {{--        <!-- Modal -->--}}
        {{--        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        {{--            <div class="modal-dialog modal-xl">--}}
        {{--                <div class="modal-content">--}}
        {{--                    <div class="modal-header">--}}
        {{--                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
        {{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
        {{--                    </div>--}}
        {{--                    <div class="modal-body">--}}
        {{--                        ...--}}
        {{--                    </div>--}}
        {{--                    <div class="modal-footer">--}}
        {{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
        {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}


        {{--        <div class="hidden lg:flex justify-between mb-6">--}}
        {{--            <a href="/"--}}
        {{--               class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">--}}
        {{--                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">--}}
        {{--                    <g fill="none" fill-rule="evenodd">--}}
        {{--                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">--}}
        {{--                        </path>--}}
        {{--                        <path class="fill-current"--}}
        {{--                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">--}}
        {{--                        </path>--}}
        {{--                    </g>--}}
        {{--                </svg>--}}

        {{--                Back to products--}}
        {{--            </a>--}}


        {{--                <x-category-button :category="$post->category"/>--}}
        {{--            </div>--}}


        <div class="mt-8 md:mt-0 flex inline-block items-center  px-15">
            <a href="{{ route('cart.list') }}" class="flex mr-18 items-center"
               style="  text-decoration-color: #747171;">
                <img src="/images/cart.png" alt="cart" width="40" height="20">
                <i class="ya-share1__item text-lg lg:text-xl "> <span
                        class="hidden  lg:inline-flex  ">  Всього:</span> {{ Cart::getTotal() }} грн</i>
            </a>
            <div class="flex" style=" margin-left: auto;margin-right: 0;">

                @auth

                    <x-dropdown class="">
                        <x-slot name="trigger">
                            <button class=" ml-2 text-sm mt-0.5 lg:text-base font-bold ">
                                Вітаю, {{ auth()->user()->name }}!
                            </button>
                        </x-slot>

                        @admin

                        <x-dropdown-item
                            href="/admin/products"
                            :active="request()->is('admin/products')"
                        >
                            Dashboard
                        </x-dropdown-item>

                        <x-dropdown-item
                            href="/admin/products/create"
                            :active="request()->is('admin/products/create')"
                        >
                            New Product
                        </x-dropdown-item>
                        @endadmin

                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Вихід
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                @else

                    {{--                log in and register--}}
                    {{--                    <a href="/register"--}}
                    {{--                       class="ml-2 text-sm lg:text-base font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">--}}
                    {{--                        Реєстрація--}}
                    {{--                    </a>--}}

                    {{--                    <a href="/login"--}}
                    {{--                       class="ml-2 text-sm lg:text-base font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">--}}
                    {{--                        Вхід--}}
                    {{--                    </a>--}}
                @endauth

                {{--                <a href="#newsletter"--}}
                {{--                   class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">--}}
                {{--                    Subscribe for Updates--}}
                {{--                </a>--}}
            </div>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-100  border-opacity-5 rounded-xl text-center py-1 px-1 mt-5">
        <div class=" inline py-1 px-2 bg-gray-200 rounded-full  "
             style="position: relative;   height: 200px; border: 3px solid rgb(255, 179, 0);">
            <span>Приєднуйтесь до нас у соцмережах</span>
        </div>
        <div style=" position: relative; top: 8px !important;">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://t.me/MadeIS_UA" target="_blank">
                    <img src="/images/telegram.png" alt="" class="mx-auto " style="width: 50px;">
                </a>
            </div>
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://instagram.com/madeis.ua" target="_blank">
                    <img src="/images/instagram.png" alt="" class="mx-auto " style="width: 50px;">
                </a>
            </div>
            <div class="relative  inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://www.facebook.com/madeis.ua/" target="_blank">
                    <img src="/images/facebook.png" alt="" class="mx-auto " style="width: 50px;">
                </a>
            </div>
        </div>
        {{--        <img src="/images/newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 50px;">--}}


        {{--        <p class="text-sm mt-3">Promise to keep the inbox clean.</p>--}}

        {{--        <div class="mt-10">--}}
        {{--            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">--}}

        {{--                <form method="POST" action="/newsletter" class="lg:flex text-sm">--}}
        {{--                    @csrf--}}

        {{--                    <div class="lg:py-3 lg:px-5 flex items-center">--}}
        {{--                        <label for="email" class="hidden lg:inline-block">--}}
        {{--                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">--}}
        {{--                        </label>--}}

        {{--                        <div>--}}
        {{--                            <input id="email"--}}
        {{--                                   name="email"--}}
        {{--                                   type="text"--}}
        {{--                                   placeholder="Your email address"--}}
        {{--                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">--}}

        {{--                            @error('email')--}}
        {{--                            <span class="text-xs text-red-500">{{ $message }}</span>--}}
        {{--                            @enderror--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <button type="submit"--}}
        {{--                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"--}}
        {{--                    >--}}
        {{--                        Subscribe--}}
        {{--                    </button>--}}
        {{--                </form>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </footer>
</section>

<x-flash/>
</body>
