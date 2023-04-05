@props(['article'])

@if(App::currentLocale()==='ru' && isset($article->title_ru))
    @php
        $title = $article->title_ru;
        $excerpt = $article->excerpt_ru;
    @endphp
@else
    @php
        $title = $article->title;
        $excerpt = $article->excerpt;
    @endphp
@endif
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

<article
    {{ $attributes->merge(['class' => 'card-group transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="lg:py-4 lg:px-5 py-3 px-4 h-full flex flex-col text-center ">

        <div class=" text-center ">
@if($article->status == "8")
    @auth()
        <p>in editing</p>
    @endauth
@endif
            <img  src="{{ asset('storage/' . $article->thumbnail) }}" loading="lazy"
                  alt="{{$article->title}}" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
        </div>


        <div class="py-2  flex flex-col justify-between  flex-1  ">
            <header>
                <div style="float:left;">

                    <x-articles.category-art-button :category="$article->category"/>
                </div>
                <div style="float:right;">
                       <span
                           class=" transition-colors  text-sm duration-300 py-1 px-2 font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
                           style=" opacity: 0.8; ">
                               {{$article->created_at->format("d-m-Y")}}
                            </span>
                </div>
                <div class="mt-10 lg:mt-10  ">
                    <div>
                        <a href="/{{app()->getLocale()}}/articles/{{ $article->slug }}"  >
                            <h3>{{ $title }}</h3>
                        </a>
                    </div>
                    <div class="mt-3">
                        @php
                            $ratings = \App\Models\Rating::where('prod_id', 'art.'.$article->id)->get();
                            $rating_sum =  \App\Models\Rating::where('prod_id', 'art.'.$article->id)->sum('stars_rated');
            if($ratings!==0 && $rating_sum!==0){
                            $rating_value = $rating_sum/$ratings->count();
                            $rate_num = number_format($rating_value);}else{
                $rate_num=0;
                            }
                        @endphp
                        <div>

                            <div >
                                @for($i=1; $i<=$rate_num; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $rate_num+1;$j <=5;$j++)
                                    <i class="fa fa-star nochecked "></i>
                                @endfor
                                @if($rate_num >0)
                                    <span class="font-bold">
                                      &nbsp;  {{ $ratings->count() }}
                                    </span>
                                        <span class="text-sm">
                                         &nbsp;  {{  __("Кількість оцінок")}}
                                        </span>
                                @else
                                        <span class="text-sm">
                                            &nbsp; &nbsp;  {{  __("Немає оцінок")}}
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="mt-39 lg:mt-3  text-center">

{{--                                    <span>--}}
{{--                                        <noindex><a rel="nofollow" class=" transition-colors  text-xs  py-2 px-2 font-semibold  "--}}
{{--                                             href="/{{app()->getLocale()}}/products/{{ $article->slug }}/#comment"--}}
{{--                                          >{{__("Коментарі")}} ({{\App\Models\Comment::all()->where('product_id', $article->id)->count('product_id')}})</a></noindex>--}}
{{--                                    </span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <footer class=" mt-10 lg:mt-3">
                <div class="text-center">
                        <span name="price" class="transition-colors  text-sm duration-300 py-2 px-1 font-semibold bg-gray-100 hover:bg-gray-300 rounded-full  bt " style="color: #000000; float:left;">
                            <img class="inline px-1" src="/images/view.png" alt="" style="width: 28px;position: relative;  bottom: 3px !important;">
                            {{  $article->views }}
                        </span>
                    <span style="float:right;">
                        <a class="   italic    cartbutton_art transition-colors  hover: rounded-3xl py-2 px-1 "
                           style="text-decoration: none;  border: 1px solid rgb(255, 179, 0);float:right;"
                           href="/{{app()->getLocale()}}/articles/{{ $article->slug }}"
                        >{{__("Повний опис")}}</a>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</article>
