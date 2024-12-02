<!-- resources/views/livewire/login-form.blade.php -->
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg mt-20">
        <h2 class="text-3xl font-semibold text-center mb-6">Login</h2>

        <!-- Mensagem de erro, caso exista -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulário de Login do Livewire -->
        <form wire:submit.prevent="login">
            <!-- Renderizando os campos do formulário -->
            <div class="mb-4">
                {{ $this->form->getComponent('email')->render() }}
            </div>

            <div class="mb-4">
                {{ $this->form->getComponent('password')->render() }}
            </div>

            <!-- Botão de envio -->
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Entrar
                </button>
            </div>
        </form>
    </div>
</div>
