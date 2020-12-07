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


Route::post('login', [AuthController::class, 'login']);

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
