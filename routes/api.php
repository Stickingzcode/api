<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    return 'products';
});

Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store']);

Route::apiResource('posts', \App\Http\Controllers\PostController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
