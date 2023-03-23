
@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
@if (session()->has('order'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3  text-sm"
    >
        <p>{{ session('order') }}</p>
    </div>
@endif
@if ( Cart::getContent()->count()) {
<div class="fixed  py-1 px-3 rounded-full bottom-3 right-3   text-xl" style="background-color:hsla(0,0%,100%,0.71);">
    <a href="{{ route('cart.list',app()->getLocale()) }}" class="flex mr-18 items-center">
        <img src="/images/cart12.png" alt="cart" width="35" height="35">
        <i class=" text-lg lg:text-xl "style=" padding: 0.5em 20px 11px 0px;font-weight: 600;">
            <span>  {{__("До кошику")}}</span></i></a>

</div>
@endif
@if (session()->has('prod_cart'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-3 px-3 rounded-full bottom-3 right-3   text-xl"

    >
        <i   class=" py-2 px-4 rounded-xl bottom-3 right-3   text-xl">{{ session('prod_cart') }}</i >


    </div>

@endif

