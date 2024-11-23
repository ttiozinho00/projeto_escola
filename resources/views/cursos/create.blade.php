@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-10 rounded-lg shadow-xl mt-12">
    <!-- Título do formulário -->
    <h2 class="text-4xl font-bold text-center text-blue-600 mb-10">Cadastrar Novo Curso</h2>

    <!-- Exibição de mensagens de erro -->
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-md">
            <div class="text-red-700 font-semibold mb-2">Houve alguns erros:</div>
            <ul class="list-disc list-inside text-red-500 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário -->
    <form method="POST" action="{{ route('cursos.store') }}" class="space-y-8">
        @csrf

        <!-- Formulário gerado pelo Filament Forms -->
        <div class="space-y-6">
            {{ $form }}
        </div>

        <!-- Botão de envio -->
        <div class="text-center mt-8">
            <button type="submit" class="w-full md:w-auto px-10 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium text-lg rounded-lg shadow-lg hover:from-blue-600 hover:to-blue-700 transition-transform duration-300 transform hover:scale-105 focus:ring-4 focus:ring-blue-300">
                Salvar Curso
            </button>
        </div>
    </form>
</div>
@endsection
