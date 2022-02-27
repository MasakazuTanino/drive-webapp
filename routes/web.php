<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\DetailController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ログインしている時のみ　group(['middleware' => 'auth'])
Route::group(['middleware' => 'auth'], function () {
    Route::get('/adds',  [AddController::class, 'index'])->name('adds.index');
    Route::post('/adds',  [AddController::class, 'store'])->name('adds.store');

    Route::post('/home/search',  [HomeController::class, 'search'])->name('home.search');

    Route::get('/detail{id?}',  [DetailController::class, 'detail'])->name('details.index');

    Route::post('/detail{id?}',  [DetailController::class, 'comment'])->name('details.comment');

    Route::delete('/detail/{comment}/destroy',  [DetailController::class, 'destroy'])->name('details.destroy');
});