<?php

// app/Http/Livewire/UsuarioForm.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Hash;

class UsuarioForm extends Component implements HasForms
{
    use InteractsWithForms;

    public $name;
    public $email;
    public $password;

    // Inicializa o formulário com o estado inicial
    public function mount()
    {
        $this->form->fill([]);
    }

    // Função para enviar o formulário
    public function submit()
    {
        // Validação dos dados do formulário
        $validatedData = $this->form->getState();

        // Criação do novo usuário
        Usuario::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),  // Criptografando a senha
        ]);

        // Exibe a mensagem de sucesso
        session()->flash('success', 'Usuário criado com sucesso!');

        // Redireciona para a página inicial ou qualquer outra página desejada
        return redirect()->route('home');
    }

    // Definindo a estrutura do formulário
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Nome')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label('E-mail')
                ->required()
                ->email()
                ->unique(Usuario::class, 'email')
                ->maxLength(255),

            Forms\Components\TextInput::make('password')
                ->label('Senha')
                ->required()
                ->password()
                ->minLength(8),
        ];
    }

    // Renderiza a view associada ao componente
    public function render()
    {
        return view('livewire.usuario-form', [
            'form' => $this->form, // Passando o formulário para a view
        ]);
    }
}