<!--resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')  <!-- Adiciona o CSS gerado pelo Vite -->
    @livewireStyles  <!-- Adiciona os estilos do Livewire -->
</head>
<body class="bg-gray-100 p-8">

    @livewire('login-form')  <!-- Renderiza o componente Livewire LoginForm -->

    @livewireScripts  <!-- Adiciona os scripts necessários para o Livewire -->
</body>
</html>

