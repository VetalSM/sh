<x-layout>
    <x-setting heading="Manage Category">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products/orders_sort/">
            @csrf
            <label for="start">start:</label>
            <input type="date" id="start" name="start">
            <label for="end">end:</label>
            <input type="date" id="end" name="end">
            <button type="submit" class="text-xs text-gray-400">get</button>
        </form>

        @if($orders)


        <div class="flex flex-col" >
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">
                                <th class="text-center">name</th>
                                <th class="text-center">slug</th>
                                                                <th class="text-center">вага</th>
                                                                <th class="text-center">од. вимір.</th>
                                                                <th class="text-center">вал.</th>
                            </tr>

                            @foreach ($orders->unique('created')->sortByDesc('created_at') as $order)
                                <tr>
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
                                                   {{ \App\Models\Order::all()->where('created', $order->created)->sum('product_total')}}
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
                        Total: {{$orders->sum('product_total')}}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </x-setting>
</x-layout>
