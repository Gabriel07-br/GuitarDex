<x-layout>
    <div class="max-w-2xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md mt-10">
    <h1 class="text-2xl font-bold mb-6 text-white">Editar Equipamento</h1>

    <form action="{{ route('guitars.update', $guitar) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-white">Marca</label>
            <input type="text" name="brand" value="{{ old('brand', $guitar->brand) }}" 
                   class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Modelo</label>
            <input type="text" name="model" value="{{ old('model', $guitar->model) }}" 
                   class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Cor/Acabamento</label>
            <input type="text" name="color" value="{{ old('color', $guitar->color) }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Ano</label>
            <input type="number" name="year" value="{{ old('year', $guitar->year) }}" class="w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Detalhes/Especificações</label>
            <textarea name="description" class="text-black w-full bg-gray-900 border border-gray-700 rounded-lg p-2.5 text-gray-100 focus:ring-2 focus:ring-red-500 focus:outline-none">{{ old('description', $guitar->description) }}</textarea>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Salvar Alterações
            </button>
            <a href="{{ route('mural.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300">
                Cancelar
            </a>
        </div>
    </form>
</div>
</x-layout>