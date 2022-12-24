{{--@auth--}}
    <x-panel>
        <form method="POST" action="/products/{{ $product->slug }}/comments">
            @csrf

            <header class="flex items-center">

                <h4 class="ml-4">Залишити відгук:</h4>
            </header>

            <div class="mt-6">

                <p class="block mb-2 uppercase font-bold text-xs text-gray-700   w-full rounded mt-6">Ім'я</p>
                <input type="text"  name="name"  value="{{old('name')}}"  class="text-2xl lg:text-sm border border-gray-200  p-2 w-full rounded" required/>
                <p class="block mb-2 uppercase font-bold text-xs text-gray-700   w-full rounded mt-6">Телефон</p>
                <input type="text"  name="tel"  value="{{old('tel')}}"  class="text-2xl lg:text-sm border border-gray-200  p-2 w-full rounded" required/>
                <x-form.error name="tel"/>

                <textarea
                    name="body"
                    class="w-full text-2xl mt-6 border border-gray-200  w-full rounded lg:text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder=":))"

                    required>{{old('body')}}</textarea>

                @error('body')
                <span class="text-xl lg:text-xl text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-2 border-t border-gray-200">
                <x-form.button>Опублікувати</x-form.button>
            </div>
        </form>
    </x-panel>
{{--@else--}}
{{--    <p class="font-semibold ">--}}
{{--        <a href="/register" class="hover:underline">Зареєструйтеся</a> або--}}
{{--        <a href="/login" class="hover:underline">Увійдіть</a> для коментування.--}}
{{--    </p>--}}
{{--@endauth--}}
