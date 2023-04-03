@props(['heading'])
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
<section class=" max-w-7xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Меню</h4>
            <div class="btn">
                <button class="btn btn-warning  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Заказы
                </button>
                <ul class="dropdown-menu">
                    <li >
                        <a href="/{{app()->getLocale()}}/admin/products/orders" class="{{ request()->is('admin/products/orders') ? 'text-blue-500' : '' }}">Все заказы</a>
                    </li>
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/orders_sort" class="{{ request()->is('/admin/products/orders_sort') ? 'text-blue-500' : '' }}">По дате</a>
                    </li>
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/orders_text" class="{{ request()->is('admin/products/orders_text') ? 'text-blue-500' : '' }}">Заявки на печать</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Остатки
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/balance_products" class="{{ request()->is('admin/products/balance_products') ? 'text-blue-500' : '' }}">Все остатки</a>
                    </li>

                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/balance_products/create" class="{{ request()->is('admin/products/balance_products/create') ? 'text-blue-500' : '' }}">Новый продукт</a>
                    </li>
                </ul>
            </div>
            <hr style="height:4px;"/>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Товары
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products" class="{{ request()->is('admin/products') ? 'text-blue-500' : '' }}">Все товары</a>
                    </li>

                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/create" class="{{ request()->is('admin/products/create') ? 'text-blue-500' : '' }}">Новый товар</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Цены
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/price" class="{{ request()->is('admin/products/price') ? 'text-blue-500' : '' }}">Все цены</a>
                    </li>
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/price/create" class="{{ request()->is('admin/products/price/create') ? 'text-blue-500' : '' }}">Новая цeна</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Тов. Категории
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/categories" class="{{ request()->is('admin/products/categories') ? 'text-blue-500' : '' }}">Все категории</a>
                    </li>
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/categories/create" class="{{ request()->is('admin/products/categories/create') ? 'text-blue-500' : '' }}">Новая категория</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Комментарии
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/comments" class="{{ request()->is('/admin/products/comments') ? 'text-blue-500' : '' }}">Все комментарии</a>
                    </li>
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/products/comments/create" class="{{ request()->is('/admin/products/comments/create') ? 'text-blue-500' : '' }}">instagram</a>
                    </li>
                </ul>
            </div>

            <hr style="height:4px;"/>
            <div class="btn">
                <button class="btn btn-info  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Статьи
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/articles" class="{{ request()->is('admin/articles') ? 'text-blue-500' : '' }}">Все статьи</a>
                    </li>

                    <li>
                        <a href="/{{app()->getLocale()}}/admin/articles/create" class="{{ request()->is('admin/articles/create') ? 'text-blue-500' : '' }}">Новая статья</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Стат. Категории
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/articles/categories/index" class="{{ request()->is('admin/articles/categories') ? 'text-blue-500' : '' }}">Все категории</a>
                    </li>

                    <li>
                        <a href="/{{app()->getLocale()}}/admin/articles/categories/index/create" class="{{ request()->is('admin/articles/categories/create') ? 'text-blue-500' : '' }}">Новая категория</a>
                    </li>
                </ul>
            </div>

            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Хештеги
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/hashtag" class="{{ request()->is('admin/hashtag') ? 'text-blue-500' : '' }}">Все хештеги</a>
                    </li>

                    <li>
                        <a href="/{{app()->getLocale()}}/admin/hashtag/create" class="{{ request()->is('admin/hashtag/create') ? 'text-blue-500' : '' }}">Новый хештег</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    доп
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/{{app()->getLocale()}}/admin/sitemap" class="{{ request()->is('/admin/sitemap') ? 'text-blue-500' : '' }}">Sitemap Generator</a>
                    </li>

                </ul>
            </div>
            <ul>

{{--                <li >--}}
{{--                    <span class="font-semibold mb-4">Товары</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products" class="{{ request()->is('admin/products') ? 'text-blue-500' : '' }}">Все товары</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/create" class="{{ request()->is('admin/products/create') ? 'text-blue-500' : '' }}">Новый товар</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <span class="font-semibold mb-4">Цены</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/price" class="{{ request()->is('admin/products/price') ? 'text-blue-500' : '' }}">Все цены</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/price/create" class="{{ request()->is('admin/products/price/create') ? 'text-blue-500' : '' }}">Новая цeна</a>--}}
{{--                </li>--}}
{{--               --}}
{{--                <li>--}}
{{--                    <span class="font-semibold mb-4">Комментарии</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/comments" class="{{ request()->is('/admin/products/comments') ? 'text-blue-500' : '' }}">Все комментарии</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                <a href="/{{app()->getLocale()}}/admin/products/comments/create" class="{{ request()->is('/admin/products/comments/create') ? 'text-blue-500' : '' }}">instagram</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <span class="font-semibold mb-4">Категории</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/categories" class="{{ request()->is('admin/products/categories') ? 'text-blue-500' : '' }}">Все категории</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/categories/create" class="{{ request()->is('admin/products/categories/create') ? 'text-blue-500' : '' }}">Новая категория</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span class="font-semibold mb-4">Остатки</span>--}}
{{--                </li>--}}
{{--                <a href="/{{app()->getLocale()}}/admin/products/balance_products" class="{{ request()->is('admin/products/balance_products') ? 'text-blue-500' : '' }}">Все остатки</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/balance_products/create" class="{{ request()->is('admin/products/balance_products/create') ? 'text-blue-500' : '' }}">новый продукт</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span class="font-semibold mb-4">Заказы</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                <a href="/{{app()->getLocale()}}/admin/products/orders" class="{{ request()->is('admin/products/orders') ? 'text-blue-500' : '' }}">Все заказы</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/orders_sort" class="{{ request()->is('/admin/products/orders_sort') ? 'text-blue-500' : '' }}">По дате</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                                        <a href="/{{app()->getLocale()}}/admin/products/orders_text" class="{{ request()->is('admin/products/orders_text') ? 'text-blue-500' : '' }}">Заявки на печать</a>--}}
{{--                </li>--}}
{{--                <li >--}}
{{--                    <span class="font-semibold mb-4">Articles</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/articles" class="{{ request()->is('admin/articles') ? 'text-blue-500' : '' }}">all articles</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/articles/create" class="{{ request()->is('admin/articles/create') ? 'text-blue-500' : '' }}">new articles</a>--}}
{{--                </li>--}}
{{--                <span class="font-semibold mb-4">Articles category</span>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/articles/categories/index" class="{{ request()->is('admin/articles/categories') ? 'text-blue-500' : '' }}">all category</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/articles/categories/index/create" class="{{ request()->is('admin/articles/categories/create') ? 'text-blue-500' : '' }}">new category</a>--}}
{{--                </li>--}}
{{--                <span class="font-semibold mb-4">hashtag</span>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/hashtag" class="{{ request()->is('admin/hashtag') ? 'text-blue-500' : '' }}">all articles</a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/hashtag/create" class="{{ request()->is('admin/hashtag/create') ? 'text-blue-500' : '' }}">new articles</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                                        <a href="/{{app()->getLocale()}}/admin/products/products_prices" class="{{ request()->is('/admin/products/products_prices') ? 'text-blue-500' : '' }}">11111111111</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="/{{app()->getLocale()}}/admin/products/products_prices/create" class="{{ request()->is('admin/products/products_prices/create') ? 'text-blue-500' : '' }}">новый продукт</a>--}}
{{--                </li>--}}
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
