<!doctype html>

<title >Madeis</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


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

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Logo" width="80" height="40">

            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center  px-15">
            <a href="{{ route('cart.list') }}" class="flex items-center">
                <img src="/images/cart.png" alt="cart" width="40" height="20">
                <i class="ya-share1__item text-xl lg:text-xl">     Всього: {{ Cart::getTotal() }} грн</i>
            </a>
            @auth
{{--                <a href="#" class="ml-3 rounded-full text-xs font-semibold  uppercase py-3 px-2">--}}
{{--                    <img src="/images/cart.png" alt="cart" width="40" height="20">--}}
{{--                </a>--}}


                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xl lg:text-sm font-bold ">
                            Вітаю, {{ auth()->user()->name }}!
                        </button>
                    </x-slot>

                    @admin
                    <x-dropdown-item
                        href="/admin/posts"
                        :active="request()->is('admin/posts')"
                    >
                        Dashboard
                    </x-dropdown-item>

                    <x-dropdown-item
                        href="/admin/posts/create"
                        :active="request()->is('admin/posts/create')"
                    >
                        New Post
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
                <a href="/register"
                   class="text-2xl lg:text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                    Реєстрація
                </a>

                <a href="/login"
                   class="ml-6 text-2xl lg:text-sm font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                    Вхід
                </a>
            @endauth

            {{--                <a href="#newsletter"--}}
            {{--                   class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">--}}
            {{--                    Subscribe for Updates--}}
            {{--                </a>--}}
        </div>
    </nav>

    {{ $slot }}

    <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
    >
        <img src="/images/newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 50px;">


        <p class="text-sm mt-3">Promise to keep the inbox clean.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <div>
                            <input id="email"
                                   name="email"
                                   type="text"
                                   placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                            @error('email')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>

<x-flash/>
</body>
