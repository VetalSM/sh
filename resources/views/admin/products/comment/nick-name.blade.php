<x-layout>
    <x-setting heading="Manage Comments">
                            @foreach (\App\Models\Comment::all() as $comment)
            {{ $comment->nickName }}<br/>
                            @endforeach

    </x-setting>
</x-layout>
