<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\CategoriesController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// ユーザー一覧を取得
Route::get('/users', [UsersController::class, 'index']);

// ユーザー詳細を取得
Route::get('/users/{uuid}', [UsersController::class, 'show']);

// Post resource
Route::apiResource('/posts', PostsController::class);

// Category resource
Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::get('/categories/{slug}', [CategoriesController::class, 'show']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);