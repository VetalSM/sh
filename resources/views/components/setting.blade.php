@props(['heading'])
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Меню</h4>

            <ul>
                <li >
                    <span class="font-semibold mb-4">Товары</span>
                </li>
                <li>
                    <a href="/{{app()->getLocale()}}/admin/products" class="{{ request()->is('admin/products') ? 'text-blue-500' : '' }}">Все товары</a>
                </li>

                <li>
                    <a href="/{{app()->getLocale()}}/admin/products/create" class="{{ request()->is('admin/products/create') ? 'text-blue-500' : '' }}">Новый товар</a>
                </li>
                <li>
                    <span class="font-semibold mb-4">Цены</span>
                </li>
                <li>
                    <a href="/{{app()->getLocale()}}/admin/products/price" class="{{ request()->is('admin/products/price') ? 'text-blue-500' : '' }}">Все цены</a>
                </li>
                <li>
                    <a href="/{{app()->getLocale()}}/admin/products/price/create" class="{{ request()->is('admin/products/price/create') ? 'text-blue-500' : '' }}">Новая цeна</a>
                </li>
                <li>
                <li>
                    <span class="font-semibold mb-4">Комментарии</span>
                <li>
                    <a href="/{{app()->getLocale()}}/admin/products/comments" class="{{ request()->is('/admin/products/comments') ? 'text-blue-500' : '' }}">Все комментарии</a>
                </li>
                <li>
                <a href="/{{app()->getLocale()}}/admin/products/comments/create" class="{{ request()->is('/admin/products/comments/create') ? 'text-blue-500' : '' }}">instagram</a>
                </li>
                <li>
                <li>
                    <span class="font-semibold mb-4">Категории</span>
                </li>
                    <a href="/{{app()->getLocale()}}/admin/products/categories" class="{{ request()->is('admin/products/categories') ? 'text-blue-500' : '' }}">Все категории</a>
                </li>
                <li>
                    <a href="/{{app()->getLocale()}}/admin/products/categories/create" class="{{ request()->is('admin/products/categories/create') ? 'text-blue-500' : '' }}">Новая категория</a>
                </li>
                <li>
                    <span class="font-semibold mb-4">Остатки</span>
                </li>
                <a href="/{{app()->getLocale()}}/admin/products/balance_products" class="{{ request()->is('admin/products/balance_products') ? 'text-blue-500' : '' }}">Все остатки</a>
                </li>
                <li>
                    <a href="/{{app()->getLocale()}}/admin/products/balance_products/create" class="{{ request()->is('admin/products/balance_products/create') ? 'text-blue-500' : '' }}">новый продукт</a>
                </li>
                <li>
                    <span class="font-semibold mb-4">Заказы</span>
                </li>
                <li>
                <a href="/{{app()->getLocale()}}/admin/products/orders" class="{{ request()->is('admin/products/orders') ? 'text-blue-500' : '' }}">Все заказы</a>
                </li>
                <li>
                    <a href="/{{app()->getLocale()}}/admin/products/orders_sort" class="{{ request()->is('/admin/products/orders_sort') ? 'text-blue-500' : '' }}">По дате</a>
                </li>
                <li>
                                        <a href="/{{app()->getLocale()}}/admin/products/orders_text" class="{{ request()->is('admin/products/orders_text') ? 'text-blue-500' : '' }}">Заявки на печать</a>
                </li>
                <li>
                    {{--                    <a href="/{{app()->getLocale()}}/admin/products/balance_products/create" class="{{ request()->is('admin/products/balance_products/create') ? 'text-blue-500' : '' }}">новый продукт</a>--}}
                </li>
                <li>
                    {{--                    <a href="/{{app()->getLocale()}}/admin/products/balance_products/create" class="{{ request()->is('admin/products/balance_products/create') ? 'text-blue-500' : '' }}">новый продукт</a>--}}
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
