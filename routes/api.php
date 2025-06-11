<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::post('/register', [UserController::class, 'CreateUser'])->middleware('auth:sanctum');
Route::post('/login', [UserController::class, 'LoginUser']);
Route::post('/logout', [UserController::class, 'LogoutUser'])->middleware('auth:sanctum');


Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');
Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');
