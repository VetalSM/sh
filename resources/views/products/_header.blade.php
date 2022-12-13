<header class="max-w-xl mx-auto mt-20 text-center">

    <h1 class=" text-6xl lg:text-5xl Tangerine">
        Made<span class="text-blue-500">IS</span>
    </h1>
    <div>
        <h5 class="text-2xl lg:text-xl ">
            Віддушки <span class="text-blue-700 ">CANDLESCIENCE</span> в Україні
        </h5>
    </div>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-category-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex  items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Пошук"
                       class="bg-transparent placeholder-black font-semibold "
                       value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
