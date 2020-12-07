<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;





Route::get('noticias', [NoticiaController::class, 'index']);
Route::get('noticias/{id}',[NoticiaController::class, 'show']);
Route::post('noticias', [NoticiaController::class, 'store'])->middleware('jwt.auth');
Route::put('noticias/{id}',[NoticiaController::class, 'update'])->middleware('jwt.auth');
Route::delete('noticias/{id}',[NoticiaController::class, 'delete'])->middleware('jwt.auth');




Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});