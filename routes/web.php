<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\RegisterController;



Route::redirect('/', '/projetos', 302);

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        Route::get('', [ProjetosController::class, 'index'])->name('projetos');
        Route::any('/pesquisar', [ProjetosController::class, 'search'])->name('pesquisar');
        
        Route::post('', [ProjetosController::class, 'store'])->name('projetos.salvar');
        Route::post('/excluir/{id}', [ProjetosController::class, 'destroy'])->name('projetos.excluir');
    });
    
    Route::prefix('/usuarios')->group(function () {
        
        Route::get('/{id}/{nick}', [UserController::class, 'edit'])->name('usuarios.editar');
        
        Route::get('/{id}/{nick}/projetos', [UserController::class, 'projetosUsuario'])->name('usuarios.projetos');
        Route::post('/{id}/editar', [UserController::class, 'update'])->name('usuarios.atualizar');
    });
});

Route::get('projetos/{id}/{nome}', [ProjetosController::class, 'show'])->name('projetos.projeto');
Route::get('/projetos', [ProjetosController::class, 'index'])->name('projetos');
Route::get('/projetos/criar', [ProjetosController::class, 'create'])->name('projetos.criar');


Route::get('/login', [AuthController::class, 'formLogin'])->name('form.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/do', [AuthController::class, 'logar'])->name('login');

Route::get('/cadastro', [RegisterController::class, 'formCadastro'])->name('form.cadastro');
Route::post('/cadastro/do', [RegisterController::class, 'cadastrar'])->name('cadastro');
    




   









 
