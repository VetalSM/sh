<x-layout>
    <x-setting heading="Manage Comments">



                                <div class="flex">

                                    <main class="flex-1">
                                        <x-panel>
                                            <h4>Тел</h4>
                                            @foreach (\App\Models\Comment::all() as $comment)
                                                {{ $comment->tel }}<br/>
                                            @endforeach
                                        </x-panel>
                                    </main>
                                    <main class="flex-2">
                                        <x-panel>
                                            <h4>Никнейм</h4>
                                            @foreach (\App\Models\Comment::all() as $comment)
                                                {{ $comment->nickName }}<br/>
                                            @endforeach
                                        </x-panel>
                                    </main>
                                    <main class="flex-3">
                                        <x-panel>
                                            <h4>Имя</h4>
                                            @foreach (\App\Models\Comment::all() as $comment)
                                                {{ $comment->name }}<br/>
                                            @endforeach
                                        </x-panel>
                                    </main>
                                </div>


    </x-setting>
</x-layout>
