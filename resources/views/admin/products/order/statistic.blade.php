<x-layout>
    <x-setting heading="Manage Category">
        <div class="">
            <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders_statistic"  enctype="multipart/form-data">
                @csrf
                <label for="start" class=" font-semibold ">ОТ:</label>
                <input type="date" id="start" name="start" value="{{ old('start', request()->start) }}">&nbsp;&nbsp;&nbsp;

                <label for="end" class=" font-semibold ">ДО:</label>
                <input type="date" id="end" name="end" value="{{ old('end', request()->end) }}">&nbsp;&nbsp;&nbsp;
                <button type="submit" class=" font-semibold ">Показать</button>
            </form><br>
            <span >      Total: {{$orders->sum('product_total')}}  грн</span>
        </div>
        @if($orders)


            <div class="mt-3 flex flex-col" >
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="h-12 uppercase">

                                    <th class="text-center">Продукт</th>
                                    <th class="text-center">за период</th>
                                    <th class="text-center">Остаток</th>
                                    <th class="text-center">Всего</th>
                                    <th class="text-xs text-center">10г.30г.50г.100г.200г</th>
{{--                                    <th class="text-center">30г</th>--}}
{{--                                    <th class="text-center">50г</th>--}}
{{--                                    <th class="text-center">100г</th>--}}
{{--                                    <th class="text-center">200г</th>--}}



                                </tr>

                                @foreach (\App\Models\Product::all()->sortByDesc(function ($product) use ($orders) {
                                    return $orders->where('product_id', $product->id)->sum('weight');
                                }) as $product)
                                    <tr>


                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">
                                                        {{$product->title  }} <span style="color: #4f3232">
                                                               П : {{  $product->views}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                   {{ $orders->where('product_id', $product->id)->sum('weight')}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    @php
                                                        $balanceProduct = \App\Models\BalanceProduct::all()->where('product_id',  $product->id)->first();
                                                    @endphp
                                                    @if(isset($balanceProduct->count))
                                                        {{$bb = $balanceProduct->count - (\App\Models\Order::where('product_id', $product->id)->sum('total'))}}
                                                        @if($bb <= 100)
                                                        <span style="color: #fb1717">></span>


                                                    @endif
                                                    @endif
                                                </span>
                                                </div>
                                            </div>
                                        </td>
{{--                                        @foreach (\App\Models\BalanceProduct::all()->unique('product_id') as $balanceProduct)--}}
{{--                                            @if($balanceProduct->product_id)--}}
{{--                                                @php--}}
{{--                                                    $data= $balanceProduct->count - (\App\Models\Order::where('product_id', $balanceProduct->product_id)->sum('total'));--}}
{{--                                                @endphp--}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                   {{ \App\Models\Order::all()->where('product_id',  $product->id)->sum('weight')}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                  {{$orders->where('product_id', $product->id)->where('weight', 10)->count()}}
                                                    /  {{$orders->where('product_id', $product->id)->where('weight', 30)->count()}}
                                                    / {{$orders->where('product_id', $product->id)->where('weight', 50)->count()}}
                                                     / {{$orders->where('product_id', $product->id)->where('weight', 100)->count()}}
                                                     / {{$orders->where('product_id', $product->id)->where('weight', 200)->count()}}

                                                </span>
                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-setting>
</x-layout>
