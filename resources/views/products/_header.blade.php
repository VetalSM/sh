<header class="max-w-xl mx-auto  text-center">

    <h1 class=" text-6xl lg:text-5xl Tangerine">
        Made<span  style="color: #3B82F6">IS</span>
    </h1>
    <div>
        <h5 class="text-2xl lg:text-xl ">
            {{  __('Віддушки')}} <span style="color: #3B82F6">{{  __('CANDLESCIENCE')}}</span> {{  __('купити в Україні')}}
        </h5>
    </div>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:hidden lg:inline-flex bg-gray-100 rounded-xl">
            <x-category-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex   bg-gray-100 rounded-xl px-3 py-1">
            <form method="GET" action="/{{app()->getLocale()}}">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text"
                       name="search"
                       style="position: relative; top: -4px !important; "
                       placeholder="{{__('Пошук')}}"
                       class="bg-transparent  items-center placeholder-black font-semibold "
                       value="{{ request('search') }}"
                >
                    <input type="image" src="/images/1.png" class="xs:hidden rounded-full"  alt="Submit" style="width:28px;
                    position: relative; top: 4px !important;"/>
            </form>
        </div>
    </div>
</header>
