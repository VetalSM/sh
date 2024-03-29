<x-layout>
    <x-setting heading="Manage Category">
        <div class="">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders_sort"  enctype="multipart/form-data">
            @csrf
            <label for="start" class=" font-semibold ">ОТ:</label>
            <input type="date" id="start" name="start" value="{{ old('start', request()->start) }}">&nbsp;&nbsp;&nbsp;

            <label for="end" class=" font-semibold ">ДО:</label>
            <input type="date" id="end" name="end" value="{{ old('end', request()->end) }}">&nbsp;&nbsp;&nbsp;
            <button type="submit" class=" font-semibold ">Показать</button>
        </form><br>
            <span >
                Total: {{$orders->sum('product_total')}}  грн
            </span>

            <div>
                <span>
               {{'(С/С): ' . $costs['all_created']['cost']['totalWeight'] . ' грн'}}
                </span>
            </div>
            <div>
                <span>
               {{'(Расходы): ' . $costs['all_created']['expenses']['totalExpense'] . ' грн'}}
                </span>
            </div>
            <div>
                <span>
                    {{'(Прибыль): ' . $costs['all_created']['profit']['total'] . ' грн'}}
                </span>
            </div>
        </div>
        @if($orders)


        <div class="mt-3 flex flex-col" >
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">

                                <th class="text-center">№</th>
                                <th class="text-center">Тел.</th>
                                <th class="text-center">Сумма заказа</th>
                                <th class="text-center">Ф.И.О</th>
                                <th class="text-center">Дата</th>

                            </tr>

                            @foreach ($orders->unique('created')->sortByDesc('created_at') as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{--                                        <div class="flex items-center">--}}
                                        {{--                                            <div class="text-sm font-medium text-gray-900">--}}
                                        {{--                                                    <span class="text-dark" style="text-decoration: none;">--}}
                                        {{--                                                        {{ $order->created }}--}}
                                        {{--                                                    </span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">
                                                        {{ $order->tel }}
                                                    </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                   {{ \App\Models\Order::all()->where('created', $order->created)->sum('product_total')}}  {{ $order->currency}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $order->credentials }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $order->created_at->format("d-m-Y H:i:s") }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/{{app()->getLocale()}}/admin/products/orders/{{$order->id}}/edit"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders/{{$order->id}}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

{{--                            @foreach($orders as $order)--}}
{{--                                @foreach(\App\Models\Category::all() as $category)--}}
{{--                                    @if($order->product_id == $category->id)--}}

{{--                        {{$category->name}}: {{$orders->where('')sum('product_total')}}--}}

{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                            @endforeach--}}

{{--                            Total: {{$orders->category->sum('product_total')}}--}}

{{--                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}--}}
{{--                        >{{ ucwords($category->name) }}</option>--}}

                    </div>
                </div>
            </div>
        </div>
        @endif
    </x-setting>
</x-layout>
