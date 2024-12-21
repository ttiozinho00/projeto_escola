<?php
/*app/Http/Cotrollers/LoginController.php*/
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Exibe o formulário de login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Realiza a autenticação do usuário.
     */
    public function authenticate(Request $request)
    {
        // Valida as credenciais de login
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:6',
        ]);

        // Tenta encontrar o usuário com o e-mail informado
        $user = Usuario::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['senha'], $user->senha)) {
            // Caso encontre, armazena o ID do usuário na sessão
            session(['usuario_id' => $user->id]);
            
            // Adiciona a mensagem de sucesso na sessão
            session()->flash('success', 'Usuário logado com sucesso!');
            
            // Redireciona para a página inicial ou dashboard
            return redirect()->route('home');
        }

        // Caso não encontre, retorna uma mensagem de erro
        return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
    }

    /**
     * Realiza o logout do usuário.
     */
    public function logout()
    {
        // Remove o ID do usuário da sessão
        session()->forget('usuario_id');
        // Redireciona para a página de login
        return redirect()->route('login');
    }

    /**
     * Método para exibir o formulário de login no Livewire
     * 
     * @return \Illuminate\View\View
     */
    public function showLoginFormLivewire()
    {
        return view('livewire.login-form');
    }
}
