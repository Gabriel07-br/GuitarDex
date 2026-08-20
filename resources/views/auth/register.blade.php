<x-layout title="Criar Conta - Guitardex">
    <div class="max-w-md mx-auto my-12 p-6 bg-gray-800 rounded-xl border border-gray-700 shadow-xl">
        <h2 class="text-2xl font-bold text-white text-center mb-6">Criar sua Conta</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nome</label>
                <input id="name" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">E-mail</label>
                <input id="email" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Senha</label>
                <input id="password" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirmar Senha</label>
                <input id="password_confirmation" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition mt-4">
                Cadastrar
            </button>
        </form>
    </div>
</x-layout>