<!-- resources/views/cursos/create.blade.php -->
<x-layouts.app>
    <div class="max-w-sm mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Criar Novo Curso</h1>

        <form action="{{ route('cursos.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nome -->
            <div>
                <label for="nome" class="block text-gray-700 font-medium">Nome do Curso</label>
                <input type="text" name="nome" id="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nome') }}" required>
                @error('nome')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descrição -->
            <div>
                <label for="descricao" class="block text-gray-700 font-medium">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Duração -->
            <div>
                <label for="duracao" class="block text-gray-700 font-medium">Duração (horas)</label>
                <input type="number" name="duracao" id="duracao" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('duracao') }}" required>
                @error('duracao')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botão -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Salvar Curso
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
