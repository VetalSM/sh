<x-layout>
    <x-setting :heading="'Edit Category: ' . $order->name">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders/{{ $order->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h4 class=" text-bold">{{$order->tel.', '.$order->credentials}}</h4>
            <h4 class=" text-bold">{{$order->address}}</h4>
            @if(isset($order->comment))
                <h4 class=" text-bold">{{$order->comment}}</h4>
            @endif
            <div class="flex-1">
                <table class="w-full md:table-auto" cellspacing="0">
                    <thead>
                    <tr class="h-12 uppercase">

                        <th class="text-left">{{__("№")}}</th>
                        <th class="text-left">{{__("Найменування")}}</th>
                        <th class="pl-5 text-left lg:text-center lg:pl-5">
                            <span class="lg:hidden" title="Quantity">К-ть</span>
                            <span class="hidden lg:inline">{{__("Кількість")}}</span>
                        </th>
                        <th class="hidden text-right md:table-cell"> {{__("ціна")}}</th>
{{--                        <th class="hidden text-right md:table-cell"> {{__("Видалити")}}</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $orders = DB::table('orders')->where('created', "$order->created")->get();
                    @endphp

                    @foreach ($orders as $key=>$item)



                        <tr>
                            <td>
                                <a href="#"></a>
                                <span class="mb-3 font-bold text-2xl lg:text-base" style="color: brown;  position: relative; top: -11px !important;">{{$key+=1}}.
                                        </span>

                            </td>
                            <td>
                                <a href="#"></a>
                                <span class="mb-3 text-2xl lg:text-base">{{$item->product}}
                                        </span>
                                <br>
                                <h10 class="font-bold text-2xl lg:text-base text-blue-700">
                                    {{$item->weight. $item->unit}} <span class="text-black">{{'('.$item->price.' '.$item->currency.')' }}</span>
                                </h10>
                            </td>
                            <td class="justify-center mt-3 md:justify-center md:flex">
                                <div class="h-10 w-35">
                                    <div class="relative  flex flex-row w-full h-8">

                                        <form action="/{{app()->getLocale()}}/admin/products/orders/{{$item->id}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $item->id}}">
                                            <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                   class="w-7 text-center bg-gray-300" style="width: 2.5em"/>
                                            <input type="hidden" name="weight" value="{{ $item->weight}}">
                                            <input type="hidden" name="price" value="{{ $item->price}}">
                                            <button type="submit" class="px-1  ml-2 text-white text-base lg:text-base rounded-xl bg-blue-500">
                                                {{__("оновити")}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden  text-right md:table-cell " >
                                <span class="text-2xl lg:text-base font-medium lg:text-base  max-height">
                                    {{ $item->price*$item->quantity }} {{$item->currency}}
                                </span>
                            </td>
                            <td class="text-right md:table-cell " >
                                <form action="/{{app()->getLocale()}}/admin/products/orders/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
{{--                                    Picture::where('filename', $filename)->delete();--}}
                                    <button class="px-3 py-0.5 text-white bg-red-600  rounded-full">x</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                -----------------------------------------------------
                <div class="text-xl mt-1">
                       {{__("Загальна вартість:")}} {{ $orders->sum('product_total')}} {{$item->currency}}
                </div>

                <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tel" value="{{ $order->tel}}">
                    <input type="hidden" name="created" value="{{ $order->created}}">
                    <input type="hidden" name="credentials" value="{{ $order->credentials}}">
                    <input type="hidden" name="address" value="{{ $order->address}}">

                    <input type="hidden" name="currency" value="{{ $order->currency}}">
                    <input type="hidden" name="weight" value="{{ $order->weight}}">
                    <input type="hidden" name="product_id" value="{{ $order->product_id}}">
                    <p class="pt-5 flex-inline">
                        <x-form.label name="Имя товара"/>
                        <select name="product_id"  required>
                            @foreach (\App\Models\Product::all()->sortBy('title') as $product)
                                <option
                                    value="{{ $product->id }}"
                                >{{ ucwords($product->title) }}</option>
                            @endforeach
                        </select>
                        <h5 class="inline">Объём:</h5>  <input type="number" class="border  border-gray-200 p-2 rounded" name="weight" required/>
                    </p>
                    <p>
                    <h5 class="inline">Единица измерения:</h5> <input type="text" class="border border-gray-200 p-2  rounded" name="unit"  required/>
                    </p>
                    <p>
                    <h5 class="inline">Цена за 1 позицию:</h5>  <input type="text" class="border border-gray-200 p-2  rounded" name="price"  required/>

                    </p>
                 <p>
                    <h5 class="inline">Количество позиций:</h5>  <input type="number" name="quantity"  class="w-7 text-center bg-gray-300"  style="width: 2.5em" required/>
                 </p>
                    <x-form.textarea name="comment">{{ old('comment', $order->comment) }}</x-form.textarea>

                        <x-form.button>Добавить</x-form.button>
                    </form>
{{--            <x-form.button>Update</x-form.button>--}}
            </div>
        </form>
    </x-setting>
</x-layout>
