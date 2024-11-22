<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;
use App\Livewire\UsuarioForm;

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

Route::get('/', function () {
    return view('welcome');
});

// Rota para Página Inicial - home
Route::get('/home', function () {
    return view('home');
})->name('home');

// Rota Livewire para Criar Usuário
Route::get('/usuarios/create', UsuarioForm::class)->name('usuarios.create');

// Controlador de Usuários (index, show, store, destroy)
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// Rotas de Cursos (create, store)
Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');

// Rotas de Matrículas (create, store)
Route::get('/matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
Route::post('/matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');
