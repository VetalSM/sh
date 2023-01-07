<x-layout>
    <x-setting heading="Manage Balance">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">
                                <th class="text-center">імя</th>
                                <th class="text-center">кількість</th>
                                <th class="text-center">од. вимір.</th>
                                <th class="text-center">замовлено</th>
                                <th class="text-center"></th>
                                <th class="text-center">посл. изменения</th>
                                <th class="text-center">дата. изменения</th>
                                <th class="text-center">об. кол.</th>

                            </tr>



                                @foreach (\App\Models\BalanceProduct::all()->unique('product_id') as $balanceProduct)

                                    @if($balanceProduct->product_id)
                                      @php
                                          $data= $balanceProduct->count - (\App\Models\Order::where('product_id', $balanceProduct->product_id)->sum('weight'));
                                      @endphp
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                @if($balanceProduct->unit === 'г' && $data <= 100)
                                                    <span class="text-danger" style="text-decoration: none;">
                                                        {{ $balanceProduct->name }}
                                                    </span>
                                                @else
                                                    <span class="text-dark" style="text-decoration: none;">
                                                        {{ $balanceProduct->name }}
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                  {{$data}}

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{$balanceProduct->unit}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                     {{$balanceProduct->expected}}

                                                </span>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/{{app()->getLocale()}}/admin/products/balance_products/{{ $balanceProduct->id }}/edit"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                     {{$balanceProduct->old_count}}

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                     {{$balanceProduct->updated_at->format('Y-m-d')}}

                                                </span>
                                            </div>
                                        </div>
                                    </td>
{{--                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
{{--                                        <form method="POST" action="/admin/products/balance_products/{{ $balanceProduct->id }}">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button class="text-xs text-gray-400">Delete</button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                     {{$balanceProduct->count}}

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
