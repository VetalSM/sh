<!doctype html>
<html lang="{{App::currentLocale()}}">
<head>
{{--    <link rel="preconnect" href="https://fonts.gstatic.com">--}}
    @if(auth()->id() == 0)
        <script defer async src="https://www.googletagmanager.com/gtag/js?id=G-CY3K5VV4KR"></script>
        <script defer async>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-CY3K5VV4KR');
        </script>
    @endif

    <script>
        var $window = (window)
        window.scroll(0, localStorage.getItem('scrollPosition')|0)
        $window.scroll(function () {
            localStorage.setItem('scrollPosition', $window.scrollTop())
        })
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <link rel="alternate" hreflang="ru" href="{{Request::root()}}/ru{{Str::substr(url()->current(), 24 , 1000)}}"  />
    <link rel="alternate" hreflang="uk" href="{{Request::root()}}/ua{{Str::substr(url()->current(), 24 , 1000)}}"  />
    <link rel="alternate" hreflang="x-default" href="{{Request::root()}}/ua{{Str::substr(url()->current(), 24 , 1000)}}"  />
    <meta property="og:image" content="@yield('og:image', "https://madeis.com.ua/images/logoOG.jpg" )"/>
    <meta property="og:title" content="@yield('og:title', 'Магазин товарів для свічок "MadeIS". ')"/>
    <meta property="og:description" content="@yield('og:description', '✅Якісні товари від відомих виробників.
