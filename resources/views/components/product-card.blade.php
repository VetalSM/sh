@props(['product'])
@if(App::currentLocale()==='ru' && isset($product->title_ru))
    @php
        $title = $product->title_ru;
        $excerpt = $product->excerpt_ru;
    @endphp
@else
    @php
        $title = $product->title;
        $excerpt = $product->excerpt;
    @endphp
@endif
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<article
    {{ $attributes->merge(['class' => 'card-group transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-4 px-5 h-full flex flex-col text-center ">
        <div class="">
            <x-status-product :product="$product"/>
        </div>


        <div class="py-6  flex flex-col justify-between  flex-1  ">
            <header>
                <div style="float:left;">
                    <x-category-button :category="$product->category"/>
                </div>
                <div style="float:right;">
                    <a class=" transition-colors italic text-sm duration-300 py-2 px-2 font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
                       href="/{{app()->getLocale()}}/products/{{ $product->slug }}"
                    >{{__("Повний опис")}}</a>
                </div>
                <div class="mt-10 lg:mt-8  ">
                    <div class=" text-2xl">
                        <a href="/{{app()->getLocale()}}/products/{{ $product->slug }}">
                            {{ $title }}
                        </a>


                    </div>
                    <div class="mt-2">
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
                            <div class="mt-39 lg:mt-3  text-center">
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
                                         &nbsp;{{__("Кількість оцінок")}}
                                        </span>
                                @else
                                    <span>
                                            &nbsp;{{__("Немає оцінок")}}
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="mt-3 lg:mt-3 card-text" style=" line-height: 1.4em;">
                {!! $excerpt !!}
            </div>
            <footer class=" mt-10 lg:mt-3">
                <div class="text-center">
                    <form action="{{ route('cart.store', app()->getLocale()) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        @php

                            $prices = DB::table('prices')->where('name', "$product->prices")->get();
                              $sorted = $prices->sortBy('price');
                        @endphp
                        <input type="hidden" value="{{ $product->id . time()}}" name="id">
                        <select name="price" class="bt rounded-full py-2 px-1" style="float:left;">
                            @foreach ($sorted as $price)
                                <option value="{{ $price->price }} "
                                @if ($price->weight === "10" && $price->unit === 'г')
                                    {{'selected="selected"'}}
                                    @endif
                                >
                                    {{$price->weight}}{{$price->unit}} {{$price->price}}{{$price->currency}}
                                </option>
                            @endforeach
                        </select>
{{--                                <option class="rounded-full "--}}
{{--                                        value="{{$price->price}}">{{$price->weight}}{{$price->unit}} {{$price->price}}{{$price->currency}}</option>--}}
{{--                        @endforeach--}}
                        </select>
                        <input type="hidden" value="{{$product->prices}}" name="prices">
                        <input type="hidden" value="{{$product->id}}" name="prod_id">
                        <input type="hidden" value="{{$title}}" name="name">
                        <input type="hidden" value="{{ $product->thumbnail }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        @if($product->status !== "ends")
                            <button
                                class=" cartbutton transition-colors  hover: rounded-3xl py-2 px-1 " style="float:right;">
                                 {{__("Купити")}}
                            </button>
                        @else
                            <button type="button" style=" pointer-events: none; background-color: #c0bebe;"
                                    class="transition-colors  hover: rounded-3xl py-2 px-1 " style="float:right;" disabled>{{__("Закінчився")}}
                            </button>
                        @endif

                    </form>
                </div>
            </footer>
        </div>
    </div>
</article>
