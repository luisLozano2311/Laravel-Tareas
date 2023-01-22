<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todosController;
use App\Http\Controllers\categoriesController;

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

Route::get('/', function () {
    return view('App');
});

Route::get('/tareas',[todosController::class,'index'])->name('todos');  

Route::post('/tareas',[todosController::class,'store'])->name('todos');


Route::get('/tareas/{id}',[todosController::class,'show'])->name('todos-show');
Route::patch('/tareas/{id}',[todosController::class,'update'])->name('todos-update');
Route::delete('/tareas/{id}',[todosController::class,'distroy'])->name('todos-destroy');


Route::resource('categories',CategoriesController::class);