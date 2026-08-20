<x-layout>
    <main class="py-10">
        <h1>
            Faça Login.
        </h1>
        <section class="mt-4">
            <form action="/login" method="POST">
                @csrf

                <div>
                    @error('email')
                    <p class="text-red-500 text-x1 mt-1">
                    {{$message}}
                    </p>
                    @enderror
                </div>

                <input
                type="email"
                name="email"
                placeholder="you@example.com"
                class="bg-white p-2 border-2"
                >
                <input
                type="password"
                name="password"
                placeholder="******"
                class="bg-white p-2 border-2"
                >
                <button
                type="submit"
                class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600"
                >
                Entrar
                </button>
            </form>

        </section>

    </main>
</x-layout>