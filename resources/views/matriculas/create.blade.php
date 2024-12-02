<!--resources/views/matriculas/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular-se</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Realizar Matrícula</h2>

        <form method="POST" action="{{ route('matriculas.store') }}">
            @csrf

            @php
                $form = \Filament\Forms\Form::make()
                    ->schema([
                        \Filament\Forms\Components\Select::make('usuario_id')
                            ->label('Selecionar Usuário')
                            ->options(\App\Models\Usuario::all()->pluck('name', 'id'))
                            ->required(),

                        \Filament\Forms\Components\Select::make('curso_id')
                            ->label('Selecionar Curso')
                            ->options(\App\Models\Curso::all()->pluck('nome', 'id'))
                            ->required(),
                    ])
                    ->action(route('matriculas.store'));

                echo $form;
            @endphp

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg w-full hover:bg-blue-600">Matricular</button>
        </form>
    </div>

</body>
</html>
