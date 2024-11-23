<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-semibold text-center mb-6">Cadastrar Novo Curso</h2>

    @if(session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <div class="mt-6">
            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Salvar
            </button>
        </div>
    </form>
</div>
