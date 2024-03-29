<x-layout>

@if(App::currentLocale()==='ru' && isset($product->title_ru))
        @php
            $title = $product->title_ru;
            $body = $product->body_ru;
              $excerpt = $product->excerpt_ru;
        @endphp
        @section('title'){{$title}} Украина MadeIS @endsection
        @section('title_m'){{$product->meta_title_ru}}@endsection
        @section('description'){{$product->meta_description_ru}}@endsection
        @section('keywords'){{$product->meta_keywords}}@endsection
    @else
        @php
            $title = $product->title;
             $body = $product->body;
             $excerpt = $product->excerpt;
        @endphp
        @section('title'){{$title}} | Товари для свічок | MadeIS Україна@endsection
        @section('title_m'){{$product->meta_title}}@endsection
        @section('description'){{$product->meta_description}}@endsection
        @section('keywords'){{$product->meta_keywords}}@endsection

    @endif
    @section('og:image'){{ asset('storage/' . $product->thumbnail) }}@endsection
    @section('og:title'){{$title}}@endsection
    @section('og:description'){{$excerpt}}@endsection
    @section('og:page_url'){{url()->current()}}@endsection
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <main class="max-w-6xl mx-auto px-3 mt-10 lg:mt-20 space-y-6">
        <article class="max-w-5xl mx-auto lg:grid lg:grid-cols-12 gap-x-5">
            <div class="col-span-4  lg:pt-14  ">
                <div class=" text-center ">
                    <x-status-product :product="$product"/>
                    <div>
                        @php
                            $ratings = \App\Models\Rating::where('prod_id', $product->id)->get();
                            $rating_sum =  \App\Models\Rating::where('prod_id', $product->id)->sum('stars_rated');
                            if($ratings!==0 && $rating_sum!==0){
                            $rating_value = $rating_sum/$ratings->count();
                            $rate_num = number_format($rating_value);}else{
                            $rate_num=0;
                            }
                        @endphp
                        <div>
                            <div class="  mt-3 lg:mt-0 lg:text-center">
                                @for($i=1; $i<=$rate_num; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $rate_num+1;$j <=5;$j++)
                                    <i class="fa fa-star nochecked"></i>
                                @endfor
                                @if($rate_num >0)
                                    <span class="font-bold">
                                      &nbsp;  {{ $ratings->count() }}
                                    </span>
                                    <span>
                                         &nbsp;  {{  __("Кількість оцінок")}}
                                        </span>
                                @else
                                    <span>
                                            &nbsp; &nbsp;  {{  __("Немає оцінок")}}
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <form action="{{url('/'.app()->getLocale().'/add-rating')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title " id="exampleModalLabel">
                                                    {{  __("Оцінити")}} {{$product->title}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="rating-css">
                                                    <div class=" star-icon">
                                                        <input type="radio" value="1" name="product_rating" checked
                                                               id="rating1">
                                                        <label for="rating1" class="fa fa-star"></label>
                                                        <input type="radio" value="2" name="product_rating"
                                                               id="rating2">
                                                        <label for="rating2" class="fa fa-star"></label>
                                                        <input type="radio" value="3" name="product_rating"
                                                               id="rating3">
                                                        <label for="rating3" class="fa fa-star"></label>
                                                        <input type="radio" value="4" name="product_rating"
                                                               id="rating4">
                                                        <label for="rating4" class="fa fa-star"></label>
                                                        <input type="radio" value="5" name="product_rating"
                                                               id="rating5">
                                                        <label for="rating5" class="fa fa-star"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" rounded-2xl btn btn-secondary"
                                                        data-bs-dismiss="modal">{{  __("Закрити")}}
                                                </button>
                                                <button type="submit"
                                                        class="bg-blue-500 text-white uppercase font-semibold text-xl lg:text-sm py-2.5 px-8 rounded-2xl hover:bg-blue-600">
                                                    {{  __("Оцінити")}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button type="button" class="bg-blue-500 text-white  mt-2 py-1 px-6 rounded-2xl hover:bg-blue-600"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{  __("Оцінити")}}
                    </button>
                </div>
                <div class="  lg:mt-0 py-4 text-center " >
                    <form action="{{ route('cart.store', app()->getLocale()) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @php
                            $prices = DB::table('prices')->where('name', "$product->prices")->get();
                              $sorted = $prices->sortBy('price');
                        @endphp
                        <input type="hidden" value="{{ $product->id . time()}}" name="id">
                        @if($product->status==="1")
                            <select name="price" id="selectbox1" class="selectPrice bt rounded-full py-2 px-1"
                                    style="float:left;">
                                @php
                                    $button = false;
                                    $balanceProducts = \App\Models\BalanceProduct::with('orders')->where('product_id', $product->id)->get();
                                @endphp
                                @foreach ($sorted as $price)
                                    @foreach ($balanceProducts as $balance)
                                        @php

                                            $data= $balance->count - (\App\Models\Order::where('product_id', $balance->product_id)->sum('total'));
                                        @endphp
                                        @if((int)$balance->product_id === $product->id)
                                            @if($data >= $price->weight )
                                                @if((int)$price->weight <= $data)
                                                    @if( $data >=1)
                                                        @php
                                                            $button = true;

                                                        @endphp
                                                    @endif

                                                    <option
                                                        value="{{ \App\Models\Price::where('name', $product->prom_prices)->where('weight', $price->weight)->value('price') }} "
                                                    @if ($price->weight === "10" && $price->unit === 'г')
                                                        {{'selected="selected"'}}
                                                        @endif
                                                    >
                                                        {{$price->weight}}{{$price->unit}}  {{\App\Models\Price::where('name', $product->prom_prices)->where('weight', $price->weight)->value('price').$price->currency}} {{$price->price}}{{$price->currency}}
                                                    </option>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach

                            </select>
                            <input type="hidden" value="{{$product->prom_prices}}" name="prices">
                            <input type="hidden" value="{{$product->id}}" name="prod_id">
                            <input type="hidden" value="{{$title}}" name="name">
                            <input type="hidden" value="{{ $product->thumbnail }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                        @else
                            <select name="price" class="bt rounded-full py-2 px-1" style=" float:left;">

                                @php
                                    $button = false;
                                    $balanceProducts = \App\Models\BalanceProduct::with('orders')->where('product_id', $product->id)->get();
                                @endphp
                                @foreach ($sorted as $price)
                                    @foreach ($balanceProducts as $balance)
                                        @php

                                            $data= $balance->count - (\App\Models\Order::where('product_id', $balance->product_id)->sum('total'));
                                        @endphp
                                        @if((int)$balance->product_id === $product->id)
                                            @if($data >= $price->weight )
                                                @if((int)$price->weight <= $data)
                                                    @if( $data >=1)
                                                        @php
                                                            $button = true;

                                                        @endphp
                                                    @endif

                                                    <option value="{{ $price->price }} "
                                                    @if ($price->weight === "10" && $price->unit === 'г')
                                                        {{'selected="selected"'}}
                                                        @endif
                                                    >
                                                        {{$price->weight}}{{$price->unit}}  {{$price->price}}{{$price->currency}}
                                                    </option>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach


                            </select>
                            <input type="hidden" value="{{$product->prices}}" name="prices">
                            <input type="hidden" value="{{$product->id}}" name="prod_id">
                            <input type="hidden" value="{{$title}}" name="name">
                            <input type="hidden" value="{{ $product->thumbnail }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                        @endif

                        @php
                            $button = false;
                        @endphp
                        @foreach ($sorted as $price)
                            @foreach (\App\Models\BalanceProduct::all() as $balance)
                                @php
                                    $data= $balance->count - (\App\Models\Order::where('product_id', $balance->product_id)->sum('total'));
                                @endphp
                                @if((int)$balance->product_id === $product->id)
                                    @if($data >= $price->weight )
                                        @if((int)$price->weight <= $data)
                                            @php
                                                $button = true;
                                            @endphp
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                        @if($button === true && ($product->status !== "7"))
                            <button
                                class=" cartbutton transition-colors  hover: rounded-3xl  py-2 px-2 " style="float: right">
                                {{  __("Купити")}}
                            </button>
                        @else
                            <button type="button" style=" pointer-events: none; background-color: #c0bebe;"
                                    class="transition-colors  hover: rounded-3xl ml-6 py-2 px-2 "
                                    disabled>{{  __("Закінчився")}}
                            </button>
                        @endif
                    </form>

                </div>
            </div>
            <div class="col-span-7" style="margin-top: 20px;">
                <h1 class="font-bold text-2xl lg:text-3xl text-center  mt-0 lg:mt-0 mb-3">
                    {{$title}}
                </h1>
                <div>
                    <a href="{{session('prod_url')}}"
                       class="transition-colors duration-300 relative inline-flex  hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        {{  __("До каталогу")}}
                    </a>
                  <a rel="nofollow" href="#comment"
                       class="transition-colors duration-300 relative inline-flex  hover:text-blue-500" style="float:right;">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <img class="" src="/images/comment.svg" alt="comment" rel=”nofollow"  width="15" height="15">
                            </g>
                        </svg>&nbsp;
                        {{  __("Коментарі")}} ({{\App\Models\Comment::all()->where('product_id', $product->id)->count('product_id')}})
                    </a>


                    <div class=" mt-2 mb-4  space-y-4 leading-loose" style=" line-height: 1.5em;">
                        {!! $body !!}
                    </div>
                    @if(isset($product->ifra_certificate))
                        <div class="flex items-center  mt-1 lg:mt-0 ">
                            <a href="{{ asset('storage/' . $product->ifra_certificate) }}"
                               class="  py-1 px-2  border-opacity-8 mb-1 rounded-xl label inline-flex text-black"
                               target="_blank" style="  text-decoration: none;background-color: rgb(212 212 216);">
                                <img src="/images/ifra.png" alt="Logo" width="20" height="20"
                                     class="text-black rounded-l ">
                                <span class="  px-2" style="color: rgb(38,46,58)">IFRA Certificate</span>
                            </a>
                        </div>
                    @endif
                    @if(isset($product->safety))
                        <div class="flex items-center  mt-1 lg:mt-0">
                            <a href="{{ asset('storage/' . $product->safety) }}"
                               class="  py-1 px-2  border-opacity-8 mb-1 rounded-xl label inline-flex text-black"
                               target="_blank" style="  text-decoration: none;background-color: rgb(212 212 216);">
                                <img src="/images/pdf.png" alt="Logo" width="20" height="20"
                                     class="text-black rounded-l">
                                <span class="  px-2" style="color: rgb(38,46,58)">Safety Data Sheet</span>
                            </a>
                        </div>
                    @endif
                    @if(isset($product->certificate))
                        <div class="flex items-center  mt-1 lg:mt-0 ">
                            <a href="{{ asset('storage/' . $product->certificate) }}"
                               class="  py-1 px-2  border-opacity-8 mb-1 rounded-xl label inline-flex text-black"
                               target="_blank" style="  text-decoration: none;background-color: rgb(212 212 216);">
                                <img src="/images/pdf.png" alt="Logo" width="20" height="20"
                                     class="text-black rounded-l">
                                <span class="  px-2" style="color: rgb(38,46,58)">Certificate</span>
                            </a>
                        </div>
                    @endif
                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @include ('products._add-comment-form')
                        @foreach ($product->comments as $comment)
                            <x-product-comment :comment="$comment"/>
                        @endforeach
                    </section>
                </div>
            </div>
        </article>

    </main>
</x-layout>
