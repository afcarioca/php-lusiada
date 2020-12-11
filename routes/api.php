<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;





Route::get('noticias', [NoticiaController::class, 'index']);
Route::get('noticias/{id}',[NoticiaController::class, 'show']);
Route::post('login',[UserController::class, 'authenticate']);
Route::post('user', [UserController::class, 'register']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', [UserController::class, 'getAuthenticatedUser']);
    Route::post('noticias', [NoticiaController::class, 'store']);
    Route::put('noticias/{id}', [NoticiaController::class, 'update']);
    Route::delete('noticias/{id}', [NoticiaController::class, 'delete']);
});


