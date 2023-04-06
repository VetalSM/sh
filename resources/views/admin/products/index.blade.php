
<x-layout>
    <x-setting heading="Менеджер продуктов" >


        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach (\App\Models\Product::all() as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @php
                                                    if ($product->status === '4') {
                                                        $statusProd ='active';
                                                    };
                                                     if ($product->status === '2') {
                                                        $statusProd ='new';
                                                    };
                                                      if ($product->status === '1') {
                                                        $statusProd ='promotion';
                                                    };
                                                       if ($product->status === '7') {
                                                        $statusProd ='out';
                                                    };
                                                        if ($product->status === '3') {
                                                        $statusProd ='hit';
                                                    };
                                                         if ($product->status === '6') {
                                                        $statusProd ='expect';
                                                    };
                                                          if ($product->status === '5') {
                                                        $statusProd ='ends';
                                                    };
                                                           if ($product->status === '8') {
                                                        $statusProd ='not_available';
                                                    };

                                                @endphp
                                                @if($statusProd === "not_available")
                                                    <div class="text-sm text-red font-medium text-gray-900">
                                                        <a href="/{{app()->getLocale()}}/products/{{ $product->slug }}" style="text-decoration: none;">
                                                            {{ $product->title }}<span class="text-dark">&nbsp;&nbsp;&nbsp;{{$statusProd }}</span>
                                                        </a>
                                                    </div>
                                                    @elseif($statusProd === "out")

                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="/{{app()->getLocale()}}/products/{{ $product->slug }}" style="text-decoration: none;">
                                                            {{ $product->title }}<span class="text-danger">&nbsp;&nbsp;&nbsp;{{$statusProd }}</span>
                                                        </a>
                                                    </div>
                                                @else

                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/{{app()->getLocale()}}/products/{{ $product->slug }}" style="text-decoration: none;">
                                                        {{ $product->title }}<span class="text-success">&nbsp;&nbsp;&nbsp;{{$statusProd   }}</span><span style="color: #1b1a1a">
                                                               П : {{  $product->views}}</span>
                                                    </a>
                                                </div>
                                                    @endif

                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/{{app()->getLocale()}}/admin/products/{{ $product->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/{{app()->getLocale()}}/admin/products/{{ $product->id }}">
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
