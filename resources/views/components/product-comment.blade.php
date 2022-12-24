@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
{{--        <div class="flex-shrink-0">--}}
{{--            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="60" height="60" class="rounded-xl">--}}
{{--        </div>--}}

        <div>
            <header class="mb-4">
                <h5 class="font-bold">{{ $comment->name }}</h5>

                <p >
                    Прокоментовано:
                    <time>{{ $comment->created_at->format("d-m-Y H:i:s") }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
