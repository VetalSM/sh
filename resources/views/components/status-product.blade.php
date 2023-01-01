@props(['product'])

@if($product->status=== 'new')
   <div class=" text-center bd_item bd_item_new">

        <img loading="lazy" src="{{ asset('storage/' . $product->thumbnail) }}"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
        </div>
@elseif($product->status==="promotion")
                <div class=" text-center bd_item bd_item_Promotion">
                    <img loading="lazy" src="{{ asset('storage/' . $product->thumbnail) }}"
                         alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
                    </div>
@elseif($product->status==="sale")
    <div class=" text-center ">

        <img  loading="lazy" src="{{ asset('storage/' . $product->thumbnail) }}"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

@elseif($product->status==="hit")
    <div class=" text-center ">

        <img  loading="lazy" src="{{ asset('storage/' . $product->thumbnail) }}"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

@elseif($product->status==="expect")
    <div class=" text-center ">

        <img loading="lazy" src="{{ asset('storage/' . $product->thumbnail) }}"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

@else
                            <div class=" text-center ">

                                <img loading="lazy" src="{{ asset('storage/' . $product->thumbnail) }}"
                                     alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
                                </div>

@endif



