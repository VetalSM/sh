@props(['post'])
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >

<article

    {{ $attributes->merge(['class' => 'text-4xl lg:text-sm card-group transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-4 px-5 h-full flex flex-col text-center text-4xl lg:text-sm">
{{--        <div class="py-6 px-5 h-full flex-col">--}}
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}"
                 alt=" Post illustration" class=" card-img-top rounded-xl">
        </div>

        <div class="py-6  flex flex-col justify-between  flex-1  ">
            <header>

                <div  style="float:left;">
                    <x-category-button :category="$post->category " />
                    {{--                   <span class="">--}}
                </div>
                <div style="float:right;">

                    <a class=" transition-colors duration-300  font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
                       href="/posts/{{ $post->slug }}"
                    >Більше інформації...</a>
                    {{--                   </span>--}}
                </div>

                <div class="mt-20 lg:mt-8 ">
                    <h1 class=" text-4xl lg:text-sm">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                    <div>
                        @php
                            $ratings = \App\Models\Rating::where('prod_id', $post->id)->get();
                            $rating_sum =  \App\Models\Rating::where('prod_id', $post->id)->sum('stars_rated');
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


            <div class="mt-10 lg:mt-3 card-text">
                {!! $post->excerpt !!}

            </div>

            <footer class=" mt-10 lg:mt-3">
                <div class=" text-4xl lg:text-sm text-center">
                    <form  action="{{ route('cart.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @php
                            $prices = DB::table('price')->get();
                        @endphp
                        <input type="hidden" value="{{ $post->id . time()}}" name="id">
                        <select name="price" class="bt rounded-full py-2 px-2 " style="float:left;">
                            @foreach ($prices as $price)
                                <option class="rounded-full" value="{{$price->price}}">{{$price->weight}}г {{$price->price}}грн</option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{$post->title  }}" name="name">
                        <input type="hidden" value="{{$price->weight }}" name="weight">
                        <input type="hidden" value="{{ $post->thumbnail }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button
                            class="cartbutton transition-colors  font-semibold hover: rounded-full ml-6 py-2 px-2" >
                            Купити
                        </button>
                    </form>

                    {{--                <div class="flex items-center text-sm">--}}
{{--                                        <img src="/images/author.svg" alt="author"width="30" height="16">--}}
{{--                    <div class="ml-3">--}}
{{--                                                <h5 class="font-bold">--}}
{{--                                                    <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>--}}
{{--                                                </h5>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <a href="/posts/{{ $post->slug }}"--}}
{{--                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"--}}
{{--                    >Read More</a>--}}
{{--                </div>--}}
                </div>



            </footer>
        </div>
    </div>

</article>
