<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    
    /**
     * Exibe o formulário de matrícula.
     */
    public function create()
    {
        $cursos = Curso::all();
        $usuarios = Usuario::all();

        return view('matriculas.create', compact('cursos', 'usuarios'));
    }

    /**
     * Armazena a matrícula.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        Matricula::create($request->all());

        return redirect()->route('matriculas.create')->with('success', 'Matrícula realizada com sucesso!');
    }
}
