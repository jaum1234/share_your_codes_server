<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\RegisterController;
=======
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EditorDeCodigoController;
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3



Route::redirect('/', '/projetos', 302);

Route::middleware('auth')->group(function () {
    Route::prefix('/projetos')->group(function () {

        Route::get('', [ProjetosController::class, 'index'])->name('projetos');
        Route::any('/pesquisar', [ProjetosController::class, 'search'])->name('pesquisar');
        
<<<<<<< HEAD
        Route::post('', [ProjetosController::class, 'store'])->name('projetos.salvar');
        Route::post('/excluir/{id}', [ProjetosController::class, 'destroy'])->name('projetos.excluir');
=======
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
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3
    });
    
    Route::prefix('/usuarios')->group(function () {
<<<<<<< HEAD
        
        Route::get('/{id}/{nick}', [UserController::class, 'edit'])->name('usuarios.editar');
        
        Route::get('/{id}/{nick}/projetos', [UserController::class, 'projetosUsuario'])->name('usuarios.projetos');
        Route::post('/{id}/editar', [UserController::class, 'update'])->name('usuarios.atualizar');
=======

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
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3
    });
});

Route::get('projetos/{id}/{nome}', [ProjetosController::class, 'show'])->name('projetos.projeto');
Route::get('/projetos', [ProjetosController::class, 'index'])->name('projetos');
Route::get('/projetos/criar', [ProjetosController::class, 'create'])->name('projetos.criar');


<<<<<<< HEAD
Route::get('/login', [AuthController::class, 'formLogin'])->name('form.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/do', [AuthController::class, 'logar'])->name('login');

Route::get('/cadastro', [RegisterController::class, 'formCadastro'])->name('form.cadastro');
Route::post('/cadastro/do', [RegisterController::class, 'cadastrar'])->name('cadastro');
    
=======
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

>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3




   









 
