<x-layout>
    <x-setting heading="Manage Category">

        {{ $orders->links()}}
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
                                                <h8 class="font-bold text-2xl lg:text-base ">
                                                <p style="color: red">{{ $item->quantity }}</p>
                                                </h8>
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
                        <br/>
                        @if( $order->payment_status == 1)
                            <span class="text-dark" style="text-decoration: none;">
                                                   <span style="text-decoration: none; color: red">
                                                      *</span>{{__("Сплачено")}}</span><span style="text-decoration: none; color: red">*</span>
                            @if($order->delivery_status == 1)
                                <span class="text-dark" style="text-decoration: none;">
                                                   <span style="text-decoration: none; color: red">
                                                      *</span>{{__("Відправлено")}}</span><span style="text-decoration: none; color: red">*</span>
                            @else
                                <span style="text-decoration: none; color: red">
                                                   <span style="text-decoration: none; color: red">
                                                      *</span>{{__("Не відправлено")}}</span><span style="text-decoration: none; color: red">*</span>
                            @endif

                        @else
                            <span style="text-decoration: none; color: red">
                                                        {{__("Не Сплачено")}}
                                                    </span>
                        @endif

                        @if (isset($costs[$order->created]))
                            <div>
                                {{ '(С/С): ' . $costs[$order->created]['all_category']['cost']['totalWeight'] . ' грн'}}
                            </div>
                            <div>
                                {{ '(Расходы): ' . $costs[$order->created]['all_category']['expenses']['totalExpense'] . ' грн'}}
                            </div>
                            <div>
                                {{ '(Прибыль): ' . $costs[$order->created]['all_category']['profit']['total'] . ' грн'}}
                            </div>
                        @endif

                    </div>----------------------------------------------------------------------------------------------------------------------------------------
                    <br/><br/>

            @endforeach

    </x-setting>
</x-layout>
