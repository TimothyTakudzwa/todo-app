<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;


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
    return redirect('/login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',[TasksController::class, 'index'])->name('dashboard');

    Route::get('/task',[TasksController::class, 'add'])->name('show-tasks');
    Route::post('/task',[TasksController::class, 'create'])->name('create-task');

    Route::get('/task/{task}', [TasksController::class, 'edit'])->name('edit-task');
    Route::post('/task/{task}', [TasksController::class, 'update'])->name('update-task');
    Route::get('/delete-user/{id}', [TasksController::class, 'deleteUser'])->name('delete-user');
    Route::post('/add-user', [TasksController::class, 'createUser'])->name('create-user');
});
