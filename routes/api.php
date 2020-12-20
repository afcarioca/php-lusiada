<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;





Route::post('login',[UserController::class, 'authenticate']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('noticias', [NoticiaController::class, 'index']);

    Route::get('noticias/{id}',[NoticiaController::class, 'show']);

    Route::get('user', [UserController::class, 'index']);
    Route::post('user', [UserController::class, 'register']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::post('logout',[UserController::class, 'logout']);
    Route::post('noticias', [NoticiaController::class, 'store']);
    Route::put('noticias/{id}', [NoticiaController::class, 'update']);
    Route::delete('noticias/{id}', [NoticiaController::class, 'delete']);

});


