<!-- resources/views/livewire/matricula-form.blade.php -->
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-lg mt-20">
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-6">Realizar Matrícula</h2>

        <!-- Mensagem de Sucesso -->
        @if (session()->has('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulário de Matrícula -->
        <form wire:submit.prevent="submit">
            <!-- Renderiza o formulário com o método form do Livewire -->
            {{ $this->form }}

            <!-- Botão de Envio -->
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Matricular
                </button>
            </div>
        </form>
    </div>
</div>
