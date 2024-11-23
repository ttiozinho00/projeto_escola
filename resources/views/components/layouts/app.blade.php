<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Escola' }}</title>
    <!-- Adicione o CSS do Tailwind -->
    @vite('resources/css/app.css') <!-- Altere se usar Laravel Mix ou CDN -->
    @livewireStyles <!-- Livewire CSS -->
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans">
    <!-- Cabeçalho -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto flex items-center justify-between p-6">
            <h1 class="text-4xl font-extrabold tracking-tight hover:text-gray-200 transition duration-300">
                Escola de Cursos
            </h1>
            <nav class="space-x-6 text-lg">
                <a href="/" class="text-gray-100 hover:text-gray-300 transition duration-300 font-semibold">Início</a>
                <a href="/cursos" class="text-gray-100 hover:text-gray-300 transition duration-300 font-semibold">Cursos</a>
                <a href="/contato" class="text-gray-100 hover:text-gray-300 transition duration-300 font-semibold">Contato</a>
            </nav>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="flex-grow py-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200">
                {{ $slot }}
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-gray-900 text-gray-300 text-center py-8">
        <div class="max-w-7xl mx-auto">
            <p class="text-sm">
                &copy; {{ date('Y') }} - <span class="text-white font-semibold">Escola de Cursos</span>. Todos os direitos reservados.
            </p>
            <div class="mt-6 flex justify-center space-x-6">
                <a href="#" class="text-blue-400 hover:text-blue-500 transition duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-500 transition duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-500 transition duration-300">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </footer>

    @livewireScripts <!-- Livewire Scripts -->
</body>
</html>
