<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Projetos\CriarProjetosController;
use App\Http\Controllers\Projetos\RemoverProjetosController;
use App\Http\Controllers\Projetos\ExibirProjetosController;

use App\Http\Controllers\RegisterController;



Route::redirect('/', '/projetos', 302);

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        Route::get('', [ExibirProjetosController::class, 'index'])->name('projetos');
        Route::any('/pesquisar', [ExibirProjetosController::class, 'search'])->name('pesquisar');
        
        Route::post('', [CriarProjetosController::class, 'store'])->name('projetos.salvar');
        Route::post('/excluir/{id}', [ExcluirProjetosController::class, 'destroy'])->name('projetos.excluir');
    });
    
    Route::prefix('/usuarios')->group(function () {
        
        Route::get('/{id}/{nick}', [UserController::class, 'edit'])->name('usuarios.editar');
        
        Route::get('/{id}/{nick}/projetos', [UserController::class, 'projetosUsuario'])->name('usuarios.projetos');
        Route::post('/{id}/editar', [UserController::class, 'update'])->name('usuarios.atualizar');
    });
});

Route::get('projetos/{id}/{nome}', [ExibirProjetosController::class, 'show'])->name('projetos.projeto');
Route::get('/projetos', [ExibirProjetosController::class, 'index'])->name('projetos');
Route::get('/projetos/criar', [CriarProjetosController::class, 'create'])->name('projetos.criar');


include __DIR__ . '/auth.php';
    




   









 
