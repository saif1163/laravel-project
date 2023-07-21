<?php

use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/student',[StudentController::class,'index'])->name('student');
Route::get('/student/create',[StudentController::class,'create'])->name('student.create');
Route::post('/student/create',[StudentController::class,'store']);
Route::get('/student/{student}/edit',[StudentController::class,'edit'])->name("student.edit");
Route::post('/student/{student}/edit',[StudentController::class,'edit']);
Route::get('/student/{student}/delete', [StudentController::class, 'destroy'])->name("student.delete");
