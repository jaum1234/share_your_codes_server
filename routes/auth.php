<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/refreshtoken', [LoginController::class, 'refresh'])->name('login.refresh');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

