<?php
/*app/Http/Controllers/CursoController.php*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    /**
     * Exibe o formulário de criação de curso.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Salva o curso no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação padrão do Laravel
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'duracao' => 'required|integer|min:1',
        ]);

        // Criação do curso
        Curso::create($validatedData);

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Exibe todos os cursos.
     */
    public function index()
    {
        // Recupera todos os cursos
        $cursos = Curso::all();

        // Retorna a view com os cursos
        return view('cursos.index', compact('cursos'));
    }
}
