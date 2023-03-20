<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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


Route::get('/', [StudentController::class, 'index'])->name('main.index');
Route::get('/create', [StudentController::class, 'create'])->name('main.create');
Route::put('/create', [StudentController::class, 'store'])->name('main.store');
Route::get('student/{studentId}', [StudentController::class, 'show'])->name('main.show');
Route::get('edit/{studentId}', [StudentController::class, 'edit'])->name('main.edit');
Route::put('edit/{studentId}', [StudentController::class, 'update'])->name('main.update');
Route::delete('edit/{studentId}', [StudentController::class, 'destroy'])->name('main.delete'); 
Route::get('/register', [UserController::class, 'register'])->name('auth.register');
Route::put('/register', [Usercontroller::class, 'createAccount'])->name('aut.createacc');
Route::get('/login', [UserController::class, 'login'])->name('auth.login');
