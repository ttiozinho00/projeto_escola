<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\Curso;

class CursoController extends Controller
{
    use InteractsWithForms;

    public function validate(Request $request, array $rules, array $messages = [], array $attributes = [])
    {
        return $request->validate($rules, $messages, $attributes);
    }

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

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'duracao' => 'required|integer|min:1',
        ]);

        Curso::create($data);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }
}
