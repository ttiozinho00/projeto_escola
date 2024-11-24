<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola</title>
    @vite('resources/css/app.css')  <!-- Inclui o Vite CSS -->
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Barra de navegação -->
    <header class="bg-blue-600 p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo ou Nome da Aplicação -->
            <div class="text-white font-bold text-xl">
                <a href="{{ route('home') }}" class="hover:text-gray-300">
                    Escola
                </a>
            </div>

            <!-- Links de Navegação -->
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-white hover:text-gray-300 text-lg">Home</a>
                <a href="{{ route('usuarios.create') }}" class="text-white hover:text-gray-300 text-lg">Criar Usuário</a>
            </nav>
        </div>
    </header>

    <!-- Conteúdo da Página -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Aqui será inserido o conteúdo da página -->
            @yield('content')
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-gray-800 py-4">
        <div class="text-center text-white text-sm">
            <p>&copy; {{ date('Y') }} Escola. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
