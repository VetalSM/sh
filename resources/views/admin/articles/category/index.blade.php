<x-articles.layout-art>
    <x-setting heading="Manage Category">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">
                                <th class="text-center">name</th>
                                <th class="text-center">slug</th>
{{--                                <th class="text-center">вага</th>--}}
{{--                                <th class="text-center">од. вимір.</th>--}}
{{--                                <th class="text-center">вал.</th>--}}
                            </tr>
                            @foreach (\App\Models\ArtCategory::all() as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">
                                                        {{ $category->name }}
                                                    </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    {{ $category->slug }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/{{app()->getLocale()}}/admin/articles/categories/index/{{ $category->id }}/edit"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                        <form method="POST" action="/{{app()->getLocale()}}/admin/articles/categories/index/{{ $category->id }}">
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
</x-articles.layout-art>
