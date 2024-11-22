<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Cadastrar Curso</h1>
        <form method="POST" action="{{ route('cursos.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            {{ $form }}
            <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded">
                Salvar
            </button>
        </form>
    </div>
</body>
</html>
