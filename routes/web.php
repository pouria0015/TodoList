<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TodoController::class , 'index'])->name('todo.index');

Route::get('index' , [TodoController::class , 'index'])->name('todo.index');

Route::get('show/{todoId}' , [TodoController::class , 'show'])->name('todo.show')->where(['todoId' => '[0-9]+']); 

Route::get('create' , [TodoController::class , 'create'])->name('todo.create'); 

route::post('store' , [TodoController::class , 'store'])->name('todo.store');
route::get('edit/{todoId}' , [TodoController::class , 'edit'])->name('todo.edit')->where(['todoId' => '[0-9]+']);
route::put('update/{todoId}' , [TodoController::class , 'update'])->name('todo.update')->where(['todoId' => '[0-9]+']);
route::delete('delete/{todoId}' , [TodoController::class , 'delete'])->name('todo.delete');
route::get('completed/{todoId}' , [TodoController::class , 'completed'])->name('todo.completed');

route::get('register' , [UserController::class , 'showRegisterForm'])->name('auth.show.register');
route::post('register' , [UserController::class , 'register'])->name('register');

route::get('login' , [UserController::class , 'showLoginForm'])->name('auth.show.login');
route::post('login' , [UserController::class , 'login'])->name('login');

route::get('logout' , [UserController::class , 'logout'])->name('auth.logout');
