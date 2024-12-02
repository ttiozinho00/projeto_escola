<?php
/*app/Htto/Controllers/CursoController.php*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use App\Models\Curso;

class CursoController extends Controller implements HasForms
{
    use InteractsWithForms;

    /**
     * Exibe o formulário de criação de curso.
     */
    public function create()
    {
        $form = $this->makeForm()
            ->schema([
                \Filament\Forms\Components\TextInput::make('nome')
                    ->label('Nome do Curso')
                    ->required(),
                \Filament\Forms\Components\Textarea::make('descricao')
                    ->label('Descrição')
                    ->nullable(),
                \Filament\Forms\Components\TextInput::make('duracao')
                    ->label('Duração (em horas)')
                    ->numeric()
                    ->required(),
            ])
            ->model(Curso::class)
            ->statePath('data');

        return view('cursos.create', compact('form'));
    }

    /**
     * Salva o curso no banco de dados.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'duracao' => 'required|integer|min:1',
        ]);

        Curso::create($validatedData);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Exibe todos os cursos.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }
}
