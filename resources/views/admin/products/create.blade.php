<x-layout>
    <x-setting heading="Publish New Product">
        <form method="POST" action="/{{app()->getLocale()}}/admin/products" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.input name="certificate" type="file"  />
            <x-form.input name="ifra_certificate" type="file"  />
            <x-form.input name="safety" type="file" />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />
            <x-form.textarea name="meta_title" ></x-form.textarea>
            <x-form.textarea name="meta_keywords" ></x-form.textarea>
           <x-form.textarea name="meta_description"></x-form.textarea>


            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <x-form.input name="title_ru" />
            <x-form.textarea name="excerpt_ru" />
            <x-form.textarea name="body_ru" />
            <x-form.textarea name="meta_title_ru" ></x-form.textarea>
            <x-form.textarea name="meta_description_ru"></x-form.textarea>
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
