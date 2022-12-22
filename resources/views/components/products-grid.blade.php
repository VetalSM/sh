@props(['products'])



@if ($products->count() >= 0)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($products->skip(0) as $product)
            @if($product->status !== "not_available")
            <x-product-card
                :product="$product"
                class="{{ $loop->iteration < 3 ? 'col-span-2' : 'col-span-2' }}"></x-product-card>
            @else

            @endif
        @endforeach
    </div>
@endif
