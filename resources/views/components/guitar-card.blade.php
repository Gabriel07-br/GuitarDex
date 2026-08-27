            @props(['guitar'])
              <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 shadow-md hover:border-red-500/50 transition flex flex-col justify-between">
                    <div>
                        {{-- Imagem da Guitarra --}}
                        @if ($guitar->image)
                            <img src="{{ asset('storage/' . $guitar->image) }}" alt="{{ $guitar->model }}" class="w-full h-48 object-cover rounded-lg mb-4 border border-gray-700">
                        @else
                            <div class="w-full h-48 bg-gray-900 rounded-lg mb-4 border border-gray-700 flex items-center justify-center text-gray-500 font-mono text-sm">
                                Sem foto disponível
                            </div>
                        @endif

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
                            <p class="text-sm text-gray-400 mb-3"> Cor: <span class="text-gray-200">{{ $guitar->color }}</span></p>
                        @endif

                        @if ($guitar->description)
                            <p class="text-sm text-gray-300 bg-gray-900/60 p-3 rounded-lg border border-gray-700/50 mb-4">
                                {{ $guitar->description }}
                            </p>
                        @endif
                    </div>

                    {{-- Ações do Dono --}}
                    @if (auth()->check() && auth()->id() === $guitar->user_id)
                        <div class="flex items-center gap-4 pt-4 border-t border-gray-700/60 mt-2">
                            <a href="{{ route('guitars.edit', $guitar) }}" class="text-sm font-bold text-gray-300 hover:text-white transition">
                                Editar
                            </a>

                            <form action="{{ route('guitars.destroy', $guitar) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-sm font-bold text-red-400 hover:text-red-300 transition">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    @endif
                </div>