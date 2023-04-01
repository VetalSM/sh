<x-articles.layout-art>
    <x-setting :heading="'Edit Category: '">
        <form method="POST" action="/{{app()->getLocale()}}/admin/hashtag/{{ $hashtag->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $hashtag->name)" required />
            <x-form.input name="name_ru" :value="old('name_ru', $hashtag->name_ru)" required />
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-articles.layout-art>
