@props(['articles'])

{{--@php--}}
{{--    $prod = \App\Models\Product::where('status', 'not_available')->get();--}}
{{--    $unsetId=[];--}}
{{--        $id=[];--}}
{{--         foreach ($prod as $prodID){--}}
{{--             $id[] = $prodID->id;--}}

{{--         }--}}
{{--         foreach($id as $key=>$value){--}}
{{--             $unsetId[$value]=$key;--}}

{{--              $products = $products->forget($value);--}}
{{--         }--}}
{{--$products = $products->forget($unsetId);--}}
{{--$count = $products->count();--}}
{{--//var_dump($count)--}}
{{--@endphp--}}


@if ($articles->count() >= 0)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($articles->skip(0) as $article)
            @if($article->status != "8")
            <x-articles.article-card
                :article="$article"
                class="{{ $loop->iteration < 3 ? 'col-span-2' : 'col-span-2' }}"></x-articles.article-card>
            @else
                @auth()
                    <x-articles.article-card
                        :article="$article"
                        class="{{ $loop->iteration < 3 ? 'col-span-2' : 'col-span-2' }}"></x-articles.article-card>
                @endauth
            @endif
        @endforeach
    </div>
@endif
