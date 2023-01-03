
<x-layout>
    <x-setting heading="Новый остаток для товара">
        <form method="POST" action="/admin/products/balance_products" enctype="multipart/form-data">
            @csrf

            <select name="product_id" class="bt rounded-full ">
                @foreach (\App\Models\Product::all() as $product)
                    <option class="rounded-full"
                            value="{{$product->id}}">{{$product->title}}</option>

                @endforeach
            </select>

            <input type="number" placeholder="сколько пришло" name="count" value="{{old('count')}}" class="border  text-2xl lg:text-base border-gray-200  py-2 px-2 w-full rounded" required/>
            {{--            <x-form.input name="count" :value="old('name', $balanceProduct->count)" required />--}}
            <x-form.input name="unit" :value="old('unit')"  required/>
            <x-form.input name="expected" :value="old('expected')"  required/>
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
