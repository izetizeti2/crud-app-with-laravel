<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QytetaretController;
use App\Http\Controllers\QytetetController;


Route::get('/welcome', function () {
    return view('welcome');
});
Route::get(uri: '/', action: [QytetaretController::class, 'index'])->name(name: 'qytetaret.index');
Route::get(uri: '/qytetaret/{id}', action: [QytetaretController::class, 'show']);
Route::get(uri: '/qytetaret/{id}/edit', action: [QytetaretController::class, 'edit'])->name(name: 'qytetaret.edit');
Route::put(uri: '/qytetaret/{id}', action: [QytetaretController::class, 'update']);
Route::get('/create', action: [QytetaretController::class, 'create'])->name('qytetaret.create');
Route::get('/qytetaret', [QytetaretController::class, 'index'])->name('qytetaret.index');
Route::post('/qytetaret', [QytetaretController::class, 'store'])->name('qytetaret.store');
Route::delete('/qytetaret/{id}', [QytetaretController::class, 'destroy'])->name('qytetaret.destroy');

Route::get( '/qytetet/qytetet', [QytetetController::class, 'index'])->name(name: 'qytetet.index');
Route::get(uri: '/qytetet/{id}', action: [QytetetController::class,'show']);
Route::get(uri: '/qytetet/{id}/edit', action: [QytetetController::class, 'edit'])->name(name: 'qytetet.edit');
Route::put(uri: '/qytetet/{id}', action: [QytetetController::class, 'update']);
Route::get('/qytetet/qytetet/create', action: [QytetetController::class, 'create'])->name('qytetet.create');
Route::post('/qytetet', [QytetetController::class, 'store'])->name('qytetet.store');
Route::delete('/qytetet/{id}', [QytetetController::class, 'destroy'])->name('qytetet.destroy');