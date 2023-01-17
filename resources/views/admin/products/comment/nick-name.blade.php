<x-layout>
    <x-setting heading="Manage Comments">
                            @foreach (\App\Models\Comment::all() as $comment)
            {{ $comment->nickName }}<br/>
                            @endforeach
        --------------------------------------------------<br/>
                                @foreach (\App\Models\Comment::all() as $comment)
                                    {{ $comment->name }}<br/>
                                @endforeach

    </x-setting>
</x-layout>
