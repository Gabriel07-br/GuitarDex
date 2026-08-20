<x-layout title="Login - Guitardex">
    <div class="max-w-md mx-auto my-12 p-6 bg-gray-800 rounded-xl border border-gray-700 shadow-xl">
        <h2 class="text-2xl font-bold text-white text-center mb-6">Acessar sua Conta</h2>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">E-mail</label>
                <input id="email" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Senha</label>
                <input id="password" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between text-sm">
                <label for="remember_me" class="inline-flex items-center text-gray-300">
                    <input id="remember_me" type="checkbox" class="rounded bg-gray-900 border-gray-700 text-red-600 focus:ring-red-500" name="remember">
                    <span class="ms-2">Lembrar de mim</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-red-400 hover:text-red-300 transition" href="{{ route('password.request') }}">
                        Esqueceu a senha?
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition">
                Entrar
            </button>
        </form>
    </div>
</x-layout>