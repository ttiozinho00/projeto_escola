<?php
/*app/Htto/Controllers/LoginController.php*/
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Filament\Forms;

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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = Usuario::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['usuario_id' => $user->id]);
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
    }

    /**
     * Realiza o logout do usuário.
     */
    public function logout()
    {
        session()->forget('usuario_id');
        return redirect()->route('login');
    }
}
