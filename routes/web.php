<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\FormController;

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
Route::get('/arac', function () {return view('arac');});
Route::post('/arac-talep-formu', [FormController::class, 'submitCarForm'])->name('arac-talep-formu');
Route::get('/arac-talep-listeleme', [App\Http\Controllers\FormController::class, 'listCarForm'])->name('arac-talep-listeleme');
Route::get('/car-form', [FormController::class, 'listCarForm'])->name('admin.listrequest');
Route::get('/car-form/{id}', [FormController::class, 'showCarForm'])->name('admin.showrequest');
// Araç talep formunu düzenle

Route::get('/arac-talep-duzenle/{id}', [FormController::class, 'editCarForm'])->name('admin.aracedit');
// Araç talep formunu güncelle
Route::put('/arac-talep-duzenle/{id}', [FormController::class, 'updateCarForm'])->name('arac-talep-guncelle');

// Araç talep formunu sil
Route::delete('/arac-talep-sil/{id}', [FormController::class, 'deleteCarForm'])->name('admin.aracdelete');

Route::post('/comment/add/{carRequestId}', [FormController::class, 'addComment'])->name('comment.add');
Route::post('/teklif/kaydet/{carRequestId}', [FormController::class, 'teklifKaydet'])->name('teklif.kaydet');
Route::post('/teklif/onayla/{teklifId}', [FormController::class, 'onaylaTeklif'])->name('teklif.onayla');
