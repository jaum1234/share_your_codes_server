<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EditorDeCodigoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share\Share;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Home page */
Route::get('/', function() {
    return view('welcome.home');
});

/* Controlador do editor */

//get
Route::get('/editorDeCodigo', [EditorDeCodigoController::class, 'create'])
    ->middleware('auth');
Route::get('/meusProjetos', [EditorDeCodigoController::class, 'meusProjetos'])
    ->middleware('auth');
Route::get('/comunidade', [EditorDeCodigoController::class, 'comunidade'])
    ->middleware('auth');
Route::get('/projeto/{nome}/{id}', [EditorDeCodigoController::class, 'paginaDoProjeto']);
Route::get('/compartilhar/{projetoId}', [EditorDeCodigoController::class, 'compartilhar'])
    ->middleware('auth');


//post
Route::post('/pesquisar', [EditorDeCodigoController::class, 'pesquisar']);
Route::post('/editorDeCodigo', [EditorDeCodigoController::class, 'store'])
    ->middleware('auth');
Route::post('/excluir/{id}', [EditorDeCodigoController::class, 'destroy'])
    ->middleware('auth');

/* Controlador do login */

//get
Route::get('/login', [LoginController::class, 'formLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/cadastro', [LoginController::class, 'formCadastro']);

//post
Route::post('/cadastro/do', [LoginController::class, 'cadastrar']);
Route::post('/login/do', [LoginController::class, 'logar']);

/*Controlador do User*/

//get
Route::get('/user/{apelido}', [UserController::class, 'index'])
    ->middleware('auth');
Route::post('/user/editarPerfil/{id}', [UserController::class, 'editarPerfil'])
    ->middleware('auth');

//------------------------

/**
 * Mobile
 */

