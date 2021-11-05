<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('/cadastro', [RegisterController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [RegisterController::class, 'store'])->name('cadastro.store');