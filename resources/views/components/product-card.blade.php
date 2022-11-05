@props(['product'])
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
<article
    {{ $attributes->merge(['class' => 'card-group transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-4 px-5 h-full flex flex-col text-center ">
        <div>
            <img src="{{ asset('storage/' . $product->thumbnail) }}"
                 alt=" Product illustration" class=" card-img-top rounded-xl">
        </div>
        <div class="py-6  flex flex-col justify-between  flex-1  ">
            <header>
                <div  style="float:left;">
                    <x-category-button :category="$product->category " />
                </div>
                <div style="float:right;">
                    <a class=" transition-colors duration-300  font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
                       href="/products/{{ $product->slug }}"
                    >Більше інформації...</a>
                </div>
                <div class="mt-20 lg:mt-8 ">
                    <h1 >
                        <a href="/products/{{ $product->slug }}">
                            {{ $product->title }}
                        </a>
                    </h1>
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
                                         &nbsp;   Кількість оцінок
                                        </span>
                                @else
                                    <span>
                                            &nbsp; Немає оцінок
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="mt-10 lg:mt-3 card-text" style=" line-height: 1.1em;">
                {!! $product->excerpt !!}
            </div>
            <footer class=" mt-10 lg:mt-3">
                <div class="text-center">
                    <form  action="{{ route('cart.store') }}" method="POST"
                           enctype="multipart/form-data">
                        @csrf
                        @php
                            $prices = DB::table('price')->get();
                        @endphp
                        <input type="hidden" value="{{ $product->id . time()}}" name="id">
                        <select name="price" class="bt rounded-full py-2 px-2 " style="float:left;">
                            @foreach ($prices as $price)
                                <option class="rounded-full" value="{{$price->price}}">{{$price->weight}}г {{$price->price}}грн</option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{$product->title  }}" name="name">
                        <input type="hidden" value="{{$price->weight }}" name="weight">
                        <input type="hidden" value="{{ $product->thumbnail }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button
                            class="cartbutton transition-colors  hover: rounded-3xl ml-6 py-2 px-2" >
                            Купити
                        </button>
                    </form>
                </div>
            </footer>
        </div>
    </div>
</article>
