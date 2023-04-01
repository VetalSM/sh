<x-articles.layout-art>
    <x-setting heading="Publish New Category">
        <form method="POST" action="/{{app()->getLocale()}}/admin/hashtag" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name" :value="old('name', $hashtag->name)" required />
            <x-form.input name="name_ru" :value="old('name_ru', $hashtag->name)" required />


            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-articles.layout-art>
