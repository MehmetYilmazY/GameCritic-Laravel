<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('home');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/listgame', [App\Http\Controllers\GameController::class, 'listGame'])->name('admin.listgame');
Route::get('/creategame', [App\Http\Controllers\GameController::class, 'index'])->name('admin.creategame');
Route::get('/creategame/create', [App\Http\Controllers\GameController::class, 'create'])->name('creategame.create');
Route::post('/creategame/store', [App\Http\Controllers\GameController::class, 'store'])->name('creategame.store');
Route::post('/store-form', [App\Http\Controllers\GameController::class, 'store'])->name('store-form');
Route::get('/creategame/edit/{id}', [App\Http\Controllers\GameController::class, 'edit'])->name('creategame.edit');
Route::put('/creategame/update/{id}', [App\Http\Controllers\GameController::class, 'update'])->name('creategame.update');
Route::delete('/creategame/destroy/{id}', [App\Http\Controllers\GameController::class, 'destroy'])->name('creategame.destroy');
Route::get('/games/{id}', [App\Http\Controllers\GameController::class, 'show'])->name('detail');
Route::post('/rate-game', [App\Http\Controllers\GameController::class, 'rateGame'])->name('rateGame');