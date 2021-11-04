<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/login', [LoginController::class, 'formLogin'])->name('form.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/do', [LoginController::class, 'logar'])->name('login');

Route::get('/cadastro', [RegisterController::class, 'formCadastro'])->name('form.cadastro');
Route::post('/cadastro/do', [RegisterController::class, 'cadastrar'])->name('cadastro');