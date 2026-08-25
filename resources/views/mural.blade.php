<x-layout title="Garagem - Guitardex">
    <div class="max-w-4xl mx-auto py-12 px-4">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-white">Mural de Equipamentos</h1>
        </div>

        {{-- Mensagem de Sucesso --}}
        @if (session('success'))
            <div class="bg-green-600/20 border border-green-500 text-green-300 p-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulário (Apenas Logados) --}}
        @auth
            <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 mb-10 shadow-lg">
                <h2 class="text-xl font-semibold mb-4 text-white">Adicionar Equipamento à sua Garagem</h2>

                <form action="{{ route('mural.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Marca *</label>
                            <input type="text" name="brand" placeholder="Ex: Fender, Gibson, Tagima" required
                                   class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Modelo *</label>
                            <input type="text" name="model" placeholder="Ex: Stratocaster, Les Paul" required
                                   class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Ano</label>
                            <input type="number" name="year" placeholder="Ex: 2018"
                                   class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Cor / Acabamento</label>
                            <input type="text" name="color" placeholder="Ex: Sunburst, Black"
                                   class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Detalhes / Especificações</label>
                        <textarea name="description" rows="3" placeholder="Captadores, modificações, história da guitarra..."
                                  class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-6 rounded-lg transition shadow-md">
                        Cadastrar Equipamento
                    </button>
                </form>
            </div>
        @else
            <div class="bg-gray-800/60 p-6 rounded-xl border border-gray-700 text-center mb-10">
                <p class="text-gray-300 mb-4">Você precisa estar logado para cadastrar suas guitarras no mural.</p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('login') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm transition">Fazer Login</a>
                    <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Criar Conta</a>
                </div>
            </div>
        @endauth

        {{-- Lista de Guitarras da Comunidade --}}
        <h2 class="text-2xl font-bold text-white mb-6">Equipamentos Cadastrados</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($guitars as $guitar)
                <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 shadow-md hover:border-red-500/50 transition">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="text-xl font-bold text-white">{{ $guitar->brand }} {{ $guitar->model }}</h3>
                            <p class="text-xs text-red-400 font-medium">Dono: {{ $guitar->user->name }}</p>
                        </div>
                        @if ($guitar->year)
                            <span class="bg-gray-700 text-gray-300 text-xs px-2.5 py-1 rounded-full font-mono">
                                {{ $guitar->year }}
                            </span>
                        @endif
                    </div>

                    @if ($guitar->color)
                        <p class="text-sm text-gray-400 mb-3">🎨 Cor: <span class="text-gray-200">{{ $guitar->color }}</span></p>
                    @endif

                    @if ($guitar->description)
                        <p class="text-sm text-gray-300 bg-gray-900/60 p-3 rounded-lg border border-gray-700/50">
                            {{ $guitar->description }}
                        </p>
                    @endif

                    @if (auth()->check() && auth()->id() === $guitar->user_id)
                        {{-- Aqui entram os botões de Editar e Excluir --}}
                        <a href="{{ route('guitars.edit', $guitar) }}" class="font-bold text-white">
                             Editar
                        </a>

                        <form action="{{ route('guitars.destroy', $guitar) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                             @csrf
                            @method('DELETE')
    
                         <button type="submit" class="font-bold text-white">
                             Excluir
                         </button>
                        </form>
                    @endif
                </div>
            @empty
                <div class="col-span-2 text-center py-12 bg-gray-800/30 rounded-xl border border-gray-800">
                    <p class="text-gray-400">Nenhum equipamento cadastrado ainda. Seja o primeiro!</p>
                </div>
            @endforelse
        </div>

    </div>
</x-layout>