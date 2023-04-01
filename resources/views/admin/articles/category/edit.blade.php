<x-articles.layout-art>
    <x-setting :heading="'Edit Category: ' . $category->name">
        <form method="POST" action="/{{app()->getLocale()}}admin/articles/categories/index/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $category->name)" required />
            <x-form.input name="slug" :value="old('price', $category->slug)" required />
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-articles.layout-art>
