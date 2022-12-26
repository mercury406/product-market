<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'show'])
    ->parameter('category', 'slug');

Route::apiResource('products', ProductController::class)
    ->only(['index', 'show'])
    ->parameter('product', 'slug');