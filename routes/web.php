<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return 'wtf';
});


Route::get('/home' , [IndexController::class, 'index'])->name('home');

Route::get('/testpage' , [IndexController::class, 'test']);

Route::post('/register' , [AuthController::class, 'register'])->name('register.test');

Route::delete('/logout' , [AuthController::class , 'logout'])->name('logout');

Route::post('login', [AuthController::class, 'login'])->name('login');;

Route::get('projects', [ProjectController::class, 'index'])->name('projects');

Route::post('createProject', [ProjectController::class, 'create'])->name('createProject');

Route::post('createTask', [TaskController::class, 'create'])->name('createTask');

Route::post('addMember' , [ProjectController::class, 'addMember'])->name('addMember');

Route::post('editProject' , [ProjectController::class, 'editProject'])->name('editProject');

Route::get('/fakeHome', [IndexController::class, 'fakeHome'])->name('fakeHome');

Route::delete('/deleteProject/{id}', [ProjectController::class, 'deleteProject'])->name('deleteProject');

Route::post('/editTask', [TaskController::class, 'editTask'])->name('editTask');

Route::delete('/deleteTask/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');

Route::post('/removeMember', [ProjectUserController::class, 'removeMember'])->name('removeMember');




