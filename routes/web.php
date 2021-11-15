<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ProjetosUserController;
use App\Http\Controllers\Users\AtualizarUserController;
use App\Http\Controllers\Projetos\CriarProjetosController;
use App\Http\Controllers\Projetos\ExibirProjetosController;
use App\Http\Controllers\Projetos\RemoverProjetosController;

Route::redirect('/', '/projetos', 302);

Route::prefix('/projetos')->group(function () {
    Route::get('', [ExibirProjetosController::class, 'index'])->name('projetos.index');
    Route::get('/{id}', [ExibirProjetosController::class, 'show'])->name('projetos.show');
    Route::get('/create', [CriarProjetosController::class, 'create'])->name('projetos.create');
    Route::post('', [CriarProjetosController::class, 'store'])->name('projetos.store');
    Route::delete('/{id}', [RemoverProjetosController::class, 'destroy'])->name('projetos.destroy');
    Route::any('/pesquisar', [ExibirProjetosController::class, 'search'])->name('pesquisar');
});

Route::prefix('/users')->group(function () {
    Route::get('/{id}/edit', [AtualizarUserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [AtualizarUserController::class, 'update'])->name('users.update');
    Route::get('/{id}/projetos', [ProjetosUserController::class, 'index'])->name('users.projetos');
});

include __DIR__ . '/auth.php';
    




   









 
