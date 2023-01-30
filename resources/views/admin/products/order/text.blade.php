<x-layout>
    <x-setting heading="Manage Category">
{{--        <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders_text"  enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <label for="start">start:</label>--}}
{{--            <input type="date" id="start" name="start">--}}
{{--            <label for="end">end:</label>--}}
{{--            <input type="date" id="end" name="end">--}}
{{--            <button type="submit" class="text-xs text-gray-400">get</button>--}}
{{--        </form>--}}
        {{ $orders->links()}}
{{--        @if($orders)--}}
{{--        ->sortByDesc('created_at')--}}
            @foreach ($orders->unique('created') as $order)
            <h7 class=" text-bold" style="color: brown;">{{$order->created_at}}</h7>
                <h4 class="mt-2 text-bold">{{$order->tel}}<br/>{{$order->credentials}}</h4>
                <h4 class=" text-bold">{{$order->address}}</h4>
                @if(isset($order->comment))
                    <h7 class=" text-bold">{{$order->comment}}</h7>
                @endif
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
{{--                            <th class="hidden text-right md:table-cell"> {{__("Видалити")}}</th>--}}
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
                                            @if($item->quantity <= 1)
                                                <p>{{ $item->quantity }}</p>
                                            @else
                                                <p style="color: red">{{ $item->quantity }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden  text-right md:table-cell " >
                                <span class="text-2xl lg:text-base font-medium lg:text-base  max-height">
                                    {{ $item->price*$item->quantity }} {{$item->currency}}
                                </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-xl">
                        {{__("Загальна вартість:")}} {{ $orders->sum('product_total')}} {{$item->currency}}
                        @if( $order->payment_status === 1)
                            <span class="text-dark" style="text-decoration: none;">
                                                   <span style="text-decoration: none; color: red">
                                                      *</span>{{__("Сплачено")}}</span><span style="text-decoration: none; color: red">*</span>

                        @else
                            <span style="text-decoration: none; color: red">
                                                        {{__("Не Сплачено")}}
                                                    </span>
                        @endif
                    </div>----------------------------------------------------------------------------------------------------------------------------------------
                    <br/><br/>

            @endforeach

{{--@endif--}}

{{--        --}}
{{--            <div class="flex flex-col" >--}}
{{--                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
{{--                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">--}}
{{--                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}
{{--                            <table class="min-w-full divide-y divide-gray-200">--}}
{{--                                <tbody class="bg-white divide-y divide-gray-200">--}}
{{--                                <tr class="h-12 uppercase">--}}
{{--                                    <th class="text-center">name</th>--}}
{{--                                    <th class="text-center">slug</th>--}}
{{--                                    <th class="text-center">вага</th>--}}
{{--                                    <th class="text-center">од. вимір.</th>--}}
{{--                                    <th class="text-center">вал.</th>--}}
{{--                                </tr>--}}
{{--                                $orders = DB::table('orders')->where('created', "$order->created")->get();--}}
{{--                                @foreach ($orders as $order)--}}
{{--                                    <tr>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                            <div class="flex items-center">--}}
{{--                                                <div class="text-sm font-medium text-gray-900">--}}
{{--                                                    <span class="text-dark" style="text-decoration: none;">--}}
{{--                                                        {{ $order->product }}--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                            <div class="flex items-center">--}}
{{--                                                <div class="text-sm font-medium text-gray-900">--}}
{{--                                                <span style="text-decoration: none;">--}}
{{--                                                   {{ \App\Models\Order::all()->where('created', $order->created)->sum('product_total')}}--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                            <div class="flex items-center">--}}
{{--                                                <div class="text-sm font-medium text-gray-900">--}}
{{--                                                <span style="text-decoration: none;">--}}
{{--                                                    {{ $order->credentials }}--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                            <div class="flex items-center">--}}
{{--                                                <div class="text-sm font-medium text-gray-900">--}}
{{--                                                <span style="text-decoration: none;">--}}
{{--                                                    {{ $order->created_at->format("d-m-Y H:i:s") }}--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
{{--                                            <a href="/{{app()->getLocale()}}/admin/products/orders/{{$order->id}}/edit"--}}
{{--                                               class="text-blue-500 hover:text-blue-600">Edit</a>--}}
{{--                                        </td>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
{{--                                            <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders/{{$order->id}}">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}

{{--                                                <button class="text-xs text-gray-400">Delete</button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}

{{--                                </tbody>--}}
{{--                            </table>--}}

{{--                            --}}{{--                            @foreach($orders as $order)--}}
{{--                            --}}{{--                                @foreach(\App\Models\Category::all() as $category)--}}
{{--                            --}}{{--                                    @if($order->product_id == $category->id)--}}

{{--                            --}}{{--                        {{$category->name}}: {{$orders->where('')sum('product_total')}}--}}

{{--                            --}}{{--                                @endif--}}
{{--                            --}}{{--                            @endforeach--}}
{{--                            --}}{{--                            @endforeach--}}

{{--                            --}}{{--                            Total: {{$orders->category->sum('product_total')}}--}}

{{--                            --}}{{--                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}--}}
{{--                            --}}{{--                        >{{ ucwords($category->name) }}</option>--}}
{{--                            Total: {{$orders->sum('product_total')}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
    </x-setting>
</x-layout>
