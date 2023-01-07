<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 font-semibold w-full lg:w-50 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords(__("$currentCategory->name")) :  __('Всі категорії') }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="/{{app()->getLocale()}}/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home') && is_null(request()->getQueryString())"
    >
         {{  __('Всі')}}
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="/{{app()->getLocale()}}/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active='request()->fullUrlIs("*?category={$category->slug}*")'
        >
            {{  __(ucwords($category->name))}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
