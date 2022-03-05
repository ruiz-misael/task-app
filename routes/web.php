<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\TareasController::class, 'index'])->name('home');

Route::get('tareas',[App\Http\Controllers\TareasController::class, 'index']);

Route::post('tareas_store',[App\Http\Controllers\TareasController::class, 'store'])->name('tareas_store');
Route::get('tareas_delete/{id}',[App\Http\Controllers\TareasController::class, 'destroy']);

Route::post('tareas_update/{id}',[App\Http\Controllers\TareasController::class, 'update'])->name('tareas_update');
Rpute::get('tarea_finish/{id}',,[App\Http\Controllers\TareasController::class, 'finished']);