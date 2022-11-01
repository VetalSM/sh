<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Реєстрація!</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <x-form.input name="name" placeholder="П.І.Б"required />
                    <x-form.input name="username"placeholder="логін" required />
                    <x-form.input name="email" placeholder="email" type="email" required />
                    <x-form.input name="password" placeholder="пароль" type="password" autocomplete="new-password" required />
                    <x-form.button>Зареєструватися</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
{{--<x-layout>--}}
{{--    <section class="px-6 py-8">--}}
{{--        <main class="max-w-lg mx-auto mt-10">--}}
{{--            <x-panel>--}}
{{--                <h1 class="text-center font-bold text-xl">Реєстрація!</h1>--}}

{{--                <form method="POST" action="/register" class="mt-10">--}}
{{--                    @csrf--}}

{{--                    <x-form.input name="П.І.Б" required />--}}
{{--                    <x-form.input name="логін" required />--}}
{{--                    <x-form.input name="email" type="email" required />--}}
{{--                    <x-form.input name="пароль" type="password" autocomplete="new-password" required />--}}
{{--                    <x-form.button>Зареєструватися</x-form.button>--}}
{{--                </form>--}}
{{--            </x-panel>--}}
{{--        </main>--}}
{{--    </section>--}}
{{--</x-layout>--}}
