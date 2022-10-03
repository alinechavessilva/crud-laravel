<?php

use App\Http\Controllers\Admin\OpenWeatherMapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/index', [UserController::class, 'create'])->name('index');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/searchClima', [OpenWeatherMapController::class, 'search'])->name('searchClima');



