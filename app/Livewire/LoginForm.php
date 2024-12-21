<?php

/*app/Livewire/LoginForm*/

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\LoginController;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput; 
use Illuminate\Support\Facades\Hash;

class LoginForm extends Component implements HasForms
{
    use InteractsWithForms;

    public $email;
    public $senha;

    // Inicializa o formulário com o estado inicial
    public function mount()
    {
        // Preenchendo o formulário com o estado inicial (se necessário)
        $this->form->fill([]);
    }

    // Função de login (chama o controller para autenticação)
    public function login()
    {
        // Valida os dados do formulário
        $validatedData = $this->form->getState();

        // Preparando os dados para enviar para o Controller de Login
        $controller = new LoginController();

        // Prepara a request com os dados
        $request = request()->merge([
            'email' => $validatedData['email'],
            'senha' => $validatedData['senha'],
        ]);

        // Chama o método de autenticação do controller
        return $controller->authenticate($request);
    }

    // Definindo o esquema do formulário
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('email')
                ->label('E-mail')
                ->required()
                ->email()
                ->placeholder('Digite seu e-mail'),

            // Usando TextInput com tipo 'password' para campo de senha
            TextInput::make('senha')
                ->label('Senha')
                ->required()
                ->password() // Aplica a máscara de senha
                ->placeholder('Digite sua senha'),
        ];
    }

    // Renderiza a view associada ao componente
    public function render()
    {
        return view('livewire.login-form', [
            'form' => $this->form, // Passando o formulário para a view
        ]);
    }
}
