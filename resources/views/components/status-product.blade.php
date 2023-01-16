@props(['product'])

@if($product->status=== '2')
   <div class=" text-center bd_item ">
       <span class="  bd_item_new">{{__('Новинка!!!')}}</span>
        <img  src="{{ asset('storage/' . $product->thumbnail) }}" loading="lazy"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
        </div>
@elseif($product->status==="1")
                <div class=" text-center bd_item ">
                    <span class="  bd_item_Promotion">{{__('Акція!!!')}}</span>
                    <img  src="{{ asset('storage/' . $product->thumbnail) }}" loading="lazy"
                         alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
                    </div>
@elseif($product->status==="7")
    <div class=" text-center ">

        <img  src="{{ asset('storage/' . $product->thumbnail) }}" loading="lazy"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

@elseif($product->status==="3")
    <div class=" text-center ">

        <img   src="{{ asset('storage/' . $product->thumbnail) }}" loading="lazy"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

@elseif($product->status==="6")
    <div class=" text-center ">

        <img src="{{ asset('storage/' . $product->thumbnail) }}" loading="lazy"
             alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

@else
                            <div class=" text-center ">

                                <img  src="{{ asset('storage/' . $product->thumbnail) }}" loading="lazy"
                                     alt="{{$product->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
                                </div>

@endif



