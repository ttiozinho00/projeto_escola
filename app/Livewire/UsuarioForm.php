<?php

// app/Http/Livewire/UsuarioForm.php

namespace App\Livewire;

use Filament\Forms;
use Livewire\Component;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $name;
    public $email;
    public $password;

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

    public function submit()
    {
        $this->validate();

        // Criação do usuário
        $usuario = Usuario::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Logando automaticamente
        auth()->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        session()->flash('message', 'Usuário cadastrado e logado com sucesso!');
        
        // Redirecionar para a página inicial
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.usuario-form')->layout('layouts.app'); // Garantir que o layout está correto
    }
}
