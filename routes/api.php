<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//C - create - store
//R - read
//     - get one - show
//     - get all - index
//U - update - update
//D - delete - destroy

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class,'show']);
Route::post('posts', [PostController::class,'store']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);
Route::put('posts/{id}', [PostController::class, 'update']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class,'store']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::patch('categories/{id}', [CategoryController::class, 'update']);
