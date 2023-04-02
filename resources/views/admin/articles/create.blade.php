<x-articles.layout-art>
    <x-setting heading="Publish New Product">
        <form method="POST" action="/{{app()->getLocale()}}/admin/articles" enctype="multipart/form-data">
            @csrf
            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>

                    @foreach (\App\Models\ArtCategory::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
{{--            <x-form.input name="certificate" type="file"  />--}}
{{--            <x-form.input name="ifra_certificate" type="file"  />--}}
{{--            <x-form.input name="safety" type="file" />--}}
            <textarea id="body" name="excerpt" required > </textarea>
{{--            <x-form.textarea name="body" required />--}}
            <textarea id="body" name="body" required> </textarea>

            <script>
                tinymce.init({
                    selector: '#body',
                    language: 'ru',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage  tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                });
            </script>
            <x-form.textarea name="meta_title" ></x-form.textarea>
            <x-form.textarea name="meta_keywords" ></x-form.textarea>
           <x-form.textarea name="meta_description"></x-form.textarea>



            <x-form.input name="title_ru" ></x-form.input>
            <x-form.textarea name="excerpt_ru" ></x-form.textarea>
            <x-form.textarea name="body_ru" ></x-form.textarea>
            <x-form.textarea name="meta_title_ru" ></x-form.textarea>
            <x-form.textarea name="meta_description_ru"></x-form.textarea>
            @foreach (\App\Models\Hashtag::all() as $hashtag)
                <div>
                    <label>
                        <input type="checkbox" name="hashtags[]" value="{{ $hashtag->id }}"
                         >
                        @if(app()->getLocale() === 'ua')
                            {{ $hashtag->name }}
                        @else
                            {{ $hashtag->name_ru }}
                        @endif

                    </label>
                </div>
            @endforeach
            <x-form.button >Publish</x-form.button>
        </form>
    </x-setting>
</x-articles.layout-art>
