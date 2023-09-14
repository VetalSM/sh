<x-layout>
    <x-setting heading="Manage Category">
        <div class="">
            <form method="POST" action="/{{app()->getLocale()}}/admin/products/expense_statistic"  enctype="multipart/form-data">
                @csrf
                <label for="start" class=" font-semibold ">ОТ:</label>
                <input type="date" id="start" name="start" value="{{ old('start', request()->start) }}">&nbsp;&nbsp;&nbsp;

                <label for="end" class=" font-semibold ">ДО:</label>
                <input type="date" id="end" name="end" value="{{ old('end', request()->end) }}">&nbsp;&nbsp;&nbsp;
                <button type="submit" class=" font-semibold ">Показать</button>
            </form><br>
            <span >      Total: {{$orders->sum('product_total')}}  грн</span>


        @if($orders)
            <div class="mt-3 flex flex-col" >
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200" >
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="h-12 uppercase" style="background-color: rgba(255,221,0,0.56)">
                                    <th class="text-center">(С/С)</th>
                                    <th class="text-center">Расходы</th>
                                    <th class="text-center">Прибыль</th>
                                </tr>
                                <tr style="background-color: rgba(255,221,0,0.35)">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">
                                                              {{  $costs['all_created']['cost']['totalWeight'] . ' грн'}}
                                                          </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{  $costs['all_created']['expenses']['totalExpense'] . ' грн'}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      {{  $costs['all_created']['profit']['total'] . ' грн'}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="mt-3 flex flex-col" style="margin-top: 20px;">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="h-12 uppercase">
                                    <th class="text-center">totalCost</th>
                                    <th class="text-center">totalPackaging</th>
                                    <th class="text-center">totalOther</th>
                                </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">
                                                              {{  $costs['all_created']['cost']['totalWeight'] . ' грн'}}
                                                          </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $costs['all_created']['cost']['totalPackaging'] . ' грн'}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      {{  $costs['all_created']['cost']['totalOther'] . ' грн'}}
                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="h-12 uppercase">
                                    <th class="text-xs text-center">totalExpense</th>
                                    <th class="text-xs text-center">totalAdmin</th>
                                    <th class="text-xs text-center">totalExpenses</th>
                                    <th class="text-xs text-center">totalTax</th>
                                    <th class="text-xs text-center">totalTravel</th>
                                    <th class="text-xs text-center">totalAdvertising</th>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span class="text-dark" style="text-decoration: none;">
                                                     {{  $costs['all_created']['expenses']['totalExpense'] . ' грн'}}
                                                  </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $costs['all_created']['expenses']['totalAdmin'] . ' грн'}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      {{  $costs['all_created']['expenses']['totalExpenses'] . ' грн'}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      {{  $costs['all_created']['expenses']['totalTax'] . ' грн'}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      {{  $costs['all_created']['expenses']['totalTravel'] . ' грн'}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      {{  $costs['all_created']['expenses']['totalAdvertising'] . ' грн'}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-3 flex flex-col" >
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="h-12 uppercase">
                                    <th class="text-center">profit</th>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">
                                                              {{  $costs['all_created']['profit']['total'] . ' грн'}}
                                                          </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-setting>
</x-layout>
