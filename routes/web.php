<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;





Route::get('/', [AuthController::class, 'login_view'])->name('login');
Route::post('/', [AuthController::class, 'login_process']);
Route::get('/reg', [AuthController::class, 'reg_view'])->name('reg');
Route::post('/reg', [AuthController::class, 'reg_process']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard', 'middleware'=> 'auth'])->name('home');
