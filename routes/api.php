<?php

use App\Http\Controllers\Projetos\AtualizarProjetosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ProjetosUserController;
use App\Http\Controllers\Users\AtualizarUserController;
use App\Http\Controllers\Projetos\CriarProjetosController;
use App\Http\Controllers\Projetos\ExibirProjetosController;
use App\Http\Controllers\Projetos\RemoverProjetosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['cors'])->group(function () {

    Route::middleware(['auth'])->group(function () {
    
        Route::prefix('/projetos')->group(function () {
            Route::post('', [CriarProjetosController::class, 'store'])->name('projetos.store');
            Route::delete('/{id}', [RemoverProjetosController::class, 'destroy'])->name('projetos.destroy');
            Route::put('/{id}', [AtualizarProjetosController::class, 'update'])->name('projeto.update');
        });
        
        Route::prefix('/users')->group(function () {
            Route::put('/{id}', [AtualizarUserController::class, 'update'])->name('users.update');
            Route::get('/{id}/projetos', [ProjetosUserController::class, 'index'])->name('users.projetos');
        });
    });
    
    Route::any('/pesquisar', [ExibirProjetosController::class, 'search'])->name('pesquisar');
    Route::get('/projetos', [ExibirProjetosController::class, 'index'])->name('projetos.index');
    Route::get('/projetos/{id}', [ExibirProjetosController::class, 'show'])->name('projetos.show');
    
    
    include __DIR__ . '/auth.php';
});


