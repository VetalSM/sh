<x-layout>
    <x-setting heading="Manage Category">
        <div class="flex flex-col">
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

                            @foreach (\App\Models\Order::all()->unique('created')->sortByDesc('created_at') as $order)
                                @if($order->payment_status === 1 &&  ($order->delivery_status === 1))
                                    <tr style="background-color:#39e634">
                                @elseif($order->payment_status === 1)
                                    <tr style="background-color:#f6e643">

                                @else
                                    <tr style="background-color:rgba(248,76,76,0.65)">
                                @endif

                                    <td class="px-6 py-4 whitespace-nowrap">
{{--                                        <div class="flex items-center">--}}
{{--                                            <div class="text-sm font-medium text-gray-900">--}}
{{--                                                    <span class="text-dark" style="text-decoration: none;">--}}
{{--                                                        {{ $order->created }}--}}
{{--                                                    </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <form method="GET"
                                              action="/{{app()->getLocale()}}/admin/products/delivery_status">
                                            @csrf
                                            @if( $order->delivery_status === 1)
                                                <input type="checkbox" name="delivery_status" value="0" checked="checked" onChange="submit()" >
                                            @else
                                                <input type="checkbox" name="delivery_status" value="1" onChange="submit()" >
                                            @endif

                                            <input type="hidden" name="created" value="{{ $order->created}}">


                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">

                                                    <span style="text-decoration: none;" >
                                                        {{ $order->tel }}
                                                    </span>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                   {{ \App\Models\Order::all()->where('created', $order->created)->sum('product_total') }} {{ $order->currency}}
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
                                        <form method="GET"
                                              action="/{{app()->getLocale()}}/admin/products/payment_status">
                                            @csrf
                                            @if( $order->payment_status === 1)
                                                <input type="checkbox" name="payment_status" value="0" checked="checked" onChange="submit()" >
                                            @else
                                                <input type="checkbox" name="payment_status" value="1" onChange="submit()" >
                                            @endif

                                            <input type="hidden" name="created" value="{{ $order->created}}">


                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/{{app()->getLocale()}}/admin/products/orders/{{$order->id}}/edit"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST"
                                              action="/{{app()->getLocale()}}/admin/products/orders/{{$order->id}}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
