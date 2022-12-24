
<x-layout>
    <x-setting :heading="'Edit Product: ' . $product->title">
        <form method="POST" action="/admin/products/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @php
                $result=[];
                    foreach (\App\Models\Price::all() as $pric_e){
                         $result[]= $pric_e->name;
                    }
             $result=array_unique($result);
            @endphp
            <x-form.field>
                <x-form.label name="price"/>
                <select name="prices"  required>

                    @foreach ($result as $price)
                        <option

                            value="{{ $price }}"
                            {{ old('price', $product->prices) == $price ? 'selected' : '' }}
                        >{{ ucwords($price) }}</option>
                    @endforeach
                </select>
                <x-form.error name="price"/>
            </x-form.field>
            <x-form.field>
                <x-form.label name="status"/>
                <select  name="status" required>
                    <option selected>{{old('status', $product->status)}}</option>
                    <option value="active">active</option>
                    <option value="new">new</option>
                    <option value="promotion">promotion</option>
                    <option value="sale">sale</option>
                    <option value="hit">hit</option>
                    <option value="expect">expect</option>
                    <option value="ends">ends</option>
                    <option value="not_available">not_available</option>
                </select>
                <x-form.error name="status"/>
            </x-form.field>
            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <x-form.input name="title" :value="old('title', $product->title)" required />
            <x-form.input name="slug" :value="old('slug', $product->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $product->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
            <x-form.input name="certificate" type="file"  />
           <span> {{$product->certificate}}</span>
            <x-form.input name="ifra_certificate" type="file"  />
            <span> {{$product->ifra_certificate}}</span>
            <x-form.input name="safety" type="file" />
            <span> {{$product->safety}}</span>
            <x-form.textarea name="excerpt" required>{{ old('excerpt', $product->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" required>{{ old('body', $product->body) }}</x-form.textarea>
            <x-form.textarea name="meta_title" >{{ old('meta_title', $product->meta_title) }}</x-form.textarea>
            <x-form.textarea name="meta_keywords" >{{ old('meta_keywords', $product->meta_keywords) }}</x-form.textarea>
            <x-form.textarea name="meta_description" >{{ old('meta_description', $product->meta_description) }}</x-form.textarea>


            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
