<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EditorDeCodigoController;



Route::view('/', 'welcome.home');

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        /**
         *  EditorDeCodigoController
         */
        
        #get
        Route::get('', [EditorDeCodigoController::class, 'index']);
        Route::get('/criar', [EditorDeCodigoController::class, 'create']);
        Route::get('/{id}/{nome}', [EditorDeCodigoController::class, 'show'])
            ->whereNumber('id');
        Route::get('/pesquisar', [EditorDeCodigoController::class, 'pesquisar']);

        #post
        Route::post('', [EditorDeCodigoController::class, 'store']);
        Route::post('/excluir/{id}', [EditorDeCodigoController::class, 'destroy'])
            ->whereNumber('id');
    });

    Route::prefix('/usuarios')->group(function () {

        /**
         *  UserController
         */

        #get
        Route::get('/{id}/{nick}', [UserController::class, 'edit'])
            ->whereNumber('id');
        Route::get('/{id}/{nick}/projetos', [UserController::class, 'meusProjetos'])
            ->whereNumber('id');

        #post
        Route::post('/{id}/editar', [UserController::class, 'update'])
            ->whereNumber('id');
    });
});

/**
 *  LoginController
 */

#get
Route::get('/login', [LoginController::class, 'formLogin']);
Route::get('/logout', [LoginController::class, 'logout']);

#post
Route::post('/login/do', [LoginController::class, 'logar']);

/**
 *  CadastroController
 */

 #get
 Route::get('/cadastro', [CadastroController::class, 'formCadastro']);

 #post
 Route::post('/cadastro/do', [CadastroController::class, 'cadastrar']);





   









 
