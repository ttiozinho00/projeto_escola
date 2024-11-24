<!-- resources/views/cursos/index.blade.php -->
<x-layouts.app>
    <div class="max-w-5xl mx-auto mt-8">
        <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Lista de Cursos</h1>

        <!-- Mensagem de sucesso -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 rounded-lg p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabela -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Nome</th>
                        <th class="px-4 py-2 text-left">Descrição</th>
                        <th class="px-4 py-2 text-left">Duração</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cursos as $curso)
                        <tr class="border-t border-gray-200 hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $curso->nome }}</td>
                            <td class="px-4 py-2">{{ $curso->descricao }}</td>
                            <td class="px-4 py-2">{{ $curso->duracao }} horas</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">Nenhum curso encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
