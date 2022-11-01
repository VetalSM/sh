@props(['posts'])



@if ($posts->count() >= 0)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(0) as $post)
            <x-post-card
                :post="$post"
                class="{{ $loop->iteration < 3 ? 'col-span-2' : 'col-span-2' }}"></x-post-card>
        @endforeach
    </div>
@endif