✅Приємні ціни.
✅Швидке обслуговування.
🚚Відправка кожного дня.')"/>
    <meta property="og:page_url" content="@yield('og:page_url', 'https://madeis.com.ua/ua' )"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel ="icon" type = "image/x-icon" href ="/images/favicon-32x32.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @if(App::currentLocale() ==='ua')
    <title>@yield('title', 'CandleScience. Аромаолії США, Candlescience, віддушки, запашки для свічок мила, диффузорів, косметики.Аромамасла преміум класса США, матеріали для виробництва свічок, соєвий віск для свічок ручної роботи, віддушки для свічок')</title>
    <meta name="title" content="@yield('title_m', 'CandleScience. Аромаолії США, Candlescience, віддушки, запашки для свічок мила, диффузорів, косметики.Аромамасла преміум класса США, матеріали для виробництва свічок, соєвий віск для свічок ручної роботи, віддушки для свічок')">
    <meta name="description" content="@yield('description', 'Купити CandleScience в Україні. Аромаолії США, Candlescience, використовуються для свічок, мила, дифузорів, косметики, бомбочок для ван, запашки для лосьйонів, віддушки для натуральних свічок ручної роботи із соєвого воску')">
    <meta name="keywords" content="@yield('keywords', 'Магазин Madeis, товари для свічок, віддушки для свічок, віддушки для мила, ароматизатори для свічок, ароматизатори для аромадифузорів, совий віск Kerax в Україні, американські віддушки Україна, купити ароматизатори США в Україні, Candlescience в Україні, дерев’яні гноти Wooden Wick в Україні, товари для свічок MadeIS, Мейдіс , товары для изготовления свечей, отдушки, соевый воск, деревянные и хлопковые фитили. madeis.com.ua madeis')">
    @else
        <title>@yield('title', 'CandleScience. Аромамасла США, Candlescience, отдушки, запашки для свечей мыла, диффузоров, косметики.Аромамасла премиум класса США, материалы для производства свечей, соевый воск для свечей ручной работы, отдушки для свечей')</title>
        <meta name="title" content="@yield('title_m', 'CandleScience. Купить CandleScience в Украине. Аромаолии США, Candlescience, используются для свечей, мыла, диффузоров, косметики, бомбочек для ванн, запашки для лосьонов, отдушки для натуральных свечей ручной работы из соевого воска.')">
        <meta name="description" content="@yield('description', 'CandleScience. Купить CandleScience в Украине. Аромаолии США, Candlescience, используются для свечей, мыла, диффузоров, косметики, бомбочек для ванн, запашки для лосьонов, отдушки для натуральных свечей ручной работы из соевого воска.')">
        <meta name="keywords" content="@yield('keywords', 'Магазин Madeis, товары для свечей, отдушки для свечей, отдушки для мыла, ароматизаторы для свечей, ароматизаторы для аромадиффузоров, совый воск Kerax в Украине, американские отдушки Украина, купить ароматизаторы США в Украине, Candlescience в Украине, деревянные фитили Wooden Wick в Украина, товары для свечей MadeIS, Мэйдис, товары для изготовления свечей, отдушки, соевый воск, деревянные и хлопковые фитилы. madeis.com.ua madeis')">
    @endif
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css" integrity="sha512-+WF6UMXHki/uCy0vATJzyA9EmAcohIQuwpNz0qEO+5UeE5ibPejMRdFuARSrl1trs3skqie0rY/gNiolfaef5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
{{--    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"--}}
{{--            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"--}}
{{--            crossorigin="anonymous"></script>--}}
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer async></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }} " defer async></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    @auth()
        <script src="https://cdn.tiny.cloud/1/pebtcux3vb4jvpk5xu5eqdmmxiohb4tj9plx25aken3kenzs/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @endauth

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

{{--    model windows--}}
{{--   @include('components.modals.survey')--}}

@if(auth()->id() == 0)
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX8DH3S"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
@endif
<div class="  bg-gray-100 border-opacity-5  text-right py-1 px-4 ">
    <div class="py-1 text-centre">
        <div class="inline float-left">
           <a href="{{ url('/ua') }}">UA</a>|<a href="{{ url('/ru') }}">RU</a>
        </div>
        <div class="dropdown px-1 inline-block">
            {{--            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
            <a class="text-sm  lg:text-base  text-black inline  px-1  rounded-full nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
               style=" position: relative; top: 0px !important;
           text-decoration: none;  border: 3px solid rgb(255, 179, 0);padding-top: 0rem;padding-bottom: 0rem;"
            >
                {{__('Корисне')}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width: auto; min-width: max-content;" >
                <li><a class="dropdown-item "  href="https://articles.madeis.com.ua/{{app()->getLocale()}}/articles"  >{{__("Статті")}}</a></li>
                <li><a class="dropdown-item" href="https://articles.madeis.com.ua/{{app()->getLocale()}}/calculator">{{ __('Калькулятори')}}</a></li>
{{--                <li><a class="dropdown-item" href="/{{app()->getLocale()}}/info_delivery">{{__("Доставка")}}</a></li>--}}
            </ul>
        </div>
        <div class="dropdown px-1 inline-block">
            <a class="text-sm lg:text-base text-black inline px-1 rounded-full nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative; top: 0px !important; text-decoration: none; border: 3px solid rgb(255, 179, 0); padding-top: 0rem; padding-bottom: 0rem;">
                {{__('Інформація')}}
            </a>
            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink" style="width: auto; min-width: max-content;">
                <li><a class="dropdown-item" href="/{{app()->getLocale()}}/info_payment">{{__("Оплата")}}</a></li>
                <li><a class="dropdown-item" href="/{{app()->getLocale()}}/info_delivery">{{__("Доставка")}}</a></li>
                <li><a class="dropdown-item" href="/{{app()->getLocale()}}/info_contact">{{ __('Контакти')}}</a></li>
            </ul>
        </div>

        {{--        <div class="px-1 inline-block">--}}
{{--            <a href="/{{app()->getLocale()}}/info_contact"--}}
{{--               class=" text-sm  lg:text-base  text-black inline  px-1  rounded-full "--}}
{{--               style=" position: relative; top: 0px !important;--}}
{{--           text-decoration: none;  border: 3px solid rgb(255, 179, 0);"--}}
{{--            >{{ __('Контакти')}}--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://instagram.com/madeis.ua" rel=”nofollow" target="_blank">
                <img src="/images/instagram.webp" alt="instagram" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://t.me/MadeIS_UA" rel=”nofollow" target="_blank">
                <img src="/images/telegram.webp" alt="telegram" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://www.facebook.com/madeis.ua/" rel=”nofollow" target="_blank">
                <img src="/images/facebook.png" alt="facebook" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>
{{--    </div>--}}
    </div>
</div>
    <nav class="md:flex  flex md:justify-between justify-between items-center  md:items-center">
        <div class=" px-2 ">
            <a href="/{{app()->getLocale()}}">
                <img src="/images/logo.webp" alt="Logo" width="100" height="60">
            </a>
        </div>
        <div class="mt-8 md:mt-0 flex inline-block items-center  px-15">
            <a href="{{ route('cart.list',app()->getLocale()) }}" class="flex mr-18 items-center"
               style="  text-decoration-color: #747171;">
                <img src="/images/cart.png" alt="cart" width="40" height="40">
                <i class="ya-share1__item text-lg lg:text-xl "> <span
                        class="hidden  lg:inline-flex  ">  {{__("Всього:")}}</span> {{ Cart::getTotal() }} грн</i></a>
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
                            href="/{{app()->getLocale()}}/admin/products/orders_text"
                            :active="request()->is('admin/products/orders_text')"
                        >
                            Заявки на печать
                        </x-dropdown-item>
                        <hr style="height:1px;"/>
                        <x-dropdown-item
                            href="/{{app()->getLocale()}}/admin/products/orders"
                            :active="request()->is('admin/products/orders')"
                        >
                            Все заказы
                        </x-dropdown-item>
                        <hr style="height:1px;"/>
                        <x-dropdown-item
                            href="/{{app()->getLocale()}}/admin/products/balance_products"
                            :active="request()->is('admin/products/balance_products')"
                        >
                            Все остатки
                        </x-dropdown-item>
                        <hr style="height:1px;"/>
                        <x-dropdown-item
                            href="/{{app()->getLocale()}}/admin/products/create"
                            :active="request()->is('admin/products/create')"
                        >
                            Новый продукт
                        </x-dropdown-item>
                        <hr style="height:1px;"/>
                        <x-dropdown-item
                            href="/{{app()->getLocale()}}/admin/articles/create"
                            :active="request()->is('admin/articles/create')"
                        >
                            Новая статья
                        </x-dropdown-item>
                        @endadmin
                        <hr style="height:1px;"/>
                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Вихід
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="/{{app()->getLocale()}}/logout" class="hidden">
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
            <span>{{__("Приєднуйтесь до нас у соцмережах")}}</span>
        </div>
        <div style=" position: relative; top: 8px !important;">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://instagram.com/madeis.ua" target="_blank">
                    <img src="/images/instagram.webp" alt="instagram" class="mx-auto " style="width: 50px;">
                </a>
            </div>
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://t.me/MadeIS_UA" target="_blank">
                    <img src="/images/telegram.webp" alt="telegram" rel=”nofollow" class="mx-auto " style="width: 50px;">
                </a>
            </div>
            <div class="relative  inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://www.facebook.com/madeis.ua/" target="_blank">
                    <img src="/images/facebook.png" alt="facebook" class="mx-auto " style="width: 50px;">
                </a>
            </div>
        </div>
    </footer>
</section>
<x-flash/>
</body>
<script>
    $('.selectPrice').each(function() {
        var colors = ['#2c2a2a', '#c81313', '#2c2a2a'];
        var textDecorationStyles = ['none', 'none', 'line-through', ];
        var textPosition = ['left: 0']

        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        $this.addClass('s-hidden');
        $this.wrap('<div class="select"></div>');
        var $selectContainer = $this.parent(); // Cache the select container
        $this.after('<div class="styledSelect"></div>');

        var $styledSelect = $this.next('div.styledSelect');

        // Show the first select option in the styled div
        var defaultIndex = $this.children('option').length > 1 ? 1 : 0;
        $styledSelect.html($this.children('option').eq(defaultIndex).text()
            .split(' ').map((word, index) => `<span style=" color:${colors[index % colors.length]}; text-decoration:${textDecorationStyles[index % textDecorationStyles.length]}">${word}</span>`).join(' '));



        // Insert an unordered list after the styled div and also cache the list
        var $list = $('<ul />', {
            'class': 'options'
        }).insertAfter($styledSelect);

        // Insert a list item into the unordered list for each select option
        for (var i = 0; i < numberOfOptions; i++) {
            var listItem = $('<li />', {
                html: $this.children('option').eq(i).text()
                    .split(' ').map((word, index) => `<span style=" color:${colors[index % colors.length]}; text-decoration:${textDecorationStyles[index % textDecorationStyles.length]}">${word}</span>`).join(' '),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);

            // Apply the styles directly to the list item
            if (i === 0) {
                listItem.addClass('active'); // Применить стиль для первого элемента
            }
        }


        // Cache the list items
        var $listItems = $list.children('li');

        // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
        $selectContainer.click(function(e) {
            e.stopPropagation();
            $('div.styledSelect.active').not($styledSelect).removeClass('active').next('ul.options').hide();
            $styledSelect.toggleClass('active').next('ul.options').toggle();
        });


        // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
        // Updates the select element to have the value of the equivalent option
        $listItems.click(function(e) {
            e.stopPropagation();
            $listItems.removeClass('active'); // Удалите класс "active" у всех элементов списка
            $(this).addClass('active'); // Добавьте класс "active" к выбранному элементу
            $styledSelect.html($(this).html()).removeClass('active'); // Используйте innerHTML для копирования содержимого, чтобы сохранить стили
            $this.val($(this).attr('rel'));
            $list.hide();
        });



        // Hides the unordered list when clicking outside of it
        $(document).click(function() {
            $('div.styledSelect.active').removeClass('active').next('ul.options').hide();
        });
        // $listItems.first().addClass('active');
    });

    // $(document).ready(function() {
    //     const myVariable = $('#myVariable').text();
    //     $('.t').select2({
    //
    //         templateResult: function(el) { return '<span style="color: red">' + el.text + '</span>' +  '<span style="color: #000000;">'+ myVariable +'jj</span>'; },
    //
    //     // render html for the selected option
    //     templateSelection: function(el) { return '<span class="' + ($(el.element).prop('class') || '') + '">' + el.text + '</span>'; },
    //     // render html as-is without escaping it
    //     escapeMarkup: function(markup) { return markup; }
    // });
    // });
    // $('.t').on('change', function() {
    //     $('.select2-selection__rendered').html($('.select2-selection__rendered').html());
    // });
</script>

