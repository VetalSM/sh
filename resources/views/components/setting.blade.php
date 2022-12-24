@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/admin/products" class="{{ request()->is('admin/products') ? 'text-blue-500' : '' }}">All Product</a>
                </li>

                <li>
                    <a href="/admin/products/create" class="{{ request()->is('admin/products/create') ? 'text-blue-500' : '' }}">New Product</a>
                </li> <li>
                    <a href="/admin/products/price" class="{{ request()->is('admin/products/price') ? 'text-blue-500' : '' }}">All price</a>
                </li>
                <li>
                    <a href="/admin/products/price/create" class="{{ request()->is('admin/products/price/create') ? 'text-blue-500' : '' }}">New price</a>
                </li>
                <li>
                    <a href="/admin/products/comments" class="{{ request()->is('/admin/products/comments') ? 'text-blue-500' : '' }}">comments</a>
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
