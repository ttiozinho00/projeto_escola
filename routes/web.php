<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\LoginController;
use App\Livewire\UsuarioForm;
use App\Livewire\CursoForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui você pode registrar as rotas da sua aplicação. Elas são carregadas
| pelo RouteServiceProvider e todas elas serão atribuídas ao grupo de 
| middleware "web". Faça algo incrível!
|
*/

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Página Home
Route::get('/home', function () {
    return view('home');
})->name('home');

// Rotas para Usuários (Controller e Livewire)
Route::get('/usuarios/create', UsuarioForm::class)->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store'); // Controller para salvar
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show'); // Exibir usuário
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); // Deletar usuário

// Rotas para Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Formulário de login
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate'); // Autenticação
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout

// Rotas para Cursos (Controller e Livewire)
Route::get('/cursos/create', CursoForm::class)->name('cursos.create'); // Livewire
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index'); // Listar cursos

// Rotas para Matrículas
Route::get('/matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create'); // Formulário de matrícula
Route::post('/matriculas', [MatriculaController::class, 'store'])->name('matriculas.store'); // Salvar matrícula
