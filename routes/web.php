<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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

Route::get('/logout' , [AuthController::class , 'logout']);




