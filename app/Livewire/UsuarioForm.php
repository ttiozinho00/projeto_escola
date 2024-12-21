<?php
/*app/Livewire/UsuarioForm.php*/

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

    public $nome;  // Alterei 'name' para 'nome' para corresponder ao banco de dados
    public $email;
    public $senha;

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
            'nome' => $validatedData['nome'],  // Usando 'nome' para corresponder ao banco
            'email' => $validatedData['email'],
            'senha' => Hash::make($validatedData['senha']),  // Criptografando a senha
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
            Forms\Components\TextInput::make('nome')  // Alterei 'name' para 'nome'
                ->label('Nome')
                ->required()  // Garantindo que o campo nome seja obrigatório
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label('E-mail')
                ->required()
                ->email()
                ->unique(Usuario::class, 'email')
                ->maxLength(255),

            Forms\Components\TextInput::make('senha')
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
