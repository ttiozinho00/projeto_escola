<!-- resources/views/matriculas/matricula-create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-lg mt-20">
            <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Realizar Matrícula</h1>

            <form method="POST" action="{{ route('matriculas.store') }}" class="space-y-6">
                @csrf

                <!-- Selecionar Usuário -->
                <div>
                    <label for="usuario_id" class="block text-gray-700 font-medium">Selecionar Usuário</label>
                    <select id="usuario_id" name="usuario_id" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Selecione um usuário</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>{{ $usuario->nome }}</option>
                        @endforeach
                    </select>
                    @error('usuario_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Selecionar Curso -->
                <div>
                    <label for="curso_id" class="block text-gray-700 font-medium">Selecionar Curso</label>
                    <select id="curso_id" name="curso_id" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Selecione um curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}</option>
                        @endforeach
                    </select>
                    @error('curso_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botão -->
                <div class="mt-6">
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Realizar Matrícula
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
