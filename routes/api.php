<?php


use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::put('/products/{id}', [ProductController::class, 'update']);

Route::delete('/products/{id}', [ProductController::class, 'destroy']);

//Route::post('/products', function() {
//
//    try {
//        $product = Product::create([
//            'name' => 'cream',
//            'slug' => 'cream',
//            'description' => 'my body cream',
//            'price' => '100.20'
//        ]);
//
//        return response()->json($product, 201);
//    } catch (\Exception $exception) {
//        return response()->json(['error' => $exception->getMessage()], 500);
//    }
//});

//Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store']);

Route::apiResource('posts', \App\Http\Controllers\PostController::class);
//apiResource encompasses all other http requests: post, put, delete, get.

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
