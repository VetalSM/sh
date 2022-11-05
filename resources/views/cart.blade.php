<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<main class="max-w-6xl mx-auto my-8">
    <div class=" px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                @endif
                <h3 class="text-3xl text-bold">Кошик</h3>
                <div class="flex-1">
                    <table class="w-full md:table-fixed" cellspacing="0">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Найменування</th>
                            <th class="pl-5 text-left lg:text-center lg:pl-5">
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
                                    <p href="#">
                                        @php
                                            $price = DB::table('price')->where('price', "$item->price")->first();

                                        @endphp
                                        <span class="mb-3">{{ $item->name}}
                                        </span>
                                        <br>
                                        <h10 class="font-bold text-blue-700">
                                        {{$price->weight.'г'}} <span class="text-black">{{'('.$item->price.' грн'.')' }}</span>
                                        </h10>
{{--                                        <span class=" font-bold">{{$price->weight.'г'.' ('.$item->price.' грн'.')' }}</span>--}}

                                    </a>
                                </td>
                                <td class="justify-center mt-8 md:justify-end md:flex">
                                    <div class="h-10 w-28">
                                        <div class="relative  flex flex-row w-full h-8">

                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id}}">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                       class="w-7 text-center bg-gray-300"/>
                                                <button type="submit" class="px-1  ml-2 text-white rounded-xl bg-blue-500">
                                                    оновити
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden  text-right md:table-cell "  style="padding: 0px 0px 22px 0;">
                                <span class="text-sm font-medium lg:text-base  max-height">
                                    {{ $item->price*$item->quantity }} грн
                                </span>
                                </td>
                                <td class="text-right md:table-cell " style="padding: 0px 25px 4px 0;">
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

                                                                        $ff=[];
                                                                        foreach($cartItems as $f=>$b){

                                                                            $user = DB::table('price')->where('price', "$b->price")->first();
                                                                            $ff[]=$b->name.': '.$price->weight.' г'.': '.$b->price.' грн'.
                                                                            ' к-во'.': '.$b->quantity. '|'.' pretotal: '.$b->price*$b->quantity."\n";}
                                @endphp


                                <input type="hidden" value="{{implode("", $ff)}}" name="name" class="text-xs" required/>
                                <input type="hidden" value="{{Cart::getTotal()}}" name="total" class="text-xs" required/>
                               <x-form.input type="tel" placeholder="+380" name="tel" class="text-xs" required/>
                               <x-form.input type="email" placeholder="email" name="email" class="text-xs" required/>
                               <x-form.input type="text" placeholder="Прізвище, Ім'я" name="П.І.Б" class="text-xs" required/>
                               <p  class="block mb-2 uppercase font-bold text-xs text-gray-700   w-full rounded mt-6" >Адреса: населений пункт, № відділення Нової Пошти</p>  <input type="text" placeholder="Адреса" name="address" class="border border-gray-200  p-2 w-full rounded" required/>
                            </div>
                            <div class="mt-3">
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
