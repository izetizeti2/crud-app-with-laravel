<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QytetetController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/qytetet', [QytetetController::class,'index']);
Route::get('/qytetet/{id}', [QytetetController::class,'show']);
Route::post('/qytetet', [QytetetController::class,'store']);
Route::put('/qytetet/{id}', [QytetetController::class,'update']);
Route::delete('/qytetet/{id}', [QytetetController::class,'delete']);