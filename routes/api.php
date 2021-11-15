<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/projetos')->group(function () {
    Route::get('', [ExibirProjetosController::class, 'index'])->name('projetos.index');
    Route::get('/{id}', [ExibirProjetosController::class, 'show'])->name('projetos.show');
    Route::get('/create', [CriarProjetosController::class, 'create'])->name('projetos.create');
    Route::post('', [CriarProjetosController::class, 'store'])->name('projetos.store');
    Route::delete('/{id}', [RemoverProjetosController::class, 'destroy'])->name('projetos.destroy');
    Route::any('/pesquisar', [ExibirProjetosController::class, 'search'])->name('pesquisar');
});

include __DIR__ . '/auth.php';

