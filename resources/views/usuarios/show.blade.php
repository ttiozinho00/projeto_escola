@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-lg w-full bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-center">Detalhes do Usuário</h2>

            <div class="mb-4">
                <label class="font-semibold">Nome</label>
                <p>{{ $usuario->nome }}</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold">E-mail</label>
                <p>{{ $usuario->email }}</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold">Data de Criação</label>
                <p>{{ $usuario->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div class="text-center mt-4">
                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Excluir Usuário</button>
                </form>
            </div>
        </div>
    </div>
@endsection
