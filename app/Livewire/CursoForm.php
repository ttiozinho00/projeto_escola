<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Curso;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class CursoForm extends Component implements HasForms
{
    use InteractsWithForms;

    public $data = []; // Propriedade para armazenar os dados do formulário

    public function mount()
    {
        // Inicializa o formulário com o estado inicial
        $this->form->fill([]); // Aqui passamos o estado inicial vazio
    }

    public function submit()
    {
        // Valida os dados do formulário
        $validatedData = $this->form->getState();

        // Cria o novo curso com os dados validados
        Curso::create($validatedData);

        // Exibe uma mensagem de sucesso
        session()->flash('success', 'Curso criado com sucesso!');
        
        // Redireciona para a lista de cursos
        return redirect()->route('cursos.index');
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nome')
                ->label('Nome do Curso')
                ->required(),
            Forms\Components\Textarea::make('descricao')
                ->label('Descrição')
                ->nullable(),
            Forms\Components\TextInput::make('duracao')
                ->label('Duração (em horas)')
                ->numeric()
                ->required(),
        ];
    }

    public function render()
    {
        return view('livewire.curso-form', [
            'form' => $this->form, // Passa o formulário para a view
        ]);
    }
}
