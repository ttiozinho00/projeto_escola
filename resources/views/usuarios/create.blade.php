<!-- resources/views/usuarios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Criar Novo Usuário</h1>
    <form method="POST" action="{{ route('usuarios.store') }}" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <!-- Nome -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" value="{{ old('email') }}" required class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div>
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" name="password" type="password" required class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Senha -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" required class="block mt-1 w-full" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>{{ __('Criar Usuário') }}</x-primary-button>
        </div>
    </form>
@endsection
