<?php
/*app/Livewire/MatriculaForm.php*/
namespace App\Http\Livewire;

use App\Models\Curso;
use App\Models\Usuario;
use Livewire\Component;
use Filament\Forms;

class MatriculaForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $usuario_id;
    public $curso_id;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('usuario_id')
                ->label('Selecionar Usuário')
                ->options(Usuario::pluck('name', 'id'))
                ->required(),

            Forms\Components\Select::make('curso_id')
                ->label('Selecionar Curso')
                ->options(Curso::pluck('nome', 'id'))
                ->required(),
        ];
    }

    public function submit()
    {
        $this->validate();

        Matricula::create([
            'usuario_id' => $this->usuario_id,
            'curso_id' => $this->curso_id,
        ]);

        session()->flash('success', 'Matrícula realizada com sucesso!');
        return redirect()->route('matriculas.create');
    }

    public function render()
    {
        return view('livewire.matricula-form');
    }
}
