@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <!-- Título principal -->
        <h1 class="text-4xl font-bold text-blue-600 mb-4">
            Bem-vindo à Escola do Futuro!
        </h1>

        <!-- Descrição da missão -->
        <p class="mt-4 text-lg text-gray-700 leading-relaxed">
            Nossa missão é transformar vidas por meio da educação, preparando você para os desafios do amanhã. 
            Aqui, você pode explorar novos conhecimentos, desenvolver habilidades e criar um futuro brilhante.
        </p>

        <!-- Card de destaque com call to action -->
        <div class="mt-8 bg-blue-50 border-l-4 border-blue-600 p-4 rounded-lg shadow-md">
            <p class="text-xl font-semibold text-blue-700">Pronto para começar sua jornada de aprendizado?</p>
            <p class="mt-2 text-gray-700">Seja bem-vindo! Faça seu cadastro ou entre com sua conta para começar a explorar nossos cursos incríveis.</p>
        </div>

        <!-- Botões interativos -->
        <div class="mt-8 space-y-4 sm:space-y-0 sm:flex sm:justify-between">
            <!-- Botão de Cadastro -->
            <a href="{{ route('usuarios.create') }}" 
               class="w-full sm:w-auto text-center bg-blue-600 text-white py-3 px-6 rounded-md shadow-md hover:bg-blue-700 transform hover:scale-105 transition">
                Cadastre-se Agora
            </a>

            <!-- Botão de Login -->
            <a href="{{ route('login') }}" 
               class="w-full sm:w-auto text-center bg-blue-600 text-white py-3 px-6 rounded-md shadow-md hover:bg-blue-700 transform hover:scale-105 transition">
                Faça Login
            </a>
        </div>

        <!-- Dica adicional para criar engajamento -->
        <div class="mt-8 bg-gray-50 p-4 rounded-lg shadow-md">
            <p class="text-lg text-center text-gray-800">
                Tem alguma dúvida ou precisa de ajuda? <a href="mailto:suporte@escola.com" class="text-blue-600 hover:underline">Fale conosco!</a>
            </p>
        </div>
    </div>
@endsection
