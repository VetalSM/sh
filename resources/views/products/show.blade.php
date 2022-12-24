<x-layout>

    @section('title'){{$product->meta_title}}@endsection

        @section('description'){{$product->meta_description}}@endsection
        @section('keywords'){{$product->meta_keywords}}@endsection
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-5">
            <div class="col-span-4  lg:pt-14  "  >
                <div  class=" text-center " >
                    <script >// Снежинок на странице
                        var snowCountMax = 80;
                        // Массив цветов снега
                        var arrColor = ["#b9dff5","#b9dff5","#b9dff5","#b9dff5","#b9dff5"];
                        // Символ снежинки
                        var snowView = "*";
                        // Скорость падения (чем больше число, тем медленней)
                        var speed = 0.6;
                        // Максимальный размер
                        var sizeMax = 30;
                        // Минимальный размер
                        var sizeMin = 12;
                        var screenHeight;
                        var screenWidth;
                        var timer;

                        function initSnow() {
                            // размер экрана
                            screenHeight = jQuery(document).height();
                            screenWidth = jQuery(document).width();

                            var sizeRange = sizeMax - sizeMin;
                            for(i = 0; i <= snowCountMax; i++){
                                var sizeFont = Math.floor(sizeRange*Math.random())+sizeMin; // случайный размер снежинки
                                var posx = Math.floor((screenWidth-sizeFont*2)*Math.random()); // снежинки по всей оси X
                                var posy = Math.floor((screenHeight-sizeFont*2)*Math.random()); // снежинки по всей оси Y
                                var randColor = arrColor[Math.floor(arrColor.length*Math.random())]; // случайный цвет
                                var size = Math.floor(sizeRange*Math.random()) + sizeMin;
                                span = jQuery("#snow_"+i); // снежинка по порядку
                                span.css('fontSize', sizeFont+"px"); // задаем ей размер
                                span.css('color', randColor); // цвет
                                span.attr('size', size); // в атрибут сохраняем скорость этой снежинки
                                span.attr('speed', speed*sizeFont/5); // в атрибут сохраняем скорость этой снежинки
                                span.attr('posx', posx); // в атрибут пишем положение по X
                                span.attr('posy', posy); // в атрибут пишем положение по Y
                                span.css('left', posx+"px"); // задаем положение по X
                                span.css('top', posy+"px"); // задаем положение по Y
                            }
                            moveSnow();
                        }

                        // падение снежинок
                        function moveSnow() {
                            for(i = 0; i <= snowCountMax; i++){
                                span = jQuery("#snow_"+i); // снежинка по порядку
                                var posy = parseInt(span.attr('posy')) + parseInt(span.attr('speed'));
                                var posx = parseInt(span.attr('posx'));
                                var size = parseInt(span.attr('size'));
                                var margin = posx + Math.floor(Math.random()*4)-2; // колыхание по X
                                span.animate({
                                    top: posy+"px",
                                    left: margin + "px"
                                }, 70);
                                span.attr('posy', posy);
                                span.attr('posx', margin);
                                var sizeRange = sizeMax - sizeMin;
                                var sizeFont = Math.floor(sizeRange*Math.random()) + sizeMin; // случайный размер снежинки
                                if(posy >= (screenHeight-sizeFont*2)){ // если снежинка полностью опустилась
                                    posx = Math.floor((screenWidth-sizeFont*2)*Math.random()); // снежинки по всей оси X
                                    span.attr('posx', posx);
                                    span.attr('posy', 0);
                                    span.css('fontSize', sizeFont+"px"); // меняем размер
                                }
                            }
                            var timer = setTimeout("moveSnow()", 70);
                        }

                        // создаем на  странице снежинки
                        for (i = 0; i <= snowCountMax; i++){
                            jQuery('body').append("<span id='snow_"+i+"' style='position: absolute;'>"+snowView+"</span>");
                        }jQuery(function () {
                            // запускам снегопад
                            initSnow();
                        });
                    </script>

                <img src="{{ asset('storage/' . $product->thumbnail) }}"
                     alt="" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
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
                        <div class="  mt-3 lg:mt-0 lg:text-center" >
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
                        <div>
                        <form action="{{url('/add-rating')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalLabel">Оцінити {{$product->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="rating-css">
                                                <div class=" star-icon">
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
                                            <button type="button" class=" rounded-2xl btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                                            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xl lg:text-sm py-2.5 px-8 rounded-2xl hover:bg-blue-600">Оцінити</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
{{--                    @if(!empty(auth()->id()))--}}
                        <button type="button" class="bg-blue-500 text-white  mt-2 py-1 px-6 rounded-2xl hover:bg-blue-600" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Оцінити
                        </button>
{{--                    @endif--}}
                </div>
                <div class="  lg:mt-0 py-4 text-center ">
                    <form  action="{{ route('cart.store') }}" method="POST"
                           enctype="multipart/form-data">
                        @csrf
                        @php
                              $prices = DB::table('prices')->where('name', "$product->prices")->get();
                        @endphp
                        <input type="hidden" value="{{ $product->id . time()}}" name="id">
                        <select name="price" class="bt rounded-full py-2 px-2 " >
                            @foreach ($prices as $price)
                                <option class="rounded-full" value="{{$price->price}}">{{$price->weight}}{{$price->unit}} {{$price->price}}{{$price->currency}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" value="грн" name="currency">
                        <input type="hidden" value="{{$product->prices}}" name="prices">
                        <input type="hidden" value="{{$product->title  }}" name="name">
                        <input type="hidden" value="{{ $product->thumbnail }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        @if($product->status !== "ends")
                        <button
                            class=" cartbutton transition-colors  hover: rounded-3xl ml-6 py-2 px-2 " >
                            Купити
                        </button>
                        @else
                            <button type="button" style=" pointer-events: none; background-color: #c0bebe;" class="transition-colors  hover: rounded-3xl ml-6 py-2 px-2 " disabled>Закінчився</button>
                        @endif
                    </form>
            </div>
            </div>
            <div class="col-span-6">
                <h1 class="font-bold text-2xl lg:text-3xl text-center  mt-0 lg:mt-0 mb-3" >
                    {{ $product->title }}
                </h1>

                <div>
                    <a href="/"
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
                        До каталогу
                    </a>
                <div class=" mt-2  space-y-4 leading-loose" style=" line-height: 1.5em;">{!! $product->body !!}
            </div>
{{--                    <a href="{{ asset('storage/' . $product->certificate) }}"--}}
{{--                       class="transition-colors duration-300 relative inline-flex  hover:text-blue-500">--}}
{{--                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">--}}
{{--                            <g fill="none" fill-rule="evenodd">--}}
{{--                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">--}}
{{--                                </path>--}}
{{--                                <path class="fill-current"--}}
{{--                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">--}}
{{--                                </path>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        До каталогу--}}
{{--                    </a>--}}
{{--                    class="document-link document-link-hasMargin document-link-l-default"--}}
{{--                    href="https://dpoy1j4zladj1.cloudfront.net/CS Apple Harvest SDS 2022.pdf"--}}
{{--                    target="_blank"--}}
                   @if(isset($product->ifra_certificate))
                        <div class="flex items-center  mt-3 lg:mt-0 ">

                        <a href="{{ asset('storage/' . $product->ifra_certificate) }}"  class="  py-1 px-2 bg-green-100 border-opacity-8 mb-1 rounded-xl label inline-flex text-black" target="_blank" style="  text-decoration: none;">
                            <img src="/images/ifra.png" alt="Logo" width="20" height="20" class="text-black rounded-l " >
                           <span  class="  px-2">IFRA Certificate</span>
                        </a>
                    </div>
                    @endif
                    @if(isset($product->safety))
                    <div class="flex items-center  mt-1 lg:mt-0 mb-1">
                        <a href="{{ asset('storage/' . $product->safety) }}"  class="  py-1 px-2 bg-green-100 border-opacity-8 mb-1 rounded-xl label inline-flex text-black" target="_blank" style="  text-decoration: none;">
                            <img src="/images/pdf.png" alt="Logo" width="20" height="20" class="text-black rounded-l" >
                            <span  class="  px-2">Safety Data Sheet</span>
                        </a>
                    </div>
                    @endif
                    @if(isset($product->certificate))
                        <div class="flex items-center  mt-1 lg:mt-0 mb-1">
                            <a href="{{ asset('storage/' . $product->certificate) }}"  class="  py-1 px-2 bg-green-100 border-opacity-8 mb-1 rounded-xl label inline-flex text-black" target="_blank" style="  text-decoration: none;">
                                <img src="/images/pdf.png" alt="Logo" width="20" height="20" class="text-black rounded-l" >
                                <span  class="  px-2">Certificate</span>
                            </a>
                        </div>
                    @endif
            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include ('products._add-comment-form')
                @foreach ($product->comments as $comment)
                    <x-product-comment :comment="$comment"/>
                @endforeach
            </section>
        </article>
    </main>
</x-layout>
