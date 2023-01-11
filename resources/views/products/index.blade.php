
<x-layout>
    @include ('products._header')
    <div class=" d-flex justify-content-center ">
        <div class="  hidden lg:inline-flex py-1 mt-4">
        <p class="inline">{{ __('Категорії:') }}</p>
        <div class=" px-2  inline rounded-full"  style=" position: relative;" >
            @foreach (App\Models\Category::all() as $category)
                <div class="lg:px-1  inline text-black rounded-full" >
                    <a class="lg:px-2  inline text-black rounded-full" style=" text-decoration: none; border: 3px solid rgb(150,223,239); background-color: #f1ebeb;"
                       href="/{{app()->getLocale()}}/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}">
                        {{  __(ucwords($category->name))}}
                    </a>
                </div>
            @endforeach
        </div>
        <div  class=" inline float-right ">

        </div>
    </div>
    </div>

    <main class="max-w-6xl mx-auto mt-5 lg:mt-20 space-y-6">

        @if ($products->count())

            <x-products-grid :products="$products" />

        @else
            <p class="text-center">{{  __("В даній категорії наразі немає товарів. Але трохи пізніше вони обов'язково з'являться:))")}}</p>
        @endif
    </main>
</x-layout>
