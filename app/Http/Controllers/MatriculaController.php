<?php
/*app/Http/Controllers/MatriculaController.php*/
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

        // Cria a matrícula
        Matricula::create($request->all());

        // Define a chave de sessão personalizada
        return redirect()->route('matriculas.create')
                         ->with('matricula_realizada', 'Matrícula realizada com sucesso!');
    }
}
