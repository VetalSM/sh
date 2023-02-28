<header class="max-w-xl mx-auto  px-2 text-center">
    @auth
        <form action="{{ route('cart.clear',app()->getLocale()) }}" method="POST">
            @csrf
            <button >{{__("к")}}</button>
        </form>
    @endauth
{{--    <div class="  bg-blue-200 border-opacity-5  rounded-full text-center py-1 px-1 " style="background-color: rgb(254 215 170);">--}}
{{--        <div class="py-1 ">--}}
{{--            <div class="px-3  inline">--}}
{{--                <span class=" text-sm  lg:text-base  text-black inline  px-1 rounded-full" style=" font-weight: 600;">Економте разом із Made</span><span style="color:#3B82F6; font-weight: 600;">IS</span>!--}}
{{--                <br>--}}
{{--                        <h7  style="color: rgba(255,26,26,0.84)">5% </h7> від  <h7 style="color: rgba(255,26,26,0.84)">500грн!</h7>&nbsp;&nbsp;&nbsp;--}}
{{--                <h7  style="color: rgba(255,26,26,0.84)">10% </h7>від <h7 style="color: rgba(255,26,26,0.84)">2000грн!</h7><br>--}}
{{--                <h7  style="color: rgba(255,26,26,0.84)">8% </h7>від <h7 style="color: rgba(255,26,26,0.84)">1000грн!</h7>&nbsp;--}}
{{--                        <h7  style="color: rgba(255,26,26,0.84)">12% </h7>від <h7 style="color: rgba(255,26,26,0.84)">3000грн!</h7><br>--}}
{{--                 Знижки будуть нараховані при оформленні замовлення у кошику у відсотках відповідно до суми замовлення!<br/>--}}
{{--                Акція діє з 23.02 по 28.02 включно.--}}


{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
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
                    <input type="image" src="/images/1.png" class="hidden lg:inline-flex rounded-full"  alt="Submit" style="width:28px;
                    position: relative; top: 4px !important;"/>
            </form>
        </div>
    </div>
</header>
