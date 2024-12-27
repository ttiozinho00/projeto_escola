<?php
/*app/Livewire/CursoForm.php*/

namespace App\Livewire;

use Livewire\Component;
use App\Models\Curso;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class CursoForm extends Component implements HasForms
{
    use InteractsWithForms {
        validate as filamentValidate; // Renomeia o método validate para evitar conflito
    }

    public $nome;
    public $descricao;
    public $duracao;

    /**
     * Inicializa o estado do formulário.
     */
    public function mount()
    {
        $this->form->fill([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'duracao' => $this->duracao,
        ]);
    }

    /**
     * Submete o formulário e cria o curso no banco.
     */
    public function submit()
    {
        // Validação dos dados do formulário usando o método renomeado
        $validatedData = $this->filamentValidate();

        // Criação do curso no banco de dados
        Curso::create([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'],
            'duracao' => $validatedData['duracao'],
        ]);

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
            Forms\Components\TextInput::make('nome')
                ->label('Nome do Curso')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('descricao')
                ->label('Descrição')
                ->nullable(),

            Forms\Components\TextInput::make('duracao')
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
