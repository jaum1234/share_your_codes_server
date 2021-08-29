<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\UserController;



Route::view('/', 'welcome.home');

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        /**
         *  ProjetosController
         */
        
        #get
        Route::get('', [ProjetosController::class, 'index']);
        Route::get('/criar', [ProjetosController::class, 'create']);
        Route::get('/{id}/{nome}', [ProjetosController::class, 'show']);
        Route::any('/pesquisar', [ProjetosController::class, 'pesquisar'])->name('pesquisar');

        #post
        Route::post('', [ProjetosController::class, 'store']);
        Route::post('/excluir/{id}', [ProjetosController::class, 'destroy']);
    });

    Route::prefix('/usuarios')->group(function () {

        /**
         *  UserController
         */

        #get
        Route::get('/{id}/{nick}', [UserController::class, 'edit']);
        Route::get('/{id}/{nick}/projetos', [UserController::class, 'meusProjetos']);

        #post
        Route::post('/{id}/editar', [UserController::class, 'update']);
    });
});

/**
 *  AuthController
 */

#get
Route::get('/login', [AuthController::class, 'formLogin']);
Route::get('/cadastro', [AuthController::class, 'formCadastro']);
Route::get('/logout', [AuthController::class, 'logout']);

#post
Route::post('/login/do', [AuthController::class, 'logar']);
Route::post('/cadastro/do', [AuthController::class, 'cadastrar']);
    




   









 
