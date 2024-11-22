<!-- resources/views/livewire/usuario-form.blade.php -->

<div class="max-w-lg mx-auto p-4">
    <form wire:submit.prevent="submit" class="bg-white p-6 rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Cadastrar Usuário</h2>

        {{ $this->form }} <!-- Renderiza o formulário do Livewire -->

        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded mt-4">
            Criar Conta
        </button>
    </form>
</div>
