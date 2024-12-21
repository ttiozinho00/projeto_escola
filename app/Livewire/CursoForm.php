<?php
/*app/Livewire/CursoForm*/
namespace App\Livewire;

use Livewire\Component;
use App\Models\Curso;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class CursoForm extends Component implements HasForms
{
    use InteractsWithForms;

    public $data = [
        'nome' => '',
        'descricao' => '',
        'duracao' => '',
    ];

    /**
     * Inicializa o estado do formulário.
     */
    public function mount()
    {
        // Preenche o formulário com os dados iniciais
        $this->form->fill($this->data);
    }

    /**
     * Submete o formulário e cria o curso no banco.
     */
    public function submit()
    {
        // Valida os dados do formulário usando o método de validação do Livewire
        $validatedData = $this->validate([
            'data.nome' => 'required|string|max:255',
            'data.descricao' => 'nullable|string',
            'data.duracao' => 'required|integer',
        ]);

        // Cria o curso no banco de dados
        Curso::create($validatedData['data']);

        // Exibe uma mensagem de sucesso e redireciona
        session()->flash('success', 'Curso criado com sucesso!');
        return redirect()->route('cursos.index');
    }

    /**
     * Define o schema do formulário.
     */
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('data.nome')
                ->label('Nome do Curso')
                ->required(),
            Forms\Components\Textarea::make('data.descricao')
                ->label('Descrição')
                ->nullable(),
            Forms\Components\TextInput::make('data.duracao')
                ->label('Duração (em horas)')
                ->numeric()
                ->required(),
        ];
    }

    /**
     * Renderiza a view do componente.
     */
    public function render()
    {
        return view('livewire.curso-form', [
            'form' => $this->form,
        ]);
    }
}

