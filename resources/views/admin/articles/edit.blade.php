
<x-articles.layout-art>
    <x-setting :heading="'Edit Product: ' . $article->title">
        <form method="POST" action="/{{app()->getLocale()}}/admin/articles/{{ $article->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            <x-form.field>
                <x-form.label name="status"/>
                <select  name="status" required>
                    <option selected>{{old('status', $article->status)}}</option>
                    <option value="4">active</option>
                    <option value="8">not_available</option>
                </select>
                <x-form.error name="status"/>
            </x-form.field>
            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\ArtCategory::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <x-form.input name="title" :value="old('title', $article->title)" required />
            <x-form.input name="slug" :value="old('slug', $article->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $article->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <textarea id="body"  name="excerpt" required>{{ old('excerpt', $article->excerpt) }}</textarea>

            <textarea id="body" name="body" required>{{ old('body', $article->body) }}</textarea>

            <script>
                tinymce.init({
                    selector: '#body',
                    language: 'ru',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                });
            </script>
            <x-form.textarea name="meta_title" >{{ old('meta_title', $article->meta_title) }}</x-form.textarea>
            <x-form.textarea name="meta_keywords" >{{ old('meta_keywords', $article->meta_keywords) }}</x-form.textarea>
            <x-form.textarea name="meta_description" >{{ old('meta_description', $article->meta_description) }}</x-form.textarea>

            <x-form.input name="title_ru" :value="old('title', $article->title_ru)" required />
            <x-form.textarea name="excerpt_ru" required>{{ old('excerpt', $article->excerpt_ru) }}</x-form.textarea>
            <x-form.textarea name="body_ru" required>{{ old('body', $article->body_ru) }}</x-form.textarea>
            <x-form.textarea name="meta_title_ru" >{{ old('meta_title', $article->meta_title_ru) }}</x-form.textarea>
            <x-form.textarea name="meta_description_ru" >{{ old('meta_description', $article->meta_description_ru) }}</x-form.textarea>
            @foreach (\App\Models\Hashtag::all() as $hashtag)
                <div>
                    <label>
                        <input type="checkbox" name="hashtags[]" value="{{ $hashtag->id }}"
                            {{ $article->hashtags->contains($hashtag->id) ? 'checked' : '' }}>
                        @if(app()->getLocale() === 'ua')
                            {{ $hashtag->name }}
                        @else
                            {{ $hashtag->name_ru }}
                        @endif

                    </label>
                </div>
            @endforeach

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-articles.layout-art>
