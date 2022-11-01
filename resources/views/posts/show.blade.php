<x-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >



    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

                {{--                <p class="mt-4 block text-gray-400 text-xs">--}}
                {{--                    Published--}}
                {{--                    <time>{{ $post->created_at->diffForHumans() }}</time>--}}
                {{--                </p>--}}

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
                    <div >
                        <div class="text-xs py-2 px-10  flex items-center lg:justify-center">
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

                        <form action="{{url('/add-rating')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$post->id}}">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Оцінити {{$post->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="rating-css">
                                                <div class="star-icon">
                                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                    <label for="rating1" class="fa fa-star"></label>
                                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                                    <label for="rating2" class="fa fa-star"></label>
                                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                                    <label for="rating3" class="fa fa-star"></label>
                                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                                    <label for="rating4" class="fa fa-star"></label>
                                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                                    <label for="rating5" class="fa fa-star"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="rounded-2xl btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                                            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2.5 px-8 rounded-2xl hover:bg-blue-600">Оцінити</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    @if(!empty(auth()->id()))
                        <button type="button" class="bg-blue-500 text-white uppercase font-semibold text-xs py-1 px-6 rounded-2xl hover:bg-blue-600" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Оцінити
                        </button>
                    @endif
<div><p></p></div>
                </div>
                <div>
                    @if(@auth()->id() > 0)
                        @auth()
                    <form  action="{{ route('cart.store') }}" method="POST"
                           enctype="multipart/form-data">
                        @csrf
                        @php
                            $prices = DB::table('price')->get();
                        @endphp
                        <input type="hidden" value="{{ $post->id . time()}}" name="id">
                        <select name="price" class="bt">
                            @foreach ($prices as $price)
                                <option value="{{$price->price}}">{{$price->weight}}г {{$price->price}}грн</option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{$post->title  }}" name="name">
                        <input type="hidden" value="{{$price->weight }}" name="weight">
                        <input type="hidden" value="{{ $post->thumbnail }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button
                            class="cartbutton transition-colors text-xm font-semibold hover: rounded-full py-2 px-2" style="margin-left: 40px;">

                            Купити
                        </button>
                    </form>
                    @endauth
                    @else
                        <p class="font-semibold">
                            <a href="/register" class="hover:underline">Зареєструйтеся</a> або
                            <a href="/login" class="hover:underline">Увійдіть</a> для покупок.
                        </p>
                    @endif
            </div>
            </div>
            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        До каталогу
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category"/>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">{!! $post->body !!}</div>
            </div>

            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include ('posts._add-comment-form')

                @foreach ($post->comments as $comment)
                    <x-post-comment :comment="$comment"/>
                @endforeach
            </section>
        </article>
    </main>
</x-layout>
