<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\UserController;



Route::view('/', 'welcome.home');

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        Route::get('', [ProjetosController::class, 'index'])->name('projetos');
        Route::get('/criar', [ProjetosController::class, 'create'])->name('projetos.criar');
        Route::get('/{id}/{nome}', [ProjetosController::class, 'show'])->name('projetos.projeto');
        Route::any('/pesquisar', [ProjetosController::class, 'pesquisar'])->name('pesquisar');

        Route::post('', [ProjetosController::class, 'store'])->name('projetos.salvar');
        Route::post('/excluir/{id}', [ProjetosController::class, 'destroy'])->name('projetos.excluir');
    });

    Route::prefix('/usuarios')->group(function () {

        Route::get('/{id}/{nick}', [UserController::class, 'edit'])->name('usuarios.editar');
        Route::get('/{id}/{nick}/projetos', [UserController::class, 'meusProjetos'])->name('usuarios.projetos');

        Route::post('/{id}/editar', [UserController::class, 'update'])->name('usuarios.atualizar');
    });
});


Route::get('/login', [AuthController::class, 'formLogin'])->name('form.login');
Route::get('/cadastro', [AuthController::class, 'formCadastro'])->name('form.cadastro');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login/do', [AuthController::class, 'logar'])->name('login');
Route::post('/cadastro/do', [AuthController::class, 'cadastrar'])->name('login');
    




   









 
