<x-layout>
    <x-setting heading="Manage Comments">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">
                                <th class="text-center">ім'я товару</th>
                                <th class="text-center">Коментатор</th>
                                <th class="text-center">Никнейм</th>
                                <th class="text-center">телефон</th>
                                <th class="text-center">коментар</th>
                                <th class="text-center"></th>
                            </tr>
                            @foreach (\App\Models\Comment::all() as $comment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">


                                                            @foreach ( \App\Models\Product::all() as $product)
                                                            @if ($comment->product_id === $product->id)
                                                                <a href="/{{app()->getLocale()}}/products/{{ $product->slug }}" style="text-decoration: none;">
                                                            {{ $product->title }}
                                                        </a>

                                                            @endif
                                                                @endforeach

                                                    </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    @if(\App\Models\Comment::all()->where('name', $comment->name)->count('name') !== \App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName'))
                                                       <span style="color: red"> {{ $comment->name }} ({{\App\Models\Comment::all()->where('name', $comment->name)->count('name')}}) </span>
                                                    @else
                                                        {{ $comment->name }} ({{\App\Models\Comment::all()->where('name', $comment->name)->count('name')}})
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $comment->nickName }}
                                                    @if(\App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName') >=6)
                                                        <span  style="color: red">
                                                        ({{\App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName')}})
                                                            </span>
                                                    @else
                                                        <span  style="color: #87a4ff">
                                                        ({{\App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName')}})
                                                            </span>
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $comment->tel }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $comment->body }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/{{app()->getLocale()}}/admin/products/comments/{{ $comment->id }}">
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
