<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\TagsController;
use App\Http\Controllers\Api\MatchingAppsController;

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

// Tag resource
Route::get('/tags', [TagsController::class, 'index']);
Route::post('/tags', [TagsController::class, 'store']);
Route::get('/tags/{slug}', [TagsController::class, 'show']);
Route::put('/tags/{id}', [TagsController::class, 'update']);
Route::delete('/tags/{id}', [TagsController::class, 'destroy']);

// MatchingApp resource
Route::get('/apps', [MatchingAppsController::class, 'index']);
Route::post('/apps', [MatchingAppsController::class, 'store']);
Route::get('/apps/{slug}', [MatchingAppsController::class, 'show']);
Route::put('/apps/{id}', [MatchingAppsController::class, 'update']);
Route::delete('/apps/{id}', [MatchingAppsController::class, 'destroy']);