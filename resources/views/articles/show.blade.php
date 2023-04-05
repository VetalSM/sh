<x-articles.layout-art>

    @if(App::currentLocale()==='ru' && isset($article->title_ru))
        @php
            $title = $article->title_ru;
            $body = $article->body_ru;
              $excerpt = $article->excerpt_ru;
        @endphp
        @section('title')
            {{$title}}| Всё про свечи | Украина MadeIS
        @endsection
        @section('title_m')
            {{$article->meta_title_ru}}
        @endsection
        @section('description')
            {{$article->meta_description_ru}}
        @endsection
        @section('keywords')
            {{$article->meta_keywords}}
        @endsection
    @else
        @php
            $title = $article->title;
             $body = $article->body;
             $excerpt = $article->excerpt;
        @endphp
        @section('title')
            {{$title}} | Виготовлення свічок | MadeIS Україна
        @endsection
        @section('title_m')
            {{$article->meta_title}}
        @endsection
        @section('description')
            {{$article->meta_description}}
        @endsection
        @section('keywords')
            {{$article->meta_keywords}}
        @endsection

    @endif
    @section('og:image')
        {{ asset('storage/' . $article->thumbnail) }}
    @endsection
    @section('og:title')
        {{$title}}
    @endsection
        @php
             $excerpt = strip_tags($excerpt);
        @endphp
    @section('og:description')
        {{ strip_tags($excerpt)}}
    @endsection
    @section('og:page_url')
        {{url()->current()}}
    @endsection
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <main class="max-w-6xl mx-auto px-3 mt-5 lg:mt-20 space-y-6">
        <article class="max-w-4sm mx-auto lg:grid lg:grid-cols-11 gap-x-5">
            <div class="col-span-4  lg:pt-14  ">
                <div class=" text-center ">
                    <div class=" text-center ">

                        <img  src="{{ asset('storage/' . $article->thumbnail) }}" loading="lazy"
                              alt="{{$article->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
                    </div>
                </div>

                </div>
            <div class="col-span-7">
                <h1 class="font-bold text-2xl lg:text-3xl text-center  mt-3 lg:mt-0 mb-4">
                    {{$title}}
                </h1>
                <div class=" rounded-xl " style="line-height: 1.5em; background-color: rgba(230,232,230,0.47)">
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
                        {{  __("Назад")}}
                    </a>


{{--           <a rel="nofollow" href="#comment"--}}
{{--                                class="transition-colors duration-300 relative inline-flex  hover:text-blue-500"--}}
{{--                                style="float:right;">--}}
{{--                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">--}}
{{--                                <g fill="none" fill-rule="evenodd">--}}
{{--                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">--}}
{{--                                    </path>--}}
{{--                                    <img class="" src="/images/comment.svg" alt="comment" rel=”nofollow" width="15"--}}
{{--                                         height="15">--}}
{{--                                </g>--}}
{{--                            </svg>&nbsp;--}}
{{--                            {{  __("Коментарі")}}--}}
{{--                            ({{\App\Models\Comment::all()->where('product_id', $article->id)->count('product_id')}})--}}
{{--                        </a>--}}
                    @php
                        $ratings = \App\Models\Rating::where('prod_id', 'art.'.$article->id)->get();
                        $rating_sum =  \App\Models\Rating::where('prod_id','art.'.$article->id)->sum('stars_rated');
                        if($ratings!==0 && $rating_sum!==0){
                        $rating_value = $rating_sum/$ratings->count();
                        $rate_num = number_format($rating_value);}else{
                        $rate_num=0;
                        }
                    @endphp
                    <div>

                        <div>
                            <div class="d-inline " style="padding-left: 5px;">

                            @for($i=1; $i<=$rate_num; $i++)
                                <i class=" fa fa-star checked"></i>
                            @endfor
                            @for($j = $rate_num+1;$j <=5;$j++)
                                <i class="fa fa-star nochecked "></i>
                            @endfor
                            @if($rate_num >0)
                            </div>
                                <span class="d-inline-block font-bold">
                                      &nbsp;  {{ $ratings->count() }}
                                    </span>
                                <span class=" text-sm">
                                         &nbsp;  {{  __("Кількість оцінок")}}
                                        </span>

                                    <hr style="height:2px; margin-bottom: 0rem;"/>
                            @else
                                    <span class=" text-sm">
                                            &nbsp; &nbsp;  {{  __("Немає оцінок")}}
                                        </span>
                                    <hr style="height:2px;"/>
                            @endif
                        </div>
                    </div>
                    <div class="px-2 mb-4 space-y-4 leading-loose" style=" line-height: 1.5em;">
                        {!! $excerpt !!}
                    </div>
                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
{{--                        @include ('products._add-comment-form')--}}
{{--                        @foreach ($article->comments as $comment)--}}
{{--                            <x-product-comment :comment="$comment"/>--}}
{{--                        @endforeach--}}
                    </section>
                </div>

            </div></article>

       <div class="px-2"> {!! $body !!}</div>
        <hr style="height:2px;"/>
        <div>     <span class="font-semibold">{{__('Пошук за хештегами:')}}</span>
        @foreach($article->hashtags as $hashtag)
         <span class="px-4">   <a style=" text-decoration: none" href="/{{app()->getLocale()}}/articles/?hashtag={{ $hashtag->name }}&{{ http_build_query(request()->except('hashtag', 'page')) }}"  >
                @if(App::currentLocale()==='ua')
                #{{__(ucwords($hashtag->name))}}
                 @else
                     #{{__(ucwords($hashtag->name_ru))}}
                @endif
            </a></span>

        @endforeach
        </div>
        <hr style="height:2px;"/>
        <div>
            <div>
                <div>

            <form action="{{url('/'.app()->getLocale().'/add-rating')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="art.{{$article->id}}">
                <div class="modal fade" id="exampleModal" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title " id="exampleModalLabel">
                                    {{  __("Оцінити")}} {{$article->title}}</h5>
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
                                        class=" bg-blue-500 text-white uppercase font-semibold text-xl lg:text-sm py-2.5 px-8 rounded-2xl hover:bg-blue-600">
                                    {{  __("Оцінити")}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
            <div class="d-inline-block">
        <button type="button" class="inline-block bg-blue-500 text-white   py-1 px-6 rounded-2xl hover:bg-blue-600"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
            {{  __("Оцінити")}}
        </button>
        </div>
        <span class="inline-block  py-1 px-6 float-right" >{{$article->created_at->format("d-m-Y")}}</span>
            <span class="inline-block   py-1 float-right" >{{__('Перегляди:')}} {{$article->views}}</span>
        </div>
    </main>

</x-articles.layout-art>
