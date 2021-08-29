<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditorDeCodigoController;
use App\Http\Controllers\UserController;



Route::view('/', 'welcome.home');

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        /**
         *  EditorDeCodigoController
         */
        
        #get
        Route::get('', [EditorDeCodigoController::class, 'index']);
        Route::get('/criar', [EditorDeCodigoController::class, 'create']);
        Route::get('/{id}/{nome}', [EditorDeCodigoController::class, 'show']);
        Route::get('/pesquisar', [EditorDeCodigoController::class, 'pesquisar']);

        #post
        Route::post('', [EditorDeCodigoController::class, 'store']);
        Route::post('/excluir/{id}', [EditorDeCodigoController::class, 'destroy']);
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
    




   









 
