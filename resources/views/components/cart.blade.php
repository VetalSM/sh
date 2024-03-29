<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">--}}
<main class="max-w-6xl mx-auto my-8">
    <div class=" px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">

             @if(empty(Session::get('success')) and empty(Session::get('error')))
                <p style="color: #0a58ca">
                    {{__("Додавання товару у кошик не є бронюванням. Для бронювання товару за вами, будь ласка оформіть замовлення до кінця!")}}
                </p>
             @endif
{{--                <div class="  bg-blue-200 border-opacity-5  rounded-full text-center py-1 px-1 " style="background-color: rgb(254 215 170);">--}}
{{--                    <div class="py-1 ">--}}
{{--                        <div class="px-3  inline">--}}
{{--                            <span class=" text-sm  lg:text-base  text-black inline  px-1 rounded-full" style=" font-weight: 600;">Економте разом із Made</span><span style="color:#3B82F6; font-weight: 600;">IS</span>!--}}
{{--                            <br>--}}
{{--                            <h7  style="color: rgba(255,26,26,0.84)">5% </h7> від  <h7 style="color: rgba(255,26,26,0.84)">500грн!</h7>&nbsp;&nbsp;&nbsp;--}}
{{--                            <h7  style="color: rgba(255,26,26,0.84)">10% </h7>від <h7 style="color: rgba(255,26,26,0.84)">2000грн!</h7><br>--}}
{{--                            <h7  style="color: rgba(255,26,26,0.84)">8% </h7>від <h7 style="color: rgba(255,26,26,0.84)">1000грн!</h7>&nbsp;--}}
{{--                            <h7  style="color: rgba(255,26,26,0.84)">12% </h7>від <h7 style="color: rgba(255,26,26,0.84)">3000грн!</h7><br>--}}
{{--                            Знижки будуть нараховані при оформленні замовлення, якщо сума замовлення перевищує 500грн.<br/>--}}
{{--                            Акція діє з 23.02 по 28.02 включно.--}}


