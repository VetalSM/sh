@props(['products'])

{{--@php--}}
{{--    $prod = \App\Models\Product::where('status', 'not_available')->get();--}}
{{--    $unsetId=[];--}}
{{--        $id=[];--}}
{{--         foreach ($prod as $prodID){--}}
{{--             $id[] = $prodID->id;--}}

{{--         }--}}
{{--         foreach($id as $key=>$value){--}}
{{--             $unsetId[$value]=$key;--}}

{{--              $products = $products->forget($value);--}}
{{--         }--}}
{{--$products = $products->forget($unsetId);--}}
{{--$count = $products->count();--}}
{{--//var_dump($count)--}}
{{--@endphp--}}


@if ($products->count() >= 0)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($products->skip(0) as $product)
            @if($product->status !== "8")
            <x-product-card
                :product="$product"
                class="{{ $loop->iteration < 3 ? 'col-span-2' : 'col-span-2' }}"></x-product-card>
{{--            @else--}}

            @endif
        @endforeach
    </div>
@endif
