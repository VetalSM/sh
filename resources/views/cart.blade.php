<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<main class="my-8">
    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                @endif
                <h3 class="text-3xl text-bold">Кошик</h3>
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Найменування</th>
                            <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">К-ть</span>
                                <span class="hidden lg:inline">Кількість</span>
                            </th>
                            <th class="hidden text-right md:table-cell"> ціна</th>
                            <th class="hidden text-right md:table-cell"> Видалити</th>
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
                                    <a href="#">
                                        @php
                                            $user = DB::table('price')->where('price', "$item->price")->first();

                                        @endphp
                                        <p class="mb-2 md:ml-1">{{ $item->name.'  '.$user->weight.'г'.'('.$item->price.' грн'.')' }}</p>

                                    </a>
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex">
                                    <div class="h-10 w-28">
                                        <div class="relative flex flex-row w-full h-8">

                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id}}">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                       class="w-7 text-center bg-gray-300"/>
                                                <button type="submit" class="px-1 pb-1 ml-2 text-white rounded-xl bg-blue-500">
                                                    оновити
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell" style="padding: 0px 0px 30px 0;">
                                <span class="text-sm font-medium lg:text-base max-height">
                                    {{ $item->price*$item->quantity }} грн
                                </span>
                                </td>
                                <td class="text-right md:table-cell " style="padding: 0px 25px 12px 0;">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="px-3 py-0.5 text-white bg-red-600  rounded-full">x</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="text-xl">
                        Загальна вартість: {{ Cart::getTotal() }} грн
                    </div>
                    <br>
                    <div>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-red-800 bg-red-300  rounded-full">Очистити кошик</button>
                        </form>

                        <form action="{{route('order')}}" method="post">
                            @csrf
                            <div class="form-group">
                                {{--@dd($cartItems)--}}
                                <h3 style="color: #000000" for="escola">Контактні дані:</h3>
                                <input type="hidden" value="{{$cartItems}}" name="name">
                                @php
//                                    $gg=[];
                                    $ff=[];
                                    foreach($cartItems as $f=>$b){

                                        $user = DB::table('price')->where('price', "$b->price")->first();
                                        $ff[]=$b->name.': '.$user->weight.' г'.': '.$b->price.' грн'.
                                        ' к-во'.': '.$b->quantity. '|'.' pretotal: '.$b->price*$b->quantity."\n";
//                                        $gg['name'][]= $b->name;
//                                        $gg['price'][]= $b->price;
//                                        $gg['quantity'][]= $b->quantity;
                                        }
//                                    $nameDb = implode("','",$gg['name']);
//                                    $priceDb = implode("','",$gg['price']);
                                @endphp

                                <input type="hidden" value="{{implode("", $ff)}}" name="name"/>
                                <input type="hidden" value="{{Cart::getTotal()}}" name="total"/>
{{--                                <input type="hidden" value="{{$nameDb}}" name="nameDb"/>--}}
{{--                                <input type="hidden" value="{{$priceDb}}" name="priceDb"/>--}}

                                <p>tel: <input type="tel" placeholder="+380" name="tel" class="form-control" required/>
                                </p>
                                <p>email: <input type="email" placeholder="email" name="email" class="form-control"
                                                 required/></p>
                                <p>П.І.Б: <input type="text" placeholder="Прізвище, Ім'я" name="user"
                                                       class="form-control"/></p>
                                <p>Адреса: населений пункт, № відділення Нової Пошти <input type="text" placeholder="" name="adress" class="form-control"/>
                                </p>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-danger">Замовити</button>
                                <a href="/" class="btn btn-primary">Повернутись до покупок</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
