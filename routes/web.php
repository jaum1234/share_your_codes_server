<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ProjetosUserController;
use App\Http\Controllers\Users\AtualizarUserController;
use App\Http\Controllers\Projetos\CriarProjetosController;
use App\Http\Controllers\Projetos\ExibirProjetosController;
use App\Http\Controllers\Projetos\RemoverProjetosController;

Route::redirect('/', '/projetos', 302);

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        Route::any('/pesquisar', [ExibirProjetosController::class, 'search'])->name('pesquisar');
        
        Route::post('', [CriarProjetosController::class, 'store'])->name('projetos.store');
        Route::post('/excluir/{id}', [RemoverProjetosController::class, 'destroy'])->name('projetos.destroy');
    });
    
    Route::prefix('/usuarios')->group(function () {
        
        Route::get('/{id}/{nick}', [AtualizarUserController::class, 'edit'])->name('usuarios.edit');
        
        Route::get('/{id}/{nick}/projetos', [ProjetosUserController::class, 'index'])->name('usuarios.projetos');
        Route::post('/{id}/editar', [AtualizarUserController::class, 'update'])->name('usuarios.update');
    });
});

Route::get('projetos/{id}/{nome}', [ExibirProjetosController::class, 'show'])->name('projetos.show');
Route::get('/projetos', [ExibirProjetosController::class, 'index'])->name('projetos.index');
Route::get('/projetos/criar', [CriarProjetosController::class, 'create'])->name('projetos.create');


Route::view('/teste', 'pages.vue');

include __DIR__ . '/auth.php';
    




   









 
