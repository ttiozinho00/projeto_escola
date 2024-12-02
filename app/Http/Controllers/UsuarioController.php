<?php
/*app/Http/Controllers/UsuarioController.php*/
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Exibe a lista de usuários.
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Exibe detalhes de um usuário específico.
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Exclui um usuário.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }

    /**
     * Exibe o formulário de cadastro de usuário.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Cria um novo usuário e faz login automaticamente.
     */
    public function store(Request $request)
    {
        // Validando os dados do usuário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Criando o usuário
        $usuario = Usuario::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Criptografando a senha
        ]);

        // Logando o usuário automaticamente
        Auth::login($usuario);

        // Redirecionando para a página inicial ou onde desejar
        return redirect()->route('home'); // Pode ser alterado para qualquer outra rota
    }
}
