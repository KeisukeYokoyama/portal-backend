<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\PostsController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// ユーザー一覧を取得
Route::get('/users', [UsersController::class, 'index']);

// ユーザー詳細を取得
Route::get('/users/{uuid}', [UsersController::class, 'show']);

// Post resource
Route::apiResource('/posts', PostsController::class);