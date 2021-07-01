<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
 *  LoginController
 */

#get
Route::get('/login', [LoginController::class, 'formLogin']);
Route::get('/cadastro', [LoginController::class, 'formCadastro']);
Route::get('/logout', [LoginController::class, 'logout']);

#post
Route::post('/login/do', [LoginController::class, 'logar']);
Route::post('/cadastro/do', [LoginController::class, 'cadastrar']);
    




   









 
