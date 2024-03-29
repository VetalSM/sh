<x-articles.layout-art>
    <x-setting heading="Publish New Category">
        <form method="POST" action="/{{app()->getLocale()}}/admin/articles/categories/index" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name" :value="old('name', $category->name)" required />
            <x-form.input name="slug" :value="old('price', $category->slug)" required />

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-articles.layout-art>
