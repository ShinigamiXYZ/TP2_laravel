<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;

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
Route::get('/', [UserController::class, 'login'])->name('auth.login');
Route::put('/', [UserController::class, 'auth'])->name('auth.credentials');
Route::get('/register', [UserController::class, 'register'])->name('auth.register');
Route::put('/register', [Usercontroller::class, 'createAccount'])->name('auth.createacc');

Route::get('/student', [StudentController::class, 'index'])->name('main.index')->middleware('auth');
Route::get('/create', [StudentController::class, 'create'])->name('main.create')->middleware('auth');
Route::put('/create', [StudentController::class, 'store'])->name('main.store')->middleware('auth');
Route::get('student/{studentId}', [StudentController::class, 'show'])->name('main.show')->middleware('auth');
Route::get('edit/{studentId}', [StudentController::class, 'edit'])->name('main.edit')->middleware('auth');
Route::put('edit/{studentId}', [StudentController::class, 'update'])->name('main.update')->middleware('auth');
Route::delete('edit/{studentId}', [StudentController::class, 'destroy'])->name('main.delete')->middleware('auth'); 

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index')->middleware('auth');

