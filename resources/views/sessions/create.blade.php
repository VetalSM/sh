<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-4xl lg:text-xl">Log In!</h1>

                <form method="POST" action="/login" class="mt-10 text-4xl lg:text-xl">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" placeholder="email" required />
                    <x-form.input name="password" type="password" autocomplete="current-password" placeholder="password" required />

                    <x-form.button>Увійти</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>

