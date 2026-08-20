<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Guitardex - Sua Garagem Virtual' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col justify-between">

    <!-- Header / Navbar Principal -->
    <header class="bg-gray-800 border-b border-gray-700 shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold text-red-500 tracking-wide flex items-center gap-2">
                🎸 Guitardex
            </a>

            <!-- Menu de Navegação -->
            <nav class="flex gap-6 font-medium text-gray-300">
                <a href="/" class="hover:text-red-400 transition">Home</a>
                <a href="/mural" class="hover:text-red-400 transition">Mural</a>
                <a href="/sobre" class="hover:text-red-400 transition">Sobre</a>
            </nav>

<div class="flex items-center gap-4">
    {{-- Se o usuário ESTIVER LOGADO, mostra o nome dele e o botão de Sair --}}
    @auth
        <span class="text-gray-300 font-medium">
            Olá, <strong class="text-red-500">{{ auth()->user()->name }}</strong>
        </span>

        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-sm text-gray-400 hover:text-white transition">
                Sair
            </button>
        </form>
    @endauth

    {{-- Se o usuário NÃO estiver logado, mostra os botões normais --}}
    @guest
        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white text-sm">Entrar</a>
        <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
            Criar Conta
        </a>
    @endguest
</div>
        </div>
    </header>

    <!-- Conteúdo Dinâmico das Páginas -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Rodapé -->
    <footer class="bg-gray-800 border-t border-gray-700 py-6 text-center text-sm text-gray-400">
        <p>© {{ date('Y') }} Guitardex - Coleção e Comunidade de Equipamentos.</p>
    </footer>

</body>
</html>