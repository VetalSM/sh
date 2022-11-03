@auth
    <x-panel>
        <form method="POST" action="/products/{{ $product->slug }}/comments">
            @csrf

            <header class="flex items-center">

                <h4 class="ml-4">Залишити відгук</h4>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-2xl lg:text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder=":))"
                    required></textarea>

                @error('body')
                <span class="text-3xl lg:text-xl text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold text-4xl lg:text-sm">
        <a href="/register" class="hover:underline">Зареєструйтеся</a> або
        <a href="/login" class="hover:underline">Увійдіть</a> для коментування.
    </p>
@endauth
