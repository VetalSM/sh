<x-layout>
    <x-setting heading="Manage Balance">

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <a href="/{{app()->getLocale()}}/admin/products/status_jobs/create">create </a>
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">
                                <th class="text-center">имя</th>
                                <th class="text-center">начальный прайс</th>
                                <th class="text-center">конечный прайс</th>
                                <th class="text-center">начальный статус</th>
                                <th class="text-center">конечный статус</th>
                                <th class="text-center">начальная дата</th>
                                <th class="text-center">конечная дата</th>

                            </tr>



                            @foreach ($statuses as $status)

                                @if($status->product_id)
                                    @if($status->work_start == 1 &&  ($status->work_end == 1))

                                        <tr style="background-color:#39e634">
                                    @elseif($status->work_start == 1)

                                        <tr style="background-color:#f6e643">

                                    @else
                                        <tr style="background-color:rgba(248,76,76,0.65)">
                                    @endif

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                        <span class="text-dark" style="text-decoration: none;">
                                                                {{ $status->product_name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                  {{$status->price_start_name}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{$status->price_end_name}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      {{$status->status_start}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                         {{$status->status_end}}

                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                       {{$status->start_date}}
{{--                                                     {{$balanceProduct->updated_at->format('Y-m-d')}}--}}

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
                                                    {{$status->end_date}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/{{app()->getLocale()}}/admin/products/status_jobs/{{ $status->id }}/edit"
                                               class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/{{app()->getLocale()}}/admin/products/status_jobs/{{ $status->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-xs text-gray-400">Delete</button>
                                                </form>
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
