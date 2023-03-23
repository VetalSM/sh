
<x-layout>
    <x-setting heading="Новый остаток для товара">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/products_prices" enctype="multipart/form-data">
            @csrf

            <select name="product_id" class="bt rounded-full " >
                @foreach (\App\Models\Product::all() as $product)
                    <option class="rounded-full"
                            value="{{$product->id}}" >{{$product->title}}</option>
                @endforeach

                <option value="none" selected  hidden>
                    Выбери продукт!!!
                </option>
            </select>
            <p/>

            <x-form.input type="text" placeholder="price" name="price" value="{{old('price')}}" class="border  text-2xl lg:text-base border-gray-200  py-2 px-2 w-full rounded" required/>
            <x-form.input type="text" placeholder="deliver_usa" name="deliver_usa" value="{{old('deliver_usa')}}" class="border  text-2xl lg:text-base border-gray-200  py-2 px-2 w-full rounded" required/>
            <x-form.input type="text" placeholder="deliver_ukr" name="deliver_ukr" value="{{old('deliver_ukr')}}" class="border  text-2xl lg:text-base border-gray-200  py-2 px-2 w-full rounded" required/>
            <x-form.input type="text" placeholder="other" name="other" value="{{old('other')}}" class="border  text-2xl lg:text-base border-gray-200  py-2 px-2 w-full rounded" required/>
            <x-form.input type="text" placeholder="tax" name="tax" value="{{old('tax')}}" class="border  text-2xl lg:text-base border-gray-200  py-2 px-2 w-full rounded" required/>
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
