<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Login</h2>

        @if(session('error'))
            <div class="text-red-600 mb-4">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('authenticate') }}">
            @csrf

            @php
                $form = \Filament\Forms\Form::make()
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->required()
                            ->email()
                            ->placeholder('Digite seu e-mail'),

                        \Filament\Forms\Components\PasswordInput::make('password')
                            ->label('Senha')
                            ->required()
                            ->placeholder('Digite sua senha'),
                    ])
                    ->action(route('authenticate'));

                echo $form;
            @endphp

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg w-full hover:bg-blue-600">Entrar</button>
        </form>
    </div>

</body>
</html>