{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
                <p/>
                @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800 text-xl lg:text-base">{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class=" text-xl lg:text-base" style="color: #b90303">{{ $message }}</p>
                    </div>
                @endif

                <h3 class="text-3xl text-bold">{{__("Кошик")}}</h3>
                <div class="flex-1">
                    <table class="w-full md:table-auto" cellspacing="0">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">{{__("Найменування")}}</th>
                            <th class="pl-5 text-left lg:text-center lg:pl-5">
                                <span class="lg:hidden" title="Quantity">К-ть</span>
                                <span class="hidden lg:inline">{{__("Кількість")}}</span>
                            </th>
                            <th class="hidden text-right md:table-cell"> {{__("ціна")}}</th>
                            <th class="hidden text-right md:table-cell"> {{__("Видалити")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $item->attributes->image )}}" alt="image"
                                             width="80" height="80">
                                    </a>
                                </td>
                                <td>
                                    <a href="#"></a>
                                        @php
                                             $pricesName = $item->attributes->prices;
                                              $price = DB::table('prices')->where('name', "$pricesName")->where('price', "$item->price")->first();
                                             if(!isset($price->currency)) {
                                                 $price->currency=" ";
                                             }
                                        @endphp
                                        <span class="mb-3 text-2xl lg:text-base">

                                            <a href="/{{app()->getLocale()}}/products/{{ $item->attributes->slug }}">
                                                {{ Str::limit($item->name,10)}}
                                            </a>
                                        </span>
                                        <br>
                                        <h10 class="font-bold text-2xl lg:text-base text-blue-700">
                                        {{$price->weight. $price->unit}} <span class="text-black">{{'('.$item->price.' '.$price->currency.')' }}</span>
                                        </h10>



                                </td>
                                <td class="justify-center mt-8 md:justify-center md:flex">
                                    <div class="h-10 w-35">
                                        <div class="relative  flex flex-row w-full h-8">

                                            <form action="{{ route('cart.update',app()->getLocale()) }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="prod_weight" value="{{ $item->attributes->weight}}">
                                                <input type="hidden" name="id" value="{{ $item->id}}">
                                                <input type="hidden" name="id_prod" value="{{ $item->attributes->prod_id}}">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                       class="w-7 text-center bg-gray-300" style="width: 2.5em"/>
                                                <button type="submit" class="px-1  ml-2 text-white text-base lg:text-base rounded-xl bg-blue-500">
                                                    {{__("оновити")}}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden  text-right md:table-cell "  style="padding: 0px 0px 18px 0;">
                                <span class="text-2xl lg:text-base font-medium lg:text-base  max-height">
                                    {{ $item->price*$item->quantity }} {{$price->currency}}
                                </span>
                                </td>
                                <td class="text-right md:table-cell " style="padding: 1px 25px 0px 0;">
                                    <form action="{{ route('cart.remove',app()->getLocale()) }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="px-3 py-0.5 text-white bg-red-600  rounded-full">x</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    <form action="{{ route('cart.Condition',app()->getLocale()) }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @dd($item)--}}
{{--                        {{ }}--}}
{{--                        <input type="hidden" name="id" value="{{ $item->id}}">--}}
{{--                        <p class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6">{{__("promo")}}</p>--}}
{{--                        <input type = "text" size="10" placeholder="promo" name="promo"  value="{{old('promo')}}"/>--}}
{{--                        <button type="submit" class="px-1  ml-2 text-white text-base lg:text-base rounded-xl bg-blue-500">--}}
{{--                            {{__("gthtry")}}--}}
{{--                        </button>--}}
{{--                    </form>--}}

{{--                    @php--}}
{{--                        if (Cart::getTotal() >= 500 and Cart::getTotal() <= 1000){--}}
{{--                          $percent = 0.95;--}}
{{--                      }--}}
{{--                      if (Cart::getTotal() >= 1000 and Cart::getTotal() <= 2000){--}}
{{--                          $percent = 0.92;--}}
{{--                      }--}}
{{--                       if (Cart::getTotal() >= 2000 and Cart::getTotal() <= 3000){--}}
{{--                          $percent = 0.90;--}}
{{--                      }--}}
{{--                        if (Cart::getTotal() >= 3000 ){--}}
{{--                          $percent = 0.88;--}}
{{--                      }--}}
{{--                         if (Cart::getTotal() >= 500 ){--}}
{{--                      $total = Cart::getTotal() * $percent;--}}
{{--                       $sale = Cart::getTotal() - $total;--}}
{{--                       }--}}

{{--                    @endphp--}}
                    <div class="text-xl">
                        @if(isset($price->currency))
{{--                            @if(Cart::getTotal() >= 500)--}}
{{--                            {{__("Загальна вартість:")}}   <del>{{ Cart::getTotal() }}</del> {{$price->currency}}--}}
{{--                                <input type="hidden" value="{{$total}}" name="total" class="text-xs" required/>--}}
{{--                            @else--}}
                                {{__("Загальна вартість: ")}} {{ Cart::getTotal() }}{{ $price->currency}}
                                <input type="hidden" value="{{Cart::getTotal()}}" name="total" class="text-xs" />
{{--                            @endif--}}

{{--                        @if(Cart::getTotal() >= 500)--}}
{{--                                <p style="color: red">{{__("Знижка: ")}}{{ $sale}} {{$price->currency}}</p>--}}
{{--                            <span>{{__("До сплати: ")}}</span><span style=" font-weight: 700;"> {{$total}} {{$price->currency}}</span>--}}

{{--                        @endif--}}


{{--                        @else--}}

                        @endif

                    </div>
                    <br>
                    <div>
                        <form action="{{ route('cart.clear',app()->getLocale()) }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-red-800 bg-red-300 text-xl lg:text-base  rounded-full">{{__("Очистити кошик")}}</button>
                        </form>

                        <form action="{{route('order',app()->getLocale())}}" method="post">
                            @csrf
                            <div class="form-group">
                                {{--@dd($cartItems)--}}
                                <h3 style="color: #000000" for="escola">{{__("Контактні дані:")}}</h3>
                                <input type="hidden" value="{{$cartItems}}" name="name">
{{--                                @php--}}
{{--                                    $prices = DB::table('prices')->where('price', "$d")->get();--}}
{{--                                @endphp--}}
{{--                                @foreach ($prices as $price)--}}
{{--                                    <input type="hidden" value="{{$price->weight}}" name="weight">--}}
{{--                                    <input type="hidden" value="{{$price->unit}}" name="unit">--}}
{{--                                    <input type="hidden" value="{{$price->currency}}" name="currency">--}}
{{--                                    --}}{{--                            @endif--}}
{{--                                @endforeach--}}
{{--                                @dd($cartItems)--}}

{{--                              dd($cartItems->name);--}}
{{--                                    $text[]=$cartItems->name.' '.$cartItems->attributes->weight.' '.$cartItems->attributes->unit.': '.$cartItems->price.' '.$cartItems->attributes->currency.--}}
{{--                                   ' к-во'.': '.$cartItems->quantity. '|'.' Всього: '.$cartItems->price*$cartItems->quantity.' '.$cartItems->attributes->currency."\n";--}}
                                @php
                                                                       $text=[];
                                          foreach($cartItems as $f=>$b){
                                                     $w = $b->attributes['weight'];
                                                     $p = $b->price;

                                         $price = DB::table('prices')->where('weight', "$w")->where('price', "$p")->where('name', $b->attributes['prices'])->first();
                                    if(!isset($price->currency)) {
                               $price->currency=" ";
                                                         }
                               $text[]=$b->name.' '.$price->weight.' '.$price->unit.': '.$b->price.' '.$price->currency.
                           ' к-во'.': '.$b->quantity. '|'.' Всього: '.$b->price*$b->quantity.' '.$price->currency."\n";}
                                @endphp
                                <input type="hidden" value="{{implode("", $text)}}" name="name" class="text-xs" required/>
{{--                                <input type="hidden" value="{{Cart::getTotal()}}" name="total" class="text-xs" required/>--}}
{{--                                promotion telrgram--}}
{{--                                @if(Cart::getTotal() >= 500)--}}
{{--                                    <input type="hidden" value="{{$total}}" name="total" class="text-xs" required/>--}}
{{--                                @else--}}
                                    <input type="hidden" value="{{Cart::getTotal()}}" name="total" class="text-xs" />
{{--                                @endif--}}
                              <p class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6">tel</p> <input type="tel" placeholder="+380" name="tel" value="{{old('tel')}}" class="text-2xl lg:text-base border border-gray-200  p-2 w-full rounded" required/>
                                <x-form.error name="tel"/>
                             <p class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6">{{__("email")}}</p>  <input type="email" placeholder="email" name="email"  value="{{old('email')}}"  class="text-2xl lg:text-base border border-gray-200  p-2 w-full rounded" required/>
                              <p class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6">{{__("П.І.Б")}}</p> <input type="text" placeholder="{{__("Прізвище, Ім'я")}}" name="П.І.Б" value="{{old('П_І_Б')}}" class="text-2xl lg:text-base border border-gray-200  p-2 w-full rounded" required/>
                               <p  class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6" >{{__("Адреса: населений пункт, № відділення Нової Пошти")}}</p>  <input type="text" placeholder="{{__("Адреса")}}" name="address" value="{{old('address')}}" class="border  text-2xl lg:text-base border-gray-200  p-2 w-full rounded" required/>
                                <p  class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6" >{{__("Коментар до замовлення")}}</p>  <textarea  placeholder="{{__("Коментар")}}" name="comment" class="border  text-2xl lg:text-base border-gray-200  p-2 w-full rounded" >{{old('comment')}}</textarea>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-danger btn-lg">{{__("Замовити")}}</button>
                                <a href="/{{app()->getLocale()}}" class="btn btn-primary btn-lg">{{__("Повернутись до покупок")}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
