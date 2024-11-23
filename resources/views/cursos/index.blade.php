@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Lista de Cursos</h2>

    @if(session()->has('success'))
        <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Nome</th>
                <th class="border border-gray-300 px-4 py-2">Descrição</th>
                <th class="border border-gray-300 px-4 py-2">Duração</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $curso->nome }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $curso->descricao }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $curso->duracao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
