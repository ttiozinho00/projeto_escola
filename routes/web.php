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


Route::get('/home', function () {
    return view('home');
})->name('home');

// Rotas para Usuários
Route::get('/usuarios/create', UsuarioForm::class)->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// Rotas para Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas para Cursos
Route::get('/cursos/create', CursoForm::class)->name('cursos.create');
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');


// Rotas para Matrículas
Route::get('/matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
Route::post('/matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');
